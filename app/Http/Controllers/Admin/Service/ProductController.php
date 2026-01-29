<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.product.index', compact('categories'));
    }

    public function dataTable(Request $request)
    {
        $query = Product::with('category:id,name')
            ->when($request->filter && $request->filter != 'all', function ($q) use ($request) {
                $q->where('category_id', $request->filter);
            });

        return DataTables::of($query)->make(true);
    }

    public function form($id = null)
    {
        $data       = $id ? Product::findOrFail($id) : null;
        $categories = Category::select('id', 'name')->get();

        return view('admin.product.form', compact('data', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => "required|exists:categories,id",
            'name'        => "required|string|max:255",
            'description' => "required|string",
            'image'       => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'), 'products');
        }

        Product::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => str()->slug($request->name),
            'description' => $request->description,
            'image'       => $image,
        ]);

        return response()->json(['message' => 'Product created successfully']);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => "required|exists:categories,id",
            'name'        => "required|string|max:255",
            'description' => "required|string",
            'image'       => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $this->uploadFile($request->file('image'), 'products');
        }

        $data['slug'] = str()->slug($request->name);

        $product->update($data);

        return response()->json(['message' => 'Product updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Product::findOrFail($id);

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
