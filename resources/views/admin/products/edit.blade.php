@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Edit Product</h1>
    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-gray-600 hover:text-[#111827]">← Back</a>
</div>

<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 max-w-2xl">
    @csrf
    @method('PATCH')
    <div class="grid gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
            <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required value="{{ old('name', $product->name) }}">
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
            <select name="category_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">{{ old('description', $product->description) }}</textarea>
        </div>
        
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                <input type="number" name="price" step="0.01" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required value="{{ old('price', $product->price) }}">
                @error('price')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Original Price</label>
                <input type="number" name="original_price" step="0.01" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" value="{{ old('original_price', $product->original_price) }}">
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                <input type="number" name="stock" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Product Image (Main)</label>
                @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset($product->image) }}" alt="" class="w-20 h-20 object-cover rounded-xl">
                        <p class="text-xs text-gray-500 mt-1">Current image</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 bg-white">
                <p class="text-xs text-gray-500 mt-1">JPG, PNG, WebP - Max 2MB</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Additional Images</label>
                @if($product->images->isNotEmpty())
                    <div class="flex gap-2 mb-2 flex-wrap">
                        @foreach($product->images as $img)
                            <img src="{{ asset($img->image) }}" alt="" class="w-16 h-16 object-cover rounded-xl">
                        @endforeach
                    </div>
                @endif
                <input type="file" name="images[]" accept="image/*" multiple class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 bg-white">
                <p class="text-xs text-gray-500 mt-1">Add more images (hold Ctrl/Cmd to select)</p>
            </div>
        </div>
        
        <div class="flex gap-6">
            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" class="w-5 h-5 rounded border-gray-300 text-amber-600 focus:ring-amber-500" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                <span class="text-gray-700">Active</span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" class="w-5 h-5 rounded border-gray-300 text-amber-600 focus:ring-amber-500" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                <span class="text-gray-700">Featured (Show on Home)</span>
            </label>
        </div>
    </div>
    <div class="flex gap-4 mt-8">
        <button type="submit" class="px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
            Update Product
        </button>
        <a href="{{ route('admin.products.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors">
            Cancel
        </a>
    </div>
</form>
@endsection