@extends('layouts.admin')

@section('title', 'Order #' . $order->id)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Order #{{ $order->id }}</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<div class="grid gap-6" style="grid-template-columns: 1fr 1fr;">
    <div class="card p-6">
        <h2 class="text-lg font-semibold mb-4">Customer Information</h2>
        <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
        <p><strong>Email:</strong> {{ $order->shipping_email }}</p>
        <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
        <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }}</p>
        @if($order->notes)
            <p><strong>Notes:</strong> {{ $order->notes }}</p>
        @endif
    </div>

    <div class="card p-6">
        <h2 class="text-lg font-semibold mb-4">Order Status</h2>
        <form method="POST" action="{{ route('admin.orders.update', $order) }}">
            @csrf
            @method('PATCH')
            <div class="flex items-center gap-4">
                <select name="status" class="input w-40">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </div>
        </form>
        <p class="mt-4 text-sm text-[var(--color-content-secondary)]">
            <strong>Order Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}
        </p>
    </div>
</div>

<div class="card p-6 mt-6">
    <h2 class="text-lg font-semibold mb-4">Order Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>PKR {{ number_format($item->price * 280, 0) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>PKR {{ number_format($item->price * $item->quantity * 280, 0) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right font-semibold">Total:</td>
                <td class="font-semibold">PKR {{ number_format($order->total * 280, 0) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection