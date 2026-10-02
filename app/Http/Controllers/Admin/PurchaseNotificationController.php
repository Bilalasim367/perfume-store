<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseNotification;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PurchaseNotificationController extends Controller
{
    public function index(): View
    {
        $notifications = PurchaseNotification::latest()->paginate(20);
        return view('admin.purchase-notifications.index', compact('notifications'));
    }

    public function create(): View
    {
        return view('admin.purchase-notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'product_name' => 'required|string|max:200',
            'product_image' => 'nullable|string',
        ]);

        PurchaseNotification::create([
            'customer_name' => $request->customer_name,
            'city' => $request->city,
            'product_name' => $request->product_name,
            'product_image' => $request->product_image ?? 'storage/products/demo.png',
            'purchased_at' => now(),
        ]);

        return redirect()->route('admin.purchase-notifications.index')->with('success', 'Notification created');
    }

    public function destroy(PurchaseNotification $purchaseNotification)
    {
        $purchaseNotification->delete();
        return back()->with('success', 'Notification deleted');
    }
}
