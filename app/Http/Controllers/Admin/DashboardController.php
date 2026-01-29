<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CenterService;
use App\Models\ConsultantRequest;
use App\Models\GovernmentCenter;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooking  = ConsultantRequest::count();
        $newBooking    = ConsultantRequest::where('status', 1)->count();
        $servicesCount = CenterService::count();
        $govtServices  = GovernmentCenter::count();

        return view('admin.dashboard', [
            'totalBooking'  => $totalBooking,
            'newBooking'    => $newBooking,
            'servicesCount' => $servicesCount,
            'govtServices'  => $govtServices,
        ]);
    }
}
