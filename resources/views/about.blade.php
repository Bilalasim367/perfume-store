@extends('layouts.app')

@section('title', 'About Us - SAFARI Premium Perfumes')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 md:py-28 bg-[#1a1510]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-4">Our Story</span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-white mb-6">The Art of Scent</h1>
        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto">Discover the essence of SAFARI — where every fragrance tells a story of luxury, craftsmanship, and timeless elegance.</p>
    </div>
</section>

<!-- Section 1: About SAFARI -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">About SAFARI</span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-6">Crafting Luxury Fragrances Since 2020</h2>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">SAFARI is an ode to the timeless art of perfumery, established in 2020 with a vision to transcend fleeting trends and create enduring legacies of scent. Born from a profound appreciation for nature's most exquisite essences and a commitment to meticulous craftsmanship, SAFARI has blossomed into a revered house where every fragrance tells a story.</p>
                <p class="text-gray-600 text-lg leading-relaxed">We blend ancient traditions with modern innovation, meticulously sourcing the finest ingredients from around the globe to craft perfumes that are not just scents, but journeys for the senses. Our heritage is woven with threads of passion, precision, and an unwavering dedication to creating olfactory masterpieces that resonate with elegance and individuality.</p>
            </div>
            <div class="relative aspect-[4/5] rounded-3xl overflow-hidden">
                <img src="{{ asset('storage/stories/story1.png') }}" alt="SAFARI Story" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Section 2: The Founders -->
<section class="section bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Our Visionaries</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">The Founders</h2>
        </div>
        <div class="max-w-3xl mx-auto">
            <p class="text-gray-600 text-lg mb-6 leading-relaxed">SAFARI was born from a shared dream between passionate perfume enthusiasts who believed that everyone deserves to experience the transformative power of a truly exceptional fragrance. What started as a small home-based operation has grown into one of the most sought-after perfume houses in the region.</p>
            <p class="text-gray-600 text-lg mb-6 leading-relaxed">Our founders dedicated years to mastering the art of perfumery, traveling to the world's most renowned fragrance houses in Grasse, Paris, and Dubai to learn traditional techniques passed down through generations. Their commitment to sourcing only the finest ingredients—rare ouds from the Middle East, exotic florals from Grasse, and crisp citrus from Mediterranean groves—ensures that every SAFARI fragrance is a masterpiece.</p>
            <p class="text-gray-600 text-lg leading-relaxed">Today, that passion continues to drive everything we do. Each bottle of SAFARI is a testament to our founders' vision: to create scents that not only smell extraordinary but become integral parts of our customers' most cherished memories.</p>
        </div>
    </div>
</section>

<!-- Section 3: Where It Truly Began -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/collections/attars.png') }}" alt="Our Beginning" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/collections/signature.png') }}" alt="Our Beginning" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Our Roots</span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-6">Where It Truly Began</h2>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">Our journey began in a modest studio in the heart of Dubai, where our founders spent countless hours experimenting with rare essences and perfecting their craft. Every blend was carefully crafted, tested, and refined until it achieved perfection.</p>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">From the very beginning, we committed to three core values: authenticity in every note, meticulous attention to detail, and an unwavering dedication to quality. We refused to compromise on ingredients—only the purest, most luxurious components would make it into our bottles.</p>
                <p class="text-gray-600 text-lg leading-relaxed">That small beginning has grown into something far greater, but our founding principles remain unchanged. Every SAFARI fragrance still carries the same dedication to excellence that motivated those early days.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Our Flagship Boutique -->
<section class="section bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Visit Us</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">Our Flagship Boutique</h2>
        </div>
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-gray-600 text-lg mb-6 leading-relaxed">Our flagship boutique in Dubai stands as a testament to the art of luxury. Designed as an immersive olfactory experience, the space welcomes visitors to explore our collections in an environment that reflects the sophistication of our fragrances.</p>
            <p class="text-gray-600 text-lg mb-6 leading-relaxed">Every corner reveals a new discovery—from our curated selection of rare attars to our signature eau de parfum collections. The boutique features bespoke consultation服务, where our fragrance experts guide you through a personalized journey to find your signature scent.</p>
            <p class="text-gray-600 text-lg leading-relaxed">Located in the heart of Dubai, our boutique is more than a retail space—it's a destination for those who appreciate the finer things in life.</p>
            
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <div class="flex items-center gap-2 text-gray-600">
                    <svg class="w-5 h-5 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Dubai, UAE</span>
                </div>
                <div class="flex items-center gap-2 text-gray-600">
                    <svg class="w-5 h-5 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Open Daily: 10AM - 10PM</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: What Makes Us Special -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Why Choose SAFARI</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">What Makes SAFARI Special</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2 2 2-2-2-2-2 2zM8 7l2-2 2 2-2 2-2-2zM12 11l2-2 2 2-2 2-2-2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-[#0B0B0F] text-xl mb-3">Premium Quality</h3>
                <p class="text-gray-600">We source only the finest ingredients from around the world, ensuring every fragrance meets our exacting standards.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-[#0B0B0F] text-xl mb-3">Unique Blends</h3>
                <p class="text-gray-600">Our master perfumers create distinctive compositions that you won't find anywhere else.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-[#B8A878]/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-[#B8A878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-[#0B0B0F] text-xl mb-3">Long-Lasting</h3>
                <p class="text-gray-600">Our fragrances are engineered for longevity, leaving a lasting impression throughout the day.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Recognition & Trust -->
<section class="section bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Our Achievements</span>
            <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F]">Recognition & Trust</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#B8A878] mb-2">50K+</div>
                <p class="text-gray-600">Satisfied Customers</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#B8A878] mb-2">100+</div>
                <p class="text-gray-600">Fragrance Varieties</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#B8A878] mb-2">4.9</div>
                <p class="text-gray-600">Average Rating</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-[#B8A878] mb-2">15+</div>
                <p class="text-gray-600">Countries Served</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Future Goals -->
<section class="section bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <span class="text-[#B8A878] text-sm font-medium tracking-wider uppercase mb-3">Looking Ahead</span>
                <h2 class="text-3xl md:text-4xl font-display font-bold text-[#0B0B0F] mb-6">Our Vision for the Future</h2>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">As we look to the future, SAFARI remains committed to innovation and excellence. We're constantly exploring new fragrance families, sourcing rare ingredients, and developing sustainable practices that honor both our craft and our planet.</p>
                <p class="text-gray-600 text-lg leading-relaxed">Our upcoming plans include new luxury collections inspired by the rich heritage of Arabian perfumery, expansion into new markets, and exclusive collaborations with world-renowned perfumers. The journey has only just begun.</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/collections/exclusif.png') }}" alt="Future Collection" class="w-full h-full object-cover">
                </div>
                <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/collections/prive.png') }}" alt="Future Collection" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-[#1a1510]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-display font-bold text-white mb-6">Experience SAFARI</h2>
        <p class="text-gray-300 text-lg mb-8 max-w-2xl mx-auto">Discover your signature scent from our curated collection of premium fragrances.</p>
        <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-[#B8A878] text-[#0B0B0F] font-semibold rounded-xl hover:bg-[#D4C4A8] transition-all duration-300">
            Shop Now
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>
@endsection