@props(['reviews' => []])

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
    @forelse($reviews as $review)
    <div class="group relative aspect-square overflow-hidden rounded-2xl bg-gray-100">
        @if(isset($review['image']) && $review['image'])
        <img src="{{ $review['image'] }}" alt="Customer Review" 
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
            <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
        @endif
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
    </div>
    @empty
    @foreach(range(1, 5) as $i)
    <div class="group relative aspect-square overflow-hidden rounded-2xl bg-gray-100">
        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center">
                <span class="text-2xl font-light text-gray-400">{{ $i }}</span>
            </div>
        </div>
    </div>
    @endforeach
    @endforelse
</div>