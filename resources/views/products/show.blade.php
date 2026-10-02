@extends('layouts.app')

@section('title', $product->name . ' - PerfumeStore')

@section('content')
<!-- Breadcrumb -->
<section class="py-5 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-3 text-sm">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-[#0B0B0F] transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-[#0B0B0F] transition-colors">Shop</a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-gray-500 hover:text-[#0B0B0F] transition-colors">{{ $product->category->name }}</a>
            <span class="text-gray-300">/</span>
            <span class="text-[#0B0B0F] font-medium">{{ $product->name }}</span>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Product Image -->
            @php
            $allImages = collect();
            if ($product->image) {
                $allImages->push($product->image);
            }
            foreach ($product->images as $img) {
                $allImages->push($img->image);
            }
            $mainImage = $allImages->first();
            @endphp

            <div class="space-y-4">
                <!-- Main Image -->
                <div class="aspect-square bg-gray-100 rounded-2xl overflow-hidden">
                    @if($mainImage)
                    <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}" class="w-full h-full object-cover" id="main-image">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif
                </div>

                <!-- Thumbnails -->
                @if($allImages->count() > 1)
                <div class="flex gap-3 overflow-x-auto pb-2">
                    @foreach($allImages as $index => $img)
                    <button onclick="document.getElementById('main-image').src = '{{ asset($img) }}'" class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 border-2 {{ $index === 0 ? 'border-[#B8A878]' : 'border-transparent' }} hover:border-[#B8A878] transition-colors">
                        <img src="{{ asset($img) }}" alt="" class="w-full h-full object-cover">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="lg:py-4">
                <!-- Category -->
                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="inline-block text-sm font-medium text-amber-600 hover:text-amber-700 mb-2">
                    {{ $product->category->name }}
                </a>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-[#0B0B0F] mb-4">{{ $product->name }}</h1>

                <!-- Price -->
                <div class="flex items-baseline gap-3 mb-6">
                    <span class="text-3xl font-bold text-[#0B0B0F]">PKR {{ number_format($product->price * 280, 0) }}</span>
                    @if($product->hasDiscount())
                    <span class="text-lg text-gray-400 line-through">PKR {{ number_format($product->original_price * 280, 0) }}</span>
                    <span class="inline-flex items-center px-3 py-1 bg-amber-100 text-amber-800 text-sm font-semibold rounded-full">
                        Save {{ $product->discountPercentage() }}%
                    </span>
                    @endif
                </div>

                <!-- Description -->
                <p class="text-gray-600 mb-8 leading-relaxed">{{ $product->description }}</p>

                <!-- Stock Status -->
                <div class="flex items-center gap-2 mb-6">
                    @if($product->stock > 0)
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    <span class="text-sm text-green-700 font-medium">In Stock ({{ $product->stock }} available)</span>
                    @else
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                    <span class="text-sm text-red-700 font-medium">Out of Stock</span>
                    @endif
                </div>

                <!-- Add to Cart -->
                @auth
                @if($product->stock > 0)
                <form method="POST" action="{{ route('cart.add') }}" class="flex flex-col sm:flex-row gap-4 mb-8">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Quantity -->
                    <div class="flex items-center border border-gray-200 rounded-xl">
                        <button type="button" onclick="this.nextElementSibling.value = Math.max(1, parseInt(this.nextElementSibling.value) - 1)" class="px-4 py-3 text-gray-500 hover:text-[#0B0B0F] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-16 text-center border-none focus:outline-none focus:ring-0">
                        <button type="button" onclick="this.previousElementSibling.value = Math.min({{ $product->stock }}, parseInt(this.previousElementSibling.value) + 1)" class="px-4 py-3 text-gray-500 hover:text-[#0B0B0F] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>

                    <button type="submit" class="flex-1 sm:flex-none px-8 py-3 bg-[#0B0B0F] text-white font-semibold rounded-xl hover:bg-[#1f2937] transition-colors flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Add to Cart
                    </button>
                </form>
                @else
                <div class="px-8 py-3 bg-gray-100 text-gray-500 font-medium rounded-xl text-center mb-8">
                    Out of Stock
                </div>
                @endif
                @else
                <div class="mb-8">
                    <a href="{{ route('login') }}" class="block w-full px-8 py-3 bg-[#0B0B0F] text-white font-semibold rounded-xl text-center hover:bg-[#1f2937] transition-colors">
                        Login to Buy
                    </a>
                </div>
                @endauth

                <!-- Features -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-gray-100">
                    <div class="text-center">
                        <svg class="w-6 h-6 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        <p class="text-xs text-gray-500">Free Shipping</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-6 h-6 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.582 0A11.953 11.953 0 0112 2.944a11.953 11.953 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <p class="text-xs text-gray-500">Secure Payment</p>
                    </div>
                    <div class="text-center">
                        <svg class="w-6 h-6 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xs text-gray-500">Quality Assured</p>
                    </div>
                </div>

                <!-- Accordion -->
                <div class="mt-8 border border-gray-100 rounded-xl overflow-hidden">
                    <!-- Description Tab -->
                    <details class="group">
                        <summary class="flex items-center justify-between p-4 text-left bg-gray-50 hover:bg-gray-100 cursor-pointer list-none">
                            <span class="font-medium text-[#0B0B0F]">Description</span>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="p-4 border-t border-gray-100">
                            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        </div>
                    </details>

                    <!-- Notes Tab -->
                    <details class="group border-t border-gray-100">
                        <summary class="flex items-center justify-between p-4 text-left hover:bg-gray-50 cursor-pointer list-none">
                            <span class="font-medium text-[#0B0B0F]">Fragrance Notes</span>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="p-4 border-t border-gray-100">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <h4 class="font-medium text-[#0B0B0F] mb-2">Top Notes</h4>
                                    <p class="text-gray-500 text-sm">Fresh citrus, bergamot</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-[#0B0B0F] mb-2">Heart Notes</h4>
                                    <p class="text-gray-500 text-sm">Floral blend, jasmine</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-[#0B0B0F] mb-2">Base Notes</h4>
                                    <p class="text-gray-500 text-sm">Musk, sandalwood</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <!-- Shipping Tab -->
                    <details class="group border-t border-gray-100">
                        <summary class="flex items-center justify-between p-4 text-left hover:bg-gray-50 cursor-pointer list-none">
                            <span class="font-medium text-[#0B0B0F]">Shipping & Returns</span>
                            <svg class="w-5 h-5 text-gray-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="p-4 border-t border-gray-100">
                            <ul class="text-gray-500 text-sm space-y-2">
                                <li>Free shipping on orders above PKR 5000</li>
                                <li>Delivery within 3-5 business days</li>
                                <li>Cash on delivery available</li>
                                <li>7-day return policy for unused products</li>
                            </ul>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
@php
$avgRating = $product->averageRating();
$reviewCount = $product->reviewCount();
$ratingCounts = [5 => $product->reviews()->where('rating', 5)->count(), 4 => $product->reviews()->where('rating', 4)->count(), 3 => $product->reviews()->where('rating', 3)->count(), 2 => $product->reviews()->where('rating', 2)->count(), 1 => $product->reviews()->where('rating', 1)->count()];
$maxCount = max($ratingCounts);
@endphp

<section class="py-12 bg-[#FDFBF7] border-t border-gray-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Customer Reviews</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
            <!-- Left Column: Overall Rating -->
            <div class="text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-1 mb-2">
                    @for($i = 1; $i <= 3; $i++)
                    <svg class="w-8 h-8" fill="#B8A878" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                    @for($i = 4; $i <= 5; $i++)
                    <svg class="w-8 h-8" fill="none" stroke="#B8A878" stroke-width="1.5" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-2xl font-bold text-gray-900 underline decoration-[#B8A878] decoration-2">{{ number_format($avgRating, 2) }} out of 5</p>
                <div class="flex items-center justify-center md:justify-start gap-1 mt-2">
                    <span class="text-sm text-gray-600">Based on {{ $reviewCount }} {{ $reviewCount == 1 ? 'review' : 'reviews' }}</span>
                    <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm text-blue-500">Verified</span>
                </div>
            </div>

            <!-- Middle Column: Rating Distribution -->
            <div class="space-y-2">
                @for($star = 5; $star >= 1; $star--)
                @php $percentage = $maxCount > 0 ? ($ratingCounts[$star] / $maxCount) * 100 : 0; @endphp
                <div class="flex items-center gap-2">
                    <div class="flex w-12">
                        @for($i = 1; $i <= $star; $i++)
                        <svg class="w-3 h-3" fill="#B8A878" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                    <div class="flex-1 h-2.5 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full {{ $star == 5 ? 'bg-[#B8A878]' : 'bg-gray-300' }} rounded-full" style="width: {{ $star == 5 && $ratingCounts[5] > 0 ? $percentage : ($ratingCounts[$star] > 0 ? $percentage : 0) }}%"></div>
                    </div>
                    <span class="w-6 text-sm text-gray-600 text-right">{{ $ratingCounts[$star] }}</span>
                </div>
                @endfor
            </div>

            <!-- Right Column: Write Review Button -->
            <div class="flex justify-center md:justify-end">
                @auth
                <button onclick="document.getElementById('write-review-form').scrollIntoView({behavior: 'smooth'})" class="px-8 py-3 bg-[#B8A878] text-white font-semibold rounded-xl hover:bg-[#A89660] transition-colors">
                    Write a review
                </button>
                @else
                <a href="{{ route('login') }}" class="px-8 py-3 bg-[#B8A878] text-white font-semibold rounded-xl hover:bg-[#A89660] transition-colors">
                    Write a review
                </a>
                @endauth
            </div>
        </div>

        <!-- Individual Reviews List -->
        @if($product->reviews->isNotEmpty())
        <div class="mt-12 space-y-6">
            @foreach($product->reviews as $review)
            <div class="card p-6">
                <div class="flex items-start justify-between mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#B8A878] flex items-center justify-center">
                            <span class="text-white font-medium">{{ substr($review->user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ $review->user->name }}</p>
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-amber-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <span class="text-sm text-gray-400">{{ $review->created_at->format('M d, Y') }}</span>
                </div>
                @if($review->comment)
                <p class="text-gray-600 mt-3">{{ $review->comment }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500 mt-12">No reviews yet. Be the first to review this product!</p>
        @endif

<!-- Add Review Form -->
        @auth
        <div id="write-review-form" class="card p-6 mt-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Write a Review</h3>
            <form method="POST" action="{{ route('products.reviews.store', $product) }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <div class="flex items-center gap-2" id="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                        <button type="button" onclick="document.getElementById('rating-input').value = {{ $i }}; document.querySelectorAll('#star-rating button').forEach((btn, idx) => { btn.classList.toggle('text-[#B8A878]', idx < {{ $i }}); btn.classList.toggle('text-gray-300', idx >= {{ $i }}); })">
                            <svg class="w-8 h-8 text-gray-300 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-input" required>
                    @error('rating')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Comment (optional)</label>
                    <textarea name="comment" class="input" rows="3" placeholder="Share your experience with this product...">{{ old('comment') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
        @else
        <div class="card p-6 mt-8">
            <p class="text-gray-500">Please <a href="{{ route('login') }}" class="text-[#B8A878] hover:underline">login</a> to write a review.</p>
        </div>
        @endauth

    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->isNotEmpty())
<section class="py-12 md:py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-[#0B0B0F] mb-8">You May Also Like</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $related)
            @include('components.product-card', ['product' => $related])
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection