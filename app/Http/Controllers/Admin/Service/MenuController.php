<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu.index');
    }

    public function dataTable(Request $request)
    {
        return DataTables::of(Menu::query())->make(true);
    }

    public function form($id = null)
    {
        $data = $id ? Menu::findOrFail($id) : null;

        return view('admin.menu.form', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => "required|string|max:255"]);

        Menu::create([
            'name'       => $request->name,
            'slug'       => str()->slug($request->name),
            'sort_order' => Menu::max('sort_order') + 1,
        ]);

        return response()->json(['message' => 'Menu created successfully']);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => "required|string|max:255"]);

        Menu::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => str()->slug($request->name),
        ]);

        return response()->json(['message' => 'Menu updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Menu::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => 'Updated successfully']);
    }
}
