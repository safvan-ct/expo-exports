<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\GovernmentCenter;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CenterServiceController extends Controller
{
    public function index()
    {
        $menus = Menu::select('id', 'name')->get();

        return view('admin.center-service.index', compact('menus'));
    }

    public function dataTable(Request $request)
    {
        $query = CenterService::with(['menu', 'governmentCenter'])
            ->when($request->filter && $request->filter != 'all', function ($q) use ($request) {
                $q->where('menu_id', $request->filter);
            });

        return DataTables::of($query)
            ->addColumn('government_center_name', function ($row) {
                return optional($row->governmentCenter)->name;
            })
            ->make(true);
    }

    public function form($id = null)
    {
        $data              = $id ? CenterService::findOrFail($id) : null;
        $menus             = Menu::select('id', 'name')->get();
        $governmentCenters = GovernmentCenter::select('id', 'name')->get();

        return view('admin.center-service.form', compact('data', 'menus', 'governmentCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id'              => "nullable|exists:menus,id",
            'government_center_id' => "nullable|exists:government_centers,id",
            'name'                 => "required|string|max:255",
            'tagline'              => "nullable|string",
            'notes'                => "nullable|string",
            'ad_image'             => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = null;
        if ($request->hasFile('ad_image')) {
            $image = $this->uploadFile($request->file('ad_image'), 'center_services');
        }

        CenterService::create([
            'menu_id'              => $request->menu_id ?? null,
            'government_center_id' => $request->government_center_id ?? null,
            'name'                 => $request->name,
            'slug'                 => str()->slug($request->name),
            'tagline'              => $request->tagline,
            'notes'                => $request->notes,
            'ad_image'             => $image,
        ]);

        return response()->json(['message' => 'Service created successfully']);
    }

    public function update(Request $request, CenterService $centerService)
    {
        $data = $request->validate([
            'menu_id'              => "nullable|exists:menus,id",
            'government_center_id' => "nullable|exists:government_centers,id",
            'name'                 => "required|string|max:255",
            'tagline'              => "nullable|string",
            'notes'                => "nullable|string",
            'ad_image'             => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('ad_image')) {
            if ($centerService->ad_image && Storage::disk('public')->exists($centerService->ad_image)) {
                Storage::disk('public')->delete($centerService->ad_image);
            }

            $data['ad_image'] = $this->uploadFile($request->file('ad_image'), 'center_services');
        }

        $data['slug'] = str()->slug($request->name);

        $centerService->update($data);

        return response()->json(['message' => 'Service updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = CenterService::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => 'Updated successfully']);
    }

    private function uploadFile($file, string $folder)
    {
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        return $file->storeAs($folder, $filename, 'public');
    }
}
