<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PosterController extends Controller
{
    public function index()
    {
        return view('admin.poster.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => "nullable|string|max:255",
            'image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'posters');
        }

        Poster::create(['name' => $request->name, 'image' => $image]);

        return response()->json(['message' => 'Poster created successfully']);
    }

    public function update(Request $request, Poster $poster)
    {
        $data = $request->validate([
            'name'  => "nullable|string|max:255",
            'image' => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($poster->image && Storage::disk('public')->exists($poster->image)) {
                Storage::disk('public')->delete($poster->image);
            }

            $data['image'] = $this->uploadFile($request->file('image'), 'posters');
        }

        $poster->update($data);

        return response()->json(['message' => 'Poster updated successfully']);
    }

    public function destroy($id)
    {
        Poster::findOrFail($id)->delete();
        return response()->json(['message' => 'Poster deleted successfully']);
    }

    public function form($id = null)
    {
        $data = $id ? Poster::findOrFail($id) : null;
        return view('admin.poster.form', compact('data'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Poster::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => 'Updated successfully']);
    }

    public function dataTable(Request $request)
    {
        $query = Poster::select('id', 'name', 'image', 'is_active');
        return DataTables::of($query)->make(true);
    }

    private function uploadFile($file, string $folder)
    {
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, 'public');
    }
}
