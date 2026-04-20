@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Products</h1>
    <a href="{{ route('admin.products.create') }}" class="px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
        + Add Product
    </a>
</div>

<!-- Filters -->
<form method="GET" class="flex flex-wrap gap-4 mb-6">
    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="px-4 py-2.5 w-64 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
    <select name="category_id" class="px-4 py-2.5 w-48 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <select name="status" class="px-4 py-2.5 w-32 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
        <option value="">All</option>
        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Product</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Category</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Price</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Stock</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Status</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-t border-gray-100">
                <td class="py-4 px-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div>
                            <p class="font-medium text-[#111827]">{{ $product->name }}</p>
                            @if($product->is_featured)
                                <span class="text-xs text-amber-600">Featured</span>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="py-4 px-6 text-gray-600">{{ $product->category->name }}</td>
                <td class="py-4 px-6 font-semibold text-[#111827]">PKR {{ number_format($product->price * 280, 0) }}</td>
                <td class="py-4 px-6">
                    <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $product->stock }}</span>
                </td>
                <td class="py-4 px-6">
                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium {{ $product->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="py-4 px-6">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $products->withQueryString()->links() }}
</div>
@endsection