@extends('layouts.admin')

@section('title', 'Purchase Notifications - SAFARI Admin')

@section('header')
<h1 class="text-2xl font-bold text-[#0B0B0F]">Purchase Notifications</h1>
@endsection

@section('content')
<div class="p-6">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.purchase-notifications.create') }}" class="px-4 py-2 bg-[#B8A878] text-[#0B0B0F] rounded-lg hover:bg-[#D4C4A8]">
            + Add Notification
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">ID</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Customer</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">City</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Product</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Date</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($notifications as $notification)
                <tr>
                    <td class="px-4 py-3 text-sm">{{ $notification->id }}</td>
                    <td class="px-4 py-3 text-sm">{{ $notification->customer_name }}</td>
                    <td class="px-4 py-3 text-sm">{{ $notification->city }}</td>
                    <td class="px-4 py-3 text-sm">{{ $notification->product_name }}</td>
                    <td class="px-4 py-3 text-sm">{{ $notification->created_at->format('M j, Y') }}</td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.purchase-notifications.destroy', $notification) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $notifications->links() }}</div>
</div>
@endsection