<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => "required|string|max:255",
            "description" => "required|string",
            'image'       => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'sliders');
        }

        Slider::create(['title' => $request->title, 'description' => $request->description, 'image' => $image]);

        return response()->json(['message' => 'Slider created successfully']);
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title'       => "required|string|max:255",
            "description" => "required|string",
            'image'       => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $data['image'] = $this->uploadFile($request->file('image'), 'sliders');
        }

        $slider->update($data);

        return response()->json(['message' => 'Slider updated successfully']);
    }

    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return response()->json(['message' => 'Slider deleted successfully']);
    }

    public function form($id = null)
    {
        $data = $id ? Slider::findOrFail($id) : null;
        return view('admin.slider.form', compact('data'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Slider::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => 'Updated successfully']);
    }

    public function dataTable(Request $request)
    {
        $query = Slider::select('id', 'title', 'description', 'image', 'is_active');
        return DataTables::of($query)->make(true);
    }

    private function uploadFile($file, string $folder)
    {
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, 'public');
    }
}
