<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    public function index()
    {
        return view('admin.partner.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => "required|string|max:255",
            'image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'partners');
        }

        Partner::create(['name' => $request->name, 'image' => $image]);

        return response()->json(['message' => 'Partner created successfully']);
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name'  => "required|string|max:255",
            'image' => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($partner->image && Storage::disk('public')->exists($partner->image)) {
                Storage::disk('public')->delete($partner->image);
            }

            $data['image'] = $this->uploadFile($request->file('image'), 'partners');
        }

        $partner->update($data);

        return response()->json(['message' => 'Partner updated successfully']);
    }

    public function destroy($id)
    {
        Partner::findOrFail($id)->delete();
        return response()->json(['message' => 'Partner deleted successfully']);
    }

    public function form($id = null)
    {
        $data = $id ? Partner::findOrFail($id) : null;
        return view('admin.partner.form', compact('data'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Partner::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => $item->is_active ? 'Updated successfully' : 'Updated successfully']);
    }

    public function dataTable(Request $request)
    {
        $query = Partner::select('id', 'name', 'image', 'is_active');
        return DataTables::of($query)->make(true);
    }

    private function uploadFile($file, string $folder)
    {
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, 'public');
    }
}
