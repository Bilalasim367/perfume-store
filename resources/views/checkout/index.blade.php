@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="min-h-screen bg-[var(--color-bg)] py-8">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-semibold text-[var(--color-primary)] mb-8">Checkout</h1>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div class="card p-6">
                        <h2 class="text-xl font-semibold text-[var(--color-primary)] mb-6">Shipping Information</h2>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="label">Full Name</label>
                                <input type="text" name="shipping_name" class="input" required value="{{ old('shipping_name', auth()->user()->name ?? '') }}">
                                @error('shipping_name')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label">Email</label>
                                <input type="email" name="shipping_email" class="input" required value="{{ old('shipping_email', auth()->user()->email ?? '') }}">
                                @error('shipping_email')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="label">Address</label>
                            <input type="text" name="shipping_address" class="input" required value="{{ old('shipping_address') }}">
                            @error('shipping_address')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="label">City</label>
                                <input type="text" name="shipping_city" class="input" required value="{{ old('shipping_city') }}">
                                @error('shipping_city')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label">Phone</label>
                                <input type="tel" name="shipping_phone" class="input" required value="{{ old('shipping_phone') }}">
                                @error('shipping_phone')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="label">Notes (optional)</label>
                            <textarea name="notes" class="input" rows="3">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    <div class="card p-6">
                        <h2 class="text-xl font-semibold text-[var(--color-primary)] mb-6">Order Items</h2>
                        <div class="space-y-4">
                            @foreach($cartItems as $item)
                            <div class="flex items-center gap-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                                <div class="w-16 h-16 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                                    @if($item->product->image)
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-[var(--color-primary)]">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="font-medium text-[var(--color-primary)]">PKR {{ number_format($item->product->price * $item->quantity * 280, 0) }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="card p-6 sticky top-24">
                        <h2 class="text-xl font-semibold text-[var(--color-primary)] mb-6">Order Summary</h2>
                        <div class="space-y-3 border-b border-gray-200 pb-4 mb-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Subtotal</span>
                                <span class="text-[var(--color-primary)]">PKR {{ number_format($total * 280, 0) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Shipping</span>
                                <span class="text-green-600">Free</span>
                            </div>
                        </div>
                        <div class="flex justify-between font-semibold text-xl mb-6">
                            <span class="text-[var(--color-primary)]">Total</span>
                            <span class="text-[var(--color-primary)]">PKR {{ number_format($total * 280, 0) }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary w-full">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection