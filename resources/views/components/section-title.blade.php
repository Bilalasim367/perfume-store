@props(['title', 'subtitle' => null, 'center' => false])

<div class="text-{{ $center ? 'center' : 'left' }} mb-10">
    @if($subtitle)
    <p class="text-amber-600 font-medium text-sm tracking-wider uppercase mb-2">{{ $subtitle }}</p>
    @endif
    <h2 class="text-3xl md:text-4xl font-bold text-[#111827]">{{ $title }}</h2>
</div>