<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\DocumentGroup;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DocumentGroupController extends Controller
{
    public function index($service)
    {
        $service = CenterService::where('slug', $service)->first();
        if (! $service) {
            abort(404);
        }

        return view('admin.document-group.index', compact('service'));
    }

    public function dataTable(Request $request)
    {
        $query = DocumentGroup::with('service')->where('center_service_id', $request->filter);

        return DataTables::of($query)
            ->addColumn('service', function ($row) {
                return $row->service?->name ?? '-';
            })
            ->make(true);
    }

    public function form($id = null)
    {
        $data = $id ? DocumentGroup::findOrFail($id) : null;
        return view('admin.document-group.form', compact('data'));
    }

    public function store(Request $request, CenterService $service)
    {
        if (! $service) {
            return response()->json(['message' => 'Service not found']);
        }

        $request->validate(['name' => "required|string", 'notes' => "nullable|string"]);

        DocumentGroup::create([
            'center_service_id' => $service->id,
            'name'              => $request->name,
            'notes'             => $request->notes,
        ]);

        return response()->json(['message' => 'Document group created successfully']);
    }

    public function update(Request $request, DocumentGroup $documentGroup)
    {
        $data = $request->validate(['name' => "required|string", 'notes' => "nullable|string"]);

        $documentGroup->update($data);

        return response()->json(['message' => 'Document group updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = DocumentGroup::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => $item->is_active ? 'Updated successfully' : 'Updated successfully']);
    }
}
