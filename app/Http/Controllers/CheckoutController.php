<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PurchaseNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $cartItems = CartItem::where('user_id', auth()->id())
            ->with('product')
            ->get();

        $total = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(StoreCheckoutRequest $request): RedirectResponse
    {
        $cartItems = CartItem::where('user_id', auth()->id())
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $total = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        $order = DB::transaction(function () use ($request, $cartItems, $total) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => Order::STATUS_PENDING,
                'total' => $total,
                'shipping_name' => strip_tags($request->shipping_name),
                'shipping_email' => strip_tags($request->shipping_email),
                'shipping_address' => strip_tags($request->shipping_address),
                'shipping_city' => strip_tags($request->shipping_city),
                'shipping_phone' => strip_tags($request->shipping_phone),
                'notes' => $request->notes ? strip_tags($request->notes) : null,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                $firstItem = $item;
                $item->product->decrement('stock', $item->quantity);
            }

            PurchaseNotification::create([
                'customer_name' => auth()->user()->name,
                'city' => strip_tags($request->shipping_city),
                'product_name' => $firstItem->product->name,
                'product_image' => $firstItem->product->image,
                'purchased_at' => now(),
            ]);

            CartItem::where('user_id', auth()->id())->delete();

            return $order;
        });

        event(new OrderCreated($order));

        return redirect()->route('checkout.show', $order)->with('success', 'Order placed successfully');
    }

    public function show(Order $order): View
    {
        $order->load('items.product', 'user');

        return view('checkout.show', compact('order'));
    }

    public function orders(): View
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('checkout.orders', compact('orders'));
    }
}
