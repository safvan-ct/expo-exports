<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function dataTable(Request $request)
    {
        return DataTables::of(Category::query())->make(true);
    }

    public function form($id = null)
    {
        $data = $id ? Category::findOrFail($id) : null;

        return view('admin.category.form', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => "required|string|max:255"]);

        Category::create([
            'name'       => $request->name,
            'slug'       => str()->slug($request->name),
            'sort_order' => Category::max('sort_order') + 1,
        ]);

        return response()->json(['message' => 'Category created successfully']);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => "required|string|max:255"]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => str()->slug($request->name),
        ]);

        return response()->json(['message' => 'Category updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Category::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => 'Updated successfully']);
    }
}
