@extends('layouts.app')

@section('title', 'Order Confirmed')

@section('content')
<div class="min-h-screen bg-[var(--color-bg)] py-8">
    <div class="max-w-2xl mx-auto px-4 text-center">
        <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-semibold text-[var(--color-primary)] mb-2">Order Confirmed!</h1>
        <p class="text-gray-500 mb-8">Thank you for your order. Your order #{{ $order->id }} has been placed successfully.</p>

        <div class="card p-6 text-left mb-8">
            <h2 class="text-xl font-semibold text-[var(--color-primary)] mb-4">Order Details</h2>
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500">Status</span>
                <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
            </div>
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500">Total</span>
                <span class="font-semibold text-[var(--color-primary)]">PKR {{ number_format($order->total * 280, 0) }}</span>
            </div>
            <div class="py-3">
                <p class="text-sm text-gray-500 mb-2">Shipping to:</p>
                <p class="text-[var(--color-primary)]">{{ $order->shipping_name }}</p>
                <p class="text-gray-500">{{ $order->shipping_address }}</p>
                <p class="text-gray-500">{{ $order->shipping_city }}</p>
            </div>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-primary inline-block">Continue Shopping</a>
    </div>
</div>
@endsection