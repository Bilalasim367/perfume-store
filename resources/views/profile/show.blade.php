@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-display font-bold text-[#0B0B0F] mb-8">My Profile</h1>

        <div class="grid gap-6">
            <!-- Profile Information -->
            <div class="card p-6">
                <h2 class="text-xl font-semibold text-[#0B0B0F] mb-6">Profile Information</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-full bg-[#B8A878] flex items-center justify-center">
                            <span class="text-3xl text-[#0B0B0F] font-medium">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#0B0B0F]">{{ $user->name }}</h3>
                            <p class="text-gray-500">{{ $user->email }}</p>
                            <p class="text-gray-400 text-sm">Member since {{ $user->created_at->format('F Y') }}</p>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                        <div>
                            <label class="block text-sm text-gray-500 mb-1">Full Name</label>
                            <p class="text-[#0B0B0F] font-medium">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-500 mb-1">Email Address</label>
                            <p class="text-[#0B0B0F] font-medium">{{ $user->email }}</p>
                        </div>
                        @if($user->phone)
                        <div>
                            <label class="block text-sm text-gray-500 mb-1">Phone Number</label>
                            <p class="text-[#0B0B0F] font-medium">{{ $user->phone }}</p>
                        </div>
                        @endif
                        @if($user->address)
                        <div>
                            <label class="block text-sm text-gray-500 mb-1">Address</label>
                            <p class="text-[#0B0B0F] font-medium">{{ $user->address }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="card p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-[#0B0B0F]">Recent Orders</h2>
                    <a href="{{ route('checkout.orders') }}" class="text-sm text-[#B8A878] hover:text-[#9a8b5e] font-medium">View All</a>
                </div>

                @if($user->orders->isNotEmpty())
                <div class="space-y-4">
                    @foreach($user->orders->take(5) as $order)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div>
                            <p class="font-medium text-[#0B0B0F]">Order #{{ $order->id }}</p>
                            <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-medium text-[#0B0B0F]">PKR {{ number_format($order->total * 280, 0) }}</p>
                            <span class="inline-block px-2 py-1 text-xs rounded-full 
                                @if($order->status === 'completed') bg-green-100 text-green-700
                                @elseif($order->status === 'pending') bg-yellow-100 text-yellow-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-center py-8">No orders yet. <a href="{{ route('products.index') }}" class="text-[#B8A878] hover:underline">Start shopping</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
