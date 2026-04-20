@props(['product'])

<div class="group">
    <div class="card h-full">
        <!-- Image Container -->
        <div class="relative aspect-square overflow-hidden bg-gray-100">
            @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            @else
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            @endif

            <!-- Badge -->
            @if($product->hasDiscount())
            <span class="absolute top-3 left-3 badge-warning text-xs font-semibold px-2 py-1">
                -{{ $product->discountPercentage() }}%
            </span>
            @endif

            <!-- Out of Stock Overlay -->
            @if($product->stock <= 0)
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <span class="text-white font-medium">Out of Stock</span>
            </div>
            @endif

            <!-- Quick Add Button (Desktop) -->
            @auth
            @if($product->stock > 0)
            <form method="POST" action="{{ route('cart.add') }}" class="absolute bottom-4 left-4 right-4 opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="w-full btn-primary text-sm py-2.5">
                    Add to Cart
                </button>
            </form>
            @endif
            @endauth
        </div>

        <!-- Content -->
        <div class="p-4">
            <!-- Category -->
            <p class="text-xs text-gray-500 mb-1">{{ $product->category->name }}</p>

            <!-- Title -->
            <a href="{{ route('products.show', $product) }}" class="block">
                <h3 class="font-semibold text-primary mb-2 line-clamp-1 group-hover:text-amber-600 transition-colors">{{ $product->name }}</h3>
            </a>

            <!-- Price -->
            <div class="flex items-center gap-2">
                <span class="text-lg font-bold text-primary">PKR {{ number_format($product->price * 280, 0) }}</span>
                @if($product->hasDiscount())
                <span class="text-sm text-gray-400 line-through">PKR {{ number_format($product->original_price * 280, 0) }}</span>
                @endif
            </div>

            <!-- Mobile Add to Cart -->
            @auth
            @if($product->stock > 0)
            <form method="POST" action="{{ route('cart.add') }}" class="mt-4 md:hidden">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="w-full btn-outline text-sm py-2">
                    Add to Cart
                </button>
            </form>
            @endif
            @endauth
        </div>
    </div>
</div>