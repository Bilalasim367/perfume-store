@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Edit Category</h1>
    <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-gray-600 hover:text-[#111827]">← Back</a>
</div>

<form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data" class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 max-w-xl">
    @csrf
    @method('PATCH')
    <div class="grid gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
            <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required value="{{ old('name', $category->name) }}">
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20">{{ old('description', $category->description) }}</textarea>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
            @if($category->image)
                <div class="mb-2">
                    <img src="{{ asset($category->image) }}" alt="" class="w-24 h-24 object-cover rounded-xl">
                    <p class="text-xs text-gray-500 mt-1">Current image</p>
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 bg-white">
            <p class="text-xs text-gray-500 mt-1">JPG, PNG, WebP - Max 2MB (leave empty to keep current)</p>
        </div>
    </div>
    <div class="flex gap-4 mt-8">
        <button type="submit" class="px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
            Update Category
        </button>
        <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors">
            Cancel
        </a>
    </div>
</form>
@endsection