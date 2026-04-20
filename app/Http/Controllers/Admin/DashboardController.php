<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'orders' => Order::count(),
            'users' => User::where('is_admin', false)->count(),
            'revenue' => Order::where('status', 'completed')->sum('total'),
        ];

        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
