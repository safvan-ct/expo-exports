<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\GovernmentCenter;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GovernmentCenterController extends Controller
{
    public function index()
    {
        $menus = Menu::select('id', 'name')->get();

        return view('admin.govt-center.index', compact('menus'));
    }

    public function dataTable(Request $request)
    {
        $query = GovernmentCenter::with('menu')
            ->when($request->filter && $request->filter != 'all', function ($q) use ($request) {
                $q->where('menu_id', $request->filter);
            });

        return DataTables::of($query)->make(true);
    }

    public function form($id = null)
    {
        $data  = $id ? GovernmentCenter::findOrFail($id) : null;
        $menus = Menu::select('id', 'name')->get();

        return view('admin.govt-center.form', compact('data', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id'     => "required|exists:menus,id",
            'name'        => "required|string|max:255",
            'tagline'     => "nullable|string",
            'desc_title'  => "nullable|string",
            'description' => "nullable|string",
            'ad_image'    => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = null;
        if ($request->hasFile('ad_image')) {
            $image = $this->uploadFile($request->file('ad_image'), 'govt_centers');
        }

        GovernmentCenter::create([
            'menu_id'     => $request->menu_id,
            'name'        => $request->name,
            'slug'        => str()->slug($request->name),
            'tagline'     => $request->tagline,
            'desc_title'  => $request->desc_title,
            'description' => $request->description,
            'ad_image'    => $image,
        ]);

        return response()->json(['message' => 'Government Center created successfully']);
    }

    public function update(Request $request, GovernmentCenter $govtCenter)
    {
        $data = $request->validate([
            'menu_id'     => "required|exists:menus,id",
            'name'        => "required|string|max:255",
            'tagline'     => "nullable|string",
            'desc_title'  => "nullable|string",
            'description' => "nullable|string",
            'ad_image'    => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('ad_image')) {
            if ($govtCenter->ad_image && Storage::disk('public')->exists($govtCenter->ad_image)) {
                Storage::disk('public')->delete($govtCenter->ad_image);
            }

            $data['ad_image'] = $this->uploadFile($request->file('ad_image'), 'govt_centers');
        }

        $data['slug'] = str()->slug($request->name);

        $govtCenter->update($data);

        return response()->json(['message' => 'Government Center updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = GovernmentCenter::findOrFail($id);

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
