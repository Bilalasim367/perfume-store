@extends('layouts.app')

@section('title', 'Bundles - SAFARI Premium Perfumes')

@section('content')
<!-- Header -->
<section class="py-12 md:py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-4">Perfume Bundles</h1>
        <p class="text-gray-500 text-lg">Save more with our curated bundles. Perfect for gifts or personal collection.</p>
    </div>
</section>

<!-- Bundles Grid -->
<section class="py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($bundles->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($bundles as $bundle)
            <div class="card group overflow-hidden">
                <a href="#" class="block">
                    <div class="aspect-square overflow-hidden relative">
                        @if($bundle->image)
                        <img src="{{ asset($bundle->image) }}" alt="{{ $bundle->name }}" class="w-full h-full object-cover img-hover">
                        @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <span class="text-5xl text-gray-300">B</span>
                        </div>
                        @endif
                        @if($bundle->original_price)
                        <span class="absolute top-3 right-3 px-3 py-1 bg-[#B8A878] text-[#0B0B0F] text-xs font-bold rounded-full">-{{ $bundle->discountPercentage() }}%</span>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-[#0B0B0F] text-lg mb-2">{{ $bundle->name }}</h3>
                        <p class="text-gray-500 text-sm mb-3">{{ $bundle->description }}</p>
                        <div class="flex items-center gap-2">
                            <span class="text-[#B8A878] font-bold text-xl">PKR {{ number_format($bundle->price * 280, 0) }}</span>
                            @if($bundle->original_price)
                            <span class="text-gray-400 line-through text-sm">PKR {{ number_format($bundle->original_price * 280, 0) }}</span>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @if($bundles->hasPages())
        <div class="mt-12">
            {{ $bundles->withQueryString()->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No bundles available</h3>
            <p class="text-gray-500">Check back soon for new bundle offers!</p>
        </div>
        @endif
    </div>
</section>
@endsection