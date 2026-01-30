<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ConsultantRequest;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooking  = ConsultantRequest::count();
        $todayBooking  = ConsultantRequest::where('created_at', '>=', now()->subDay())->count();
        $categoryCount = Category::count();
        $productCount  = Product::count();

        return view('admin.dashboard', [
            'totalBooking'  => $totalBooking,
            'todayBooking'  => $todayBooking,
            'categoryCount' => $categoryCount,
            'productCount'  => $productCount,
        ]);
    }
}
