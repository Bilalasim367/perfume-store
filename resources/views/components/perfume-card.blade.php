@props(['product' => null, 'name' => 'Sample perfume', 'price' => '$0', 'image' => null, 'showAddToCart' => true])

@php
$productImage = $product?->image ?? $image;
$productName = $product?->name ?? $name;
$productPrice = $product?->price ? '$' . number_format($product->price, 2) : $price;
@endphp

<div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
    <!-- Product Image -->
    <div class="relative aspect-square overflow-hidden bg-gray-100">
        @if($productImage)
        <img src="{{ asset($productImage) }}" alt="{{ $productName }}" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
        <div class="w-full h-full flex items-center justify-center">
            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        @endif
        
        <!-- Quick Add Button -->
        @if($showAddToCart)
        <div class="absolute bottom-4 left-4 right-4 opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
            <button class="w-full py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
                Add to Cart
            </button>
        </div>
        @endif
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <h3 class="font-semibold text-[#111827] group-hover:text-amber-600 transition-colors mb-1">
            {{ $productName }}
        </h3>
        <p class="text-amber-600 font-bold">{{ $productPrice }}</p>
    </div>
</div>