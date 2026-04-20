@extends('layouts.app')

@section('title', 'SAFARI - Premium Perfumes')

@section('content')
<!-- 1. HERO SECTION -->
@php
$heroImage = asset('storage/hero/hero1.png');
@endphp

<section class="relative min-h-[85vh] flex items-center overflow-hidden">
    @if($heroImage)
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $heroImage }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1510]/90 to-[#1a1510]/40"></div>
    </div>
    @else
    <div class="absolute inset-0 bg-gradient-to-r from-[#1a1510] via-[#2a2520] to-[#1a1510]"></div>
    @endif

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left">
                <span class="inline-block px-5 py-2 bg-[#B8A878]/10 text-[#B8A878] text-sm font-medium rounded-full mb-8">MASSIVE DEAL</span>
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-display font-bold text-white mb-6 leading-[1.1]">
                    Discover Your<br>
                    <span class="text-[#B8A878]">Signature Scent</span>
                </h1>
                <div class="flex items-center justify-center lg:justify-start gap-4 mb-10">
                    <span class="text-4xl sm:text-5xl font-bold text-[#B8A878]">FLAT 15% OFF</span>
                    <span class="text-gray-300 text-lg">On Restocked Fragrances</span>
                </div>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-10 py-4 bg-[#B8A878] text-[#0B0B0F] font-semibold rounded-xl hover:bg-[#D4C4A8] transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    Shop Now
                    <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. NEW ARRIVALS -->
@php
$newProducts = \App\Models\Product::active()->inStock()->latest()->take(4)->get();
@endphp

@if($newProducts->isNotEmpty())
<section class="section bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Fresh Drops</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">New Arrivals</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Be the first to experience our latest creations.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach($newProducts as $product)
            <a href="{{ route('products.show', $product) }}" class="group block">
                <div class="card overflow-hidden flex flex-col">
                    <div class="aspect-[3/4] lg:aspect-[3/5] overflow-hidden relative">
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover img-hover">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <span class="text-6xl text-gray-300">{{ substr($product->name, 0, 1) }}</span>
                        </div>
                        @endif
                        @if($product->original_price && $product->discountPercentage() > 0)
                        <span class="absolute top-3 left-3 px-3 py-1 bg-[#B8A878] text-[#0B0B0F] text-xs font-bold rounded-full">-{{ $product->discountPercentage() }}% OFF</span>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-[#0B0B0F] text-lg lg:text-xl group-hover:text-[#B8A878] transition-colors">{{ $product->name }}</h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[#B8A878] font-bold text-xl">PKR {{ number_format($product->price * 280, 0) }}</span>
                            @if($product->original_price && $product->discountPercentage() > 0)
                            <span class="text-gray-400 line-through text-sm">PKR {{ number_format($product->original_price * 280, 0) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 3. TRUST STRIP -->
<section class="py-12 bg-[#1a1510] border-y border-[#2a2520]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-center gap-12 md:gap-24">
            <div class="flex items-center gap-4 text-gray-300">
                <svg class="w-14 h-14 text-[#B8A878]" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="text-xl font-medium">4.9 Star Reviews</span>
            </div>
            <div class="flex items-center gap-4 text-gray-300">
                <svg class="w-14 h-14 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span class="text-xl font-medium">100% Authentic</span>
            </div>
            <div class="flex items-center gap-4 text-gray-300">
                <svg class="w-14 h-14 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span class="text-xl font-medium">Fast Delivery</span>
            </div>
            <div class="flex items-center gap-4 text-gray-300">
                <svg class="w-14 h-14 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-xl font-medium">Cash on Delivery</span>
            </div>
        </div>
    </div>
</section>

<!-- 4. COLLECTIONS 3x2 Grid -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Discover</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">Explore Our Collections</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @php
            $collections = [
                ['name' => 'Attars', 'slug' => 'attars', 'category' => 'Attars', 'desc' => 'Traditional Arabian Fragrances'],
                ['name' => 'Signature', 'slug' => 'signature', 'category' => 'Fresh & Zesty', 'desc' => 'Citrus & Fruity Blends'],
                ['name' => 'Dark Temptation', 'slug' => 'dark temptation', 'category' => 'Gourmand', 'desc' => 'Coffee & Chocolate Notes'],
                ['name' => 'Candles', 'slug' => 'candles', 'category' => 'Home Fragrance', 'desc' => 'Scented Jar Candles'],
                ['name' => 'Privé', 'slug' => 'prive', 'category' => 'Luxury Blend', 'desc' => 'Exclusive Collections'],
                ['name' => 'Exclusif', 'slug' => 'exclusif', 'category' => 'Oriental', 'desc' => 'Amber & Spices'],
            ];
            @endphp
            @foreach($collections as $col)
            @php
            $slugMap = [
                'Attars' => 'attars.png',
                'Signature' => 'signature.png',
                'Dark Temptation' => 'Dark Temptation.png',
                'Candles' => 'Candles.png',
                'Privé' => 'prive.png',
                'Exclusif' => 'Exclusif.png',
            ];
            $filename = $slugMap[$col['name']] ?? strtolower(str_replace(' ', '', $col['name'])) . '.png';
            $imagePath = asset('storage/collections/' . $filename);
            @endphp
            <div class="relative group aspect-[3/4] rounded-2xl overflow-hidden cursor-pointer">
                @if(file_exists(public_path('storage/collections/' . $filename)))
                <img src="{{ $imagePath }}" alt="{{ $col['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                <div class="absolute inset-0 bg-[#8B7355]"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 z-20">
                    <span class="text-xs text-[#B8A878] font-medium tracking-wider uppercase">{{ $col['category'] }}</span>
                    <h3 class="text-2xl font-display font-bold text-white mt-1">{{ $col['name'] }}</h3>
                    <p class="text-gray-300 text-sm mt-2">{{ $col['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 5. STORY SECTION -->
<section class="section bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Our Story</span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-6">Crafted for Those Who Lead</h2>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">Each fragrance is a masterpiece, carefully curated from the world's finest perfumeries. We believe that your scent is your signature statement.</p>
                <p class="text-gray-500 mb-8 leading-relaxed">From ancient Arabian traditions to modern European craft, we've sourced the most exquisite ingredients to create scents that leave a lasting impression.</p>
                <a href="#" class="inline-flex items-center px-8 py-4 border-2 border-[#B8A878] text-[#B8A878] font-semibold rounded-xl hover:bg-[#B8A878] hover:text-[#0B0B0F] transition-all duration-300">
                    Read More
                </a>
            </div>
            <div class="relative aspect-square rounded-3xl overflow-hidden shadow-2xl">
                <img src="{{ asset('storage/stories/story1.png') }}" alt="Our Story" class="w-full h-full object-cover img-hover">
                <div class="absolute inset-0 bg-gradient-to-tr from-black/10 to-transparent"></div>
            </div>
        </div>
    </div>
</section>

<!-- 6. BUNDLES -->
@php
$bundles = \App\Models\Bundle::active()->take(4)->get();
@endphp

@if($bundles->isNotEmpty())
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Value Sets</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">Bundles</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Save more with our curated bundles.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($bundles as $bundle)
            <div class="card group overflow-hidden">
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
                    <div class="flex items-center gap-2">
                        <span class="text-[#B8A878] font-bold text-xl">PKR {{ number_format($bundle->price * 280, 0) }}</span>
                        @if($bundle->original_price)
                        <span class="text-gray-400 line-through text-sm">PKR {{ number_format($bundle->original_price * 280, 0) }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 7. CUSTOMER REVIEWS -->
@php
$recentReviews = \App\Models\Review::with('user')->latest()->take(6)->get();
@endphp

@if($recentReviews->isNotEmpty())
<section class="section bg-[#FDFBF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Testimonials</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">50,000+ Satisfied Customers</h2>
        </div>

        <div class="relative py-8">
            <!-- Left Arrow -->
            <button onclick="slideReviews(-1)" class="absolute left-2 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white rounded-full shadow-xl flex items-center justify-center text-gray-600 hover:text-gray-900 transition-colors hidden md:flex">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <!-- Right Arrow -->
            <button onclick="slideReviews(1)" class="absolute right-2 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white rounded-full shadow-xl flex items-center justify-center text-gray-600 hover:text-gray-900 transition-colors hidden md:flex">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <div class="overflow-x-auto hide-scrollbar px-4 md:px-16" id="reviews-slider">
                <div class="flex gap-6" id="slider-track">
                    @php
                    $reviews = [
                        ['name' => 'Umer Raja', 'title' => 'Long awaited fragrance', 'text' => 'Absolutely love this scent! Perfect for evening occasions. Gets me compliments every time I wear it.', 'product' => 'Smokey Vanille - Impression of Tobacco Vanille'],
                        ['name' => 'Ismaeel', 'title' => 'One word Seductive and Smooth', 'text' => 'This fragrance is amazing. Long lasting and the scent is so smooth. Worth every penny!', 'product' => 'Poisonous Touch - Impression of Poison Ivy'],
                        ['name' => 'Umair Nawaz', 'title' => 'Smooth and gorgeous', 'text' => 'Best perfume I have ever bought. Great projection and sillage. Highly recommended!', 'product' => 'Chic Magnet - Impression of Office for Men'],
                        ['name' => 'Ahmed Bilal', 'title' => 'Amazing fragrance', 'text' => 'Love the scent! Very refreshing and long lasting. Great value for money.', 'product' => 'Ocean Breeze - Fresh & Aquatic'],
                        ['name' => 'Ali Raza', 'title' => 'Perfect for daily use', 'text' => 'This is my go-to fragrance now. Not too overpowering, just perfect!', 'product' => 'Midnight Rose - Floral Blend'],
                        ['name' => 'Saif Khan', 'title' => 'Great scent', 'text' => 'Received many compliments. The scent is elegant and sophisticated.', 'product' => 'Amber Dreams - Oriental Blend'],
                    ];
                    
                    if($recentReviews->count() > 0) {
                        $reviewData = $recentReviews->first();
                        if($reviewData && $reviewData->comment) {
                            $reviews[0]['text'] = Str::limit($reviewData->comment, 80);
                            $reviews[0]['rating'] = $reviewData->rating;
                            if($reviewData->user) {
                                $reviews[0]['name'] = $reviewData->user->name;
                            }
                        }
                    }
                    @endphp
                    
                    @foreach($reviews as $idx => $review)
                    <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                        <div class="bg-white rounded-2xl shadow-lg p-6 h-full">
                            <!-- Star Rating -->
                            <div class="flex items-center gap-1 mb-4">
                                @for($i = 1; $i <= 4; $i++)
                                <svg class="w-5 h-5 text-[#B8A878]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            
                            <!-- Review Title -->
                            <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $review['title'] }}</h3>
                            
                            <!-- Review Body -->
                            <p class="text-gray-600 mb-4 leading-relaxed">{{ $review['text'] }}</p>
                            
                            <!-- Customer Name -->
                            <p class="font-semibold text-gray-700 text-base mb-1">{{ $review['name'] }}</p>
                            
                            <!-- Product Reference -->
                            <p class="text-gray-400 text-xs">{{ $review['product'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
.hide-scrollbar::-webkit-scrollbar { display: none; }
</style>

<script>
let autoSlideInterval;
let currentSlide = 0;

function slideReviews(direction) {
    const container = document.getElementById('reviews-slider');
    const track = document.getElementById('slider-track');
    const cards = track.children;
    if (cards.length > 0) {
        let cardWidth = cards[0].offsetWidth;
        const gap = 24;
        const scrollAmount = (cardWidth + gap) * direction;
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
}

function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        const container = document.getElementById('reviews-slider');
        const track = document.getElementById('slider-track');
        const cards = track.children;
        const containerWidth = container.offsetWidth;
        const maxScroll = container.scrollWidth - containerWidth;
        
        if (container.scrollLeft >= maxScroll - 50) {
            container.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            slideReviews(1);
        }
    }, 4000);
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('reviews-slider');
    container.addEventListener('mouseenter', stopAutoSlide);
    container.addEventListener('mouseleave', startAutoSlide);
    startAutoSlide();
});
</script>
@endif

<!-- 8. CATEGORY BANNERS -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $personCategories = [
                ['name' => 'Male', 'image' => 'male.png'],
                ['name' => 'Female', 'image' => 'female.png'],
                ['name' => 'Unisex', 'image' => 'unisex.png'],
            ];
            @endphp
            @foreach($personCategories as $cat)
            <div class="relative group aspect-[3/4] rounded-2xl overflow-hidden">
                <img src="{{ asset('storage/person categories/' . $cat['image']) }}" alt="{{ $cat['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent z-10"></div>
                <div class="absolute bottom-6 left-6 z-20">
                    <h3 class="text-2xl font-display font-bold text-white">{{ $cat['name'] }}</h3>
                    <a href="{{ route('products.index') }}" class="text-[#B8A878] text-sm mt-2 inline-flex items-center group-hover:underline">Shop Now →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 9. FEATURES -->
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
            <div class="text-center">
                <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-[#0B0B0F] text-lg">Money-back Guarantee</h4>
                <p class="text-gray-500 text-sm mt-2">30-day hassle-free returns</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-[#0B0B0F] text-lg">Fast Shipping</h4>
                <p class="text-gray-500 text-sm mt-2">Free delivery over PKR 5000</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.874 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-[#0B0B0F] text-lg">24/7 Support</h4>
                <p class="text-gray-500 text-sm mt-2">Always here to help you</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2 2 2-2-2-2-2 2zM8 7l2-2 2 2-2 2-2-2zM12 11l2-2 2 2-2 2-2-2z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-[#0B0B0F] text-lg">Premium Quality</h4>
                <p class="text-gray-500 text-sm mt-2">100% authentic fragrances</p>
            </div>
        </div>
    </div>
</section>
@endsection
