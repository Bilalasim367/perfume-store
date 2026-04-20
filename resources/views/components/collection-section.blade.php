@props(['title', 'link' => '#', 'products' => []])

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl md:text-2xl font-bold text-[#111827]">{{ $title }}</h2>
            <a href="{{ $link }}" class="text-sm text-amber-600 font-medium hover:text-amber-700 flex items-center gap-1">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @foreach($products as $product)
            <div class="group bg-white rounded-2xl p-3 md:p-4 shadow-sm hover:shadow-lg transition-all duration-300">
                <!-- Product Image -->
                <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3">
                    @if(isset($product['image']) && $product['image'])
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-10 h-10 md:w-12 md:h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div>
                    <h3 class="font-semibold text-sm md:text-base text-[#111827] truncate group-hover:text-amber-600 transition-colors">
                        {{ $product['name'] }}
                    </h3>
                    <p class="text-amber-600 font-bold text-sm md:text-base mt-1">{{ $product['price'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>