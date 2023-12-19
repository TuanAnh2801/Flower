<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Carbon\Carbon;
use Facade\Ignition\Exceptions\ViewExceptionWithSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function showDashboard()
    // {

    //     $totalProducts = Product::count();
    //     $totalPrices = Order::where('campaign_id', 2)->sum('total_price');

    //     $totalDelivery = Delivery::count();


    //     $oneWeekAgo = Carbon::now()->subWeek();
    //     $newProducts = $totalSold = OrderItems::where('created_at', '>=', $oneWeekAgo)->sum('product_quantity');
    //     $oldProducts = Product::where('created_at', '<', $oneWeekAgo)->count();

    //     if ($oldProducts > 0) {
    //         $increase = ($newProducts - $oldProducts) / $oldProducts * 100;
    //     } else {
    //         $increase = 0;
    //     }

    //     $year = date('Y');

    //     $revenues = [];


    //     for ($month = 1; $month <= 12; $month++) {
    //         $revenues[] = Order::whereYear('created_at', $year)
    //         ->whereMonth('created_at', $month)->where('campaign_id', 2)
    //         ->sum('total_price');

    //     }
    //     return view('backend.dashboard.dashboard', compact('totalProducts', 'totalPrices', 'totalDelivery', 'increase','revenues'));
    // }



    public function showDashboard()
    {
        $totalProducts = Product::count();
        $totalPrices = Order::where('campaign_id', 2)->sum('total_price');
        $totalDelivery = Delivery::count();

        $oneWeekAgo = Carbon::now()->subWeek();
        $newProducts = $totalSold = OrderItems::where('created_at', '>=', $oneWeekAgo)->sum('product_quantity');

        $year = date('Y');

        $thisMonth = Carbon::now()->month;
        $lastMonth = ($thisMonth == 1) ? 12 : $thisMonth - 1; // Tháng trước đó
        $thisMonthRevenue = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $thisMonth)
            ->where('campaign_id', 2)
            ->sum('total_price');
        $lastMonthRevenue = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $lastMonth)
            ->where('campaign_id', 2)
            ->sum('total_price');

        $increase = ($lastMonthRevenue > 0) ? (($thisMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100 : 0;
        $increase = number_format($increase, 2);
        $revenues = [];

        for ($month = 1; $month <= 12; $month++) {
            $revenues[] = Order::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('campaign_id', 2)
                ->sum('total_price');
        }

        return view('backend.dashboard.dashboard', compact('totalProducts', 'totalPrices', 'totalDelivery', 'increase', 'revenues'));
    }
}
