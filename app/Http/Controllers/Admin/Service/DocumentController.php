<?php
namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\Document;
use App\Models\DocumentGroup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public function index($service)
    {
        $service = CenterService::where('slug', $service)->first();
        if (! $service) {
            abort(404);
        }

        return view('admin.document.index', compact('service'));
    }

    public function dataTable(Request $request)
    {
        $query = Document::when($request->filter && $request->filter != 'all', function ($q) use ($request) {
            $q->where('center_service_id', $request->filter);
        });

        return DataTables::of($query)->make(true);
    }

    public function form($id, $service = null)
    {
        $data      = $id ? Document::findOrFail($id) : null;
        $docGroups = DocumentGroup::select('id', 'name')->where('center_service_id', $service)->get();

        return view('admin.document.form', compact('data', 'docGroups'));
    }

    public function store(Request $request, CenterService $service)
    {
        if (! $service) {
            return response()->json(['message' => 'Service not found']);
        }

        $request->validate([
            'name'              => "required|string",
            "document_group_id" => "nullable|exists:document_groups,id",
            'notes'             => "nullable|string",
        ]);

        Document::create([
            'center_service_id' => $service->id,
            'document_group_id' => $request->document_group_id ?? null,
            'name'              => $request->name,
            'notes'             => $request->notes,
        ]);

        return response()->json(['message' => 'Document created successfully']);
    }

    public function update(Request $request, Document $document)
    {
        $data = $request->validate([
            'name'              => "required|string",
            "document_group_id" => "nullable|exists:document_groups,id",
            'notes'             => "nullable|string",
        ]);

        $document->update($data);

        return response()->json(['message' => 'Document updated successfully']);
    }

    public function toggleStatus(Request $request, $id)
    {
        $column = $request->column ?? 'is_active';
        $item   = Document::findOrFail($id);

        $item->$column = ! $item->$column;
        $item->save();

        return response()->json(['message' => 'Updated successfully']);
    }
}
