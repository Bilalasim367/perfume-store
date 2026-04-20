@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="min-h-screen bg-[var(--color-bg)] py-8">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-semibold text-[var(--color-primary)] mb-8">My Orders</h1>

        @if($orders->isNotEmpty())
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="card p-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <p class="font-semibold text-lg text-[var(--color-primary)]">Order #{{ $order->id }}</p>
                        <p class="text-sm text-gray-500 mt-1">{{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="flex items-center gap-4 sm:text-right">
                        <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
                        <p class="text-xl font-semibold text-[var(--color-primary)]">PKR {{ number_format($order->total * 280, 0) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $orders->withQueryString()->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-[var(--color-primary)] mb-2">No orders yet</h2>
            <p class="text-gray-500 mb-8">You haven't placed any orders yet.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary inline-block">Start Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection