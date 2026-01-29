<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientReviewController extends Controller
{
    public function index()
    {
        return view('admin.client-review.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => "required|string|max:255",
            'comment' => "required|string",
            'rating'  => "required|integer",
        ]);

        ClientReview::create(['name' => $request->name, 'comment' => $request->comment, 'rating' => $request->rating]);

        return response()->json(['message' => 'Client review created successfully']);
    }

    public function update(Request $request, ClientReview $id)
    {
        $data = $request->validate([
            'name'    => "required|string|max:255",
            'comment' => "required|string",
            'rating'  => "required|integer|min:1|max:5",
        ]);

        $id->update($data);

        return response()->json(['message' => 'Client review updated successfully']);
    }

    public function destroy($id)
    {
        ClientReview::findOrFail($id)->delete();
        return response()->json(['message' => 'Client review deleted successfully']);
    }

    public function form($id = null)
    {
        $data = $id ? ClientReview::findOrFail($id) : null;
        return view('admin.client-review.form', compact('data'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = ClientReview::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => $item->is_active ? 'Updated successfully' : 'Updated successfully']);
    }

    public function dataTable(Request $request)
    {
        $query = ClientReview::select('id', 'name', 'comment', 'rating', 'is_active');
        return DataTables::of($query)->make(true);
    }
}
