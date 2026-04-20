@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Dashboard</h1>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Products</p>
                <p class="text-3xl font-bold text-[#111827]">{{ $stats['products'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Orders</p>
                <p class="text-3xl font-bold text-[#111827]">{{ $stats['orders'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Customers</p>
                <p class="text-3xl font-bold text-[#111827]">{{ $stats['users'] }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 mb-1">Revenue</p>
                <p class="text-3xl font-bold text-amber-600">PKR {{ number_format($stats['revenue'] * 280, 0) }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0-1H9m3-1h3m5.364-1.636a8 8 0 11-12.728 0"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <h2 class="text-xl font-semibold text-[#111827] mb-6">Recent Orders</h2>
    @if($recentOrders->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 text-sm font-medium text-gray-500">Order ID</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">Date</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">Status</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr class="border-b border-gray-100 last:border-0">
                    <td class="py-4 font-medium">#{{ $order->id }}</td>
                    <td class="py-4 text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                    <td class="py-4">
                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="py-4 font-semibold">PKR {{ number_format($order->total * 280, 0) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-gray-500 text-center py-8">No orders yet</p>
    @endif
</div>
@endsection