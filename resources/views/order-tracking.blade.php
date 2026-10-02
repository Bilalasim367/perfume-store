@extends('layouts.app')

@section('title', 'Track Your Order - SAFARI Premium Perfumes')

@section('content')
<!-- Hero Section -->
<section class="relative py-16 md:py-20 bg-[#1a1510]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-4">Order Status</span>
        <h1 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">Track Your Order</h1>
        <p class="text-gray-300 text-lg max-w-xl mx-auto">Enter your order details below to check the status of your order.</p>
    </div>
</section>

<!-- Tracking Form -->
<section class="section bg-white">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(isset($order))
            <!-- Order Found -->
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-display font-bold text-[#0B0B0F]">Order #{{ $order->id }}</h2>
                    <span class="px-4 py-2 rounded-full text-sm font-medium
                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                        @elseif($order->status === 'delivered') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <!-- Progress Steps -->
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        @php
                        $steps = ['pending' => 'Order Placed', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered'];
                        $currentStep = array_search($order->status, array_keys($steps));
                        @endphp
                        @foreach($steps as $key => $label)
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold
                                @if($loop->index <= $currentStep) bg-[#B8A878] text-[#0B0B0F] @else bg-gray-200 text-gray-500 @endif">
                                @if($loop->index <= $currentStep)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                @else
                                {{ $loop->index + 1 }}
                                @endif
                            </div>
                            <span class="text-xs mt-2 @if($loop->index <= $currentStep) text-[#0B0B0F] @else text-gray-400 @endif">{{ $label }}</span>
                        </div>
                        @if(!$loop->last)
                        <div class="flex-1 h-1 mx-2 @if($loop->index < $currentStep) bg-[#B8A878] @else bg-gray-200 @endif"></div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <!-- Order Details -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="font-semibold text-[#0B0B0F] mb-4">Order Items</h3>
                    @foreach($order->items as $item)
                    <div class="flex items-center gap-4 py-3 border-b border-gray-100">
                        <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                            @if($item->product->image)
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-[#0B0B0F]">{{ $item->product->name }}</h4>
                            <p class="text-gray-500 text-sm">Qty: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-[#0B0B0F]">PKR {{ number_format($item->price * 280, 0) }}</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex justify-between py-4">
                        <span class="font-semibold text-[#0B0B0F]">Total</span>
                        <span class="font-bold text-xl text-[#B8A878]">PKR {{ number_format($order->total * 280, 0) }}</span>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="border-t border-gray-200 pt-6 mt-6">
                    <h3 class="font-semibold text-[#0B0B0F] mb-4">Shipping Address</h3>
                    <p class="text-gray-600">{{ $order->shipping_name }}</p>
                    <p class="text-gray-600">{{ $order->shipping_address }}</p>
                    <p class="text-gray-600">{{ $order->shipping_city }}</p>
                    <p class="text-gray-600">{{ $order->shipping_phone }}</p>
                </div>

                <div class="mt-8">
                    <a href="{{ route('order-tracking') }}" class="text-[#B8A878] hover:underline">Track Another Order</a>
                </div>
            </div>
        @else
            <!-- Search Form -->
            <form action="{{ route('order.track') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Order ID</label>
                    <input type="number" name="order_id" required placeholder="Enter your order ID" value="{{ old('order_id') }}" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" required placeholder="Enter your email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                </div>
                
                @if(session('error'))
                <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                    <p class="text-red-600">{{ session('error') }}</p>
                </div>
                @endif
                
                <button type="submit" class="w-full px-6 py-4 bg-[#B8A878] text-[#0B0B0F] font-semibold rounded-xl hover:bg-[#D4C4A8] transition-colors">
                    Track Order
                </button>
            </form>
        @endif
    </div>
</section>

<!-- Help Section -->
<section class="section bg-gray-50">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="font-semibold text-[#0B0B0F] mb-2">Need Help?</h3>
        <p class="text-gray-600 mb-4">Contact us if you have any questions about your order.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center text-[#B8A878] hover:underline">
            Contact Support
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>
@endsection