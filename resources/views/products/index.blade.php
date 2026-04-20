@extends('layouts.app')

@section('title', 'Shop - PerfumeStore')

@section('content')
<!-- Header -->
@php
$activeCategory = null;
if (!empty($selectedCategory)) {
    $activeCategory = $categories->firstWhere('slug', $selectedCategory);
}
@endphp
<section class="py-12 md:py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($activeCategory)
        <h1 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-4">{{ $activeCategory->name }} Perfumes</h1>
        <p class="text-gray-500 text-lg">Explore our {{ strtolower($activeCategory->name) }} fragrance collection</p>
        @else
        <h1 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-4">Shop All Products</h1>
        <p class="text-gray-500 text-lg">Discover our complete collection of premium fragrances</p>
        @endif
    </div>
</section>

<!-- Filters & Products -->
<section class="py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <aside class="w-full lg:w-64 flex-shrink-0">
                <div class="sticky top-24">
                    <form method="GET" class="space-y-6">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#111827]/20 focus:border-[#111827]">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select name="category" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#111827]/20 focus:border-[#111827]">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') === $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                            <div class="flex items-center gap-2">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#111827]/20 focus:border-[#111827]">
                                <span class="text-gray-400">-</span>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#111827]/20 focus:border-[#111827]">
                            </div>
                        </div>

                        <button type="submit" class="w-full px-4 py-2.5 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
                            Apply Filters
                        </button>

                        @if(request()->anyFilled(['search', 'category', 'min_price', 'max_price']))
                        <a href="{{ route('products.index') }}" class="block text-center text-sm text-gray-500 hover:text-amber-600">
                            Clear Filters
                        </a>
                        @endif
                    </form>
                </div>
            </aside>

            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Results Info -->
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-gray-500">
                        Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                    </p>
                    <select class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none">
                        <option>Sort by: Newest</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                    </select>
                </div>

                @if($products->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    @include('components.product-card', ['product' => $product])
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                <div class="mt-12">
                    {{ $products->withQueryString()->links() }}
                </div>
                @endif
                @else
                <div class="text-center py-20">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
                    <p class="text-gray-500 mb-6">Try adjusting your filters</p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
                        Clear Filters
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection