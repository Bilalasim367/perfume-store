@props(['category', 'image' => null, 'count' => 0])

<a href="{{ route('products.index', ['category' => $category->slug]) }}" 
   class="group relative aspect-square overflow-hidden rounded-2xl block">
    @if($image)
    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition-transform duration-700 ease-out" 
         style="background-image: url('{{ $image }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/30 group-hover:from-black/60 group-hover:via-black/10 group-hover:to-black/20 transition-all duration-500"></div>
    @else
    <div class="absolute inset-0 bg-gradient-to-br from-[#111827] to-[#374151] group-hover:scale-110 transition-transform duration-700"></div>
    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-colors"></div>
    @endif
    
    <div class="absolute inset-0 flex flex-col items-center justify-center p-6">
        <h3 class="text-xl md:text-2xl font-bold text-white text-center group-hover:scale-105 transition-transform duration-500">
            {{ $category->name }}
        </h3>
        @if($count > 0)
        <p class="text-white/70 text-sm mt-2 group-hover:text-white/90 transition-colors">
            {{ $count }} {{ $count === 1 ? 'product' : 'products' }}
        </p>
        @endif
    </div>
</a>