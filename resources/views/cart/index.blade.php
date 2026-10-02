@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-display font-bold text-[#0B0B0F] mb-8">Shopping Cart</h1>

        @if($cartItems->isNotEmpty())
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="card p-4 sm:p-6 flex flex-col sm:flex-row gap-4 sm:items-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-2xl flex items-center justify-center flex-shrink-0 overflow-hidden">
                        @if($item->product->image)
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-xs text-gray-400">{{ $item->product->name }}</span>
                        @endif
                    </div>
                    <div class="flex-1">
                        <a href="{{ route('products.show', $item->product) }}" class="font-semibold text-lg text-#0B0B0F hover:text-#B8A878 transition-colors">{{ $item->product->name }}</a>
                        <p class="text-#B8A878 font-medium mt-1">PKR {{ number_format($item->product->price * 280, 0) }}</p>
                        <div class="flex flex-wrap items-center gap-4 mt-4">
                            <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <label class="text-sm text-gray-500">Qty:</label>
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" class="input w-20 text-center">
                                <button type="submit" class="btn btn-secondary text-sm px-3 py-1.5">Update</button>
                            </form>
                            <form method="POST" action="{{ route('cart.remove', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:text-red-700 transition-colors">Remove</button>
                            </form>
                        </div>
                    </div>
                    <div class="text-right sm:ml-auto">
                        <p class="text-xl font-semibold text-#0B0B0F">PKR {{ number_format($item->product->price * $item->quantity * 280, 0) }}</p>
                    </div>
                </div>
                @endforeach

                <form method="POST" action="{{ route('cart.clear') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 hover:text-red-500 transition-colors">Clear Cart</button>
                </form>
            </div>

            <div class="lg:col-span-1">
                <div class="card p-6 sticky top-24">
                    <h2 class="text-xl font-semibold text-#0B0B0F mb-6">Order Summary</h2>
                    <div class="space-y-3 border-b border-gray-200 pb-4 mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Subtotal</span>
                            <span class="text-#0B0B0F">PKR {{ number_format($total * 280, 0) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Shipping</span>
                            <span class="text-green-600">Free</span>
                        </div>
                    </div>
                    <div class="flex justify-between font-semibold text-xl mb-6">
                        <span class="text-#0B0B0F">Total</span>
                        <span class="text-#0B0B0F">PKR {{ number_format($total * 280, 0) }}</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary w-full text-center">Proceed to Checkout</a>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-#0B0B0F mb-2">Your cart is empty</h2>
            <p class="text-gray-500 mb-8">Looks like you haven't added anything yet.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary inline-block">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection