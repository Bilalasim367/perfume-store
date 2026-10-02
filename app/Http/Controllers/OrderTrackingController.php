<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderTrackingController extends Controller
{
    public function index(): View
    {
        return view('order-tracking');
    }

    public function track(Request $request): View
    {
        $request->validate([
            'order_id' => 'required|integer',
            'email' => 'required|email',
        ]);

        $order = Order::where('id', $request->order_id)
            ->where('shipping_email', $request->email)
            ->first();

        if (!$order) {
            return back()->with('error', 'Order not found. Please check your order ID and email.');
        }

        $order->load('items.product');

        return view('order-tracking', compact('order'));
    }
}
