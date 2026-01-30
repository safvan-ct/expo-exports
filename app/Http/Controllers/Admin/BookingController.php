<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultantRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function dataTable(Request $request)
    {
        $query = ConsultantRequest::latest();

        return DataTables::of($query)->make(true);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id'     => 'required|exists:consultant_requests,id',
            'status' => 'required|in:1,2,3',
        ]);

        ConsultantRequest::where('id', $request->id)
            ->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }
}
