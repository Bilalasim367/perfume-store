@extends('layouts.admin')

@section('title', 'Add Purchase Notification - SAFARI Admin')

@section('header')
<h1 class="text-2xl font-bold text-[#0B0B0F]">Add Purchase Notification</h1>
@endsection

@section('content')
<div class="p-6">
    <a href="{{ route('admin.purchase-notifications.index') }}" class="text-[#B8A878] hover:underline mb-4 inline-block">&larr; Back</a>

    <form action="{{ route('admin.purchase-notifications.store') }}" method="POST" class="max-w-lg">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Customer Name</label>
            <input type="text" name="customer_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B8A878]">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
            <input type="text" name="city" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B8A878]">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
            <input type="text" name="product_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B8A878]">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Product Image Path</label>
            <input type="text" name="product_image" placeholder="storage/products/demo.png" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B8A878]">
            <p class="text-xs text-gray-500 mt-1">Example: storage/products/1776632967_69e544878014f.png</p>
        </div>

        <button type="submit" class="px-6 py-2 bg-[#B8A878] text-[#0B0B0F] rounded-lg hover:bg-[#D4C4A8]">
            Create Notification
        </button>
    </form>
</div>
@endsection