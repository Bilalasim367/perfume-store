@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<h1 class="text-3xl font-bold text-[#111827] mb-8">Orders</h1>

<!-- Filters -->
<form method="GET" class="flex flex-wrap gap-4 mb-6">
    <input type="text" name="search" placeholder="Search by name or email..." value="{{ request('search') }}" class="px-4 py-2.5 w-64 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
    <select name="status" class="px-4 py-2.5 w-40 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
        <option value="">All Statuses</option>
        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
        <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Shipped</option>
        <option value="delivered" {{ request('status') === 'delivered' ? 'selected' : '' }}>Delivered</option>
        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>
    <button type="submit" class="px-6 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors">
        Filter
    </button>
</form>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 text-green-700 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Order ID</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Customer</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Total</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Status</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Date</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-t border-gray-100">
                <td class="py-4 px-6 font-medium">#{{ $order->id }}</td>
                <td class="py-4 px-6">
                    <p class="font-medium text-[#111827]">{{ $order->shipping_name }}</p>
                    <p class="text-sm text-gray-500">{{ $order->shipping_email }}</p>
                </td>
                <td class="py-4 px-6 font-semibold">PKR {{ number_format($order->total * 280, 0) }}</td>
                <td class="py-4 px-6">
                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium 
                        {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 
                           ($order->status === 'pending' ? 'bg-amber-100 text-amber-700' : 
                           ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700')) }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td class="py-4 px-6 text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                <td class="py-4 px-6">
                    <a href="{{ route('admin.orders.show', $order) }}" class="text-amber-600 hover:text-amber-800 font-medium">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $orders->withQueryString()->links() }}
</div>
@endsection