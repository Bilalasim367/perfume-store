@extends('layouts.admin')

@section('title', 'Edit Bundle - Admin')

@section('content')
<div class="py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-display font-bold text-[#0B0B0F]">Edit Bundle</h1>
    </div>

    <form action="{{ route('admin.bundles.update', $bundle->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bundle Name</label>
                    <input type="text" name="name" value="{{ $bundle->name }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878] focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="number" name="price" value="{{ $bundle->price }}" step="0.01" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878] focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Original Price</label>
                    <input type="number" name="original_price" value="{{ $bundle->original_price }}" step="0.01" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878] focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex items-center gap-4 mt-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ $bundle->is_active ? 'checked' : '' }} class="w-4 h-4 text-[#0B0B0F] rounded">
                            <span class="ml-2 text-sm text-gray-600">Active</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ $bundle->is_featured ? 'checked' : '' }} class="w-4 h-4 text-[#0B0B0F] rounded">
                            <span class="ml-2 text-sm text-gray-600">Featured</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878] focus:border-transparent">{{ $bundle->description }}</textarea>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Bundle Image</label>
                @if($bundle->image)
                <img src="{{ asset($bundle->image) }}" alt="" class="w-24 h-24 object-cover rounded-xl mb-3">
                @endif
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878] focus:border-transparent">
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Products</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-3">
                    @foreach($products as $product)
                    <label class="flex items-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 {{ $bundle->products->contains($product->id) ? 'bg-[#B8A878]/10 border-[#B8A878]' : '' }}">
                        <input type="checkbox" name="product_ids[]" value="{{ $product->id }}" {{ $bundle->products->contains($product->id) ? 'checked' : '' }} class="w-4 h-4 text-[#0B0B0F] rounded">
                        <span class="ml-2 text-sm text-gray-600">{{ $product->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-6 py-3 bg-[#0B0B0F] text-white font-medium rounded-xl hover:bg-[#333] transition-colors">
                Update Bundle
            </button>
            <a href="{{ route('admin.bundles.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection