@extends('layouts.app')

@section('title', 'My Wishlist - SAFARI Premium Perfumes')

@section('content')
<!-- Header -->
<section class="py-12 md:py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-4">My Wishlist</h1>
        <p class="text-gray-500 text-lg">Products you've saved for later</p>
    </div>
</section>

<!-- Wishlist Items -->
<section class="py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($wishlists->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($wishlists as $wishlist)
            @if($wishlist->product)
            <div class="card group overflow-hidden relative">
                <form action="{{ route('wishlist.destroy', $wishlist) }}" method="POST" class="absolute top-3 right-3 z-10">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </form>
                <a href="{{ route('products.show', $wishlist->product) }}">
                    <div class="aspect-[3/4] overflow-hidden relative">
                        @if($wishlist->product->image)
                        <img src="{{ asset($wishlist->product->image) }}" alt="{{ $wishlist->product->name }}" class="w-full h-full object-cover img-hover">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <span class="text-5xl text-gray-300">{{ substr($wishlist->product->name, 0, 1) }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-[#0B0B0F] group-hover:text-[#B8A878] transition-colors">{{ $wishlist->product->name }}</h3>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="text-[#B8A878] font-bold">PKR {{ number_format($wishlist->product->price * 280, 0) }}</span>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-full px-4 py-2 bg-[#0B0B0F] text-white text-sm font-medium rounded-lg hover:bg-[#1f2937] transition-colors">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Your wishlist is empty</h3>
            <p class="text-gray-500 mb-6">Save products you love by clicking the heart icon</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-[#0B0B0F] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
                Start Shopping
            </a>
        </div>
        @endif
    </div>
</section>
@endsection