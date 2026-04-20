@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
        + Add Category
    </a>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 text-green-700 rounded-xl">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="mb-6 px-4 py-3 bg-red-50 text-red-700 rounded-xl">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Image</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Name</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Slug</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Products</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="border-t border-gray-100">
                <td class="py-4 px-6">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}" alt="" class="w-12 h-12 object-cover rounded-xl">
                    @else
                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </td>
                <td class="py-4 px-6 font-medium text-[#111827]">{{ $category->name }}</td>
                <td class="py-4 px-6 text-gray-500">{{ $category->slug }}</td>
                <td class="py-4 px-6 text-gray-500">{{ $category->products()->count() }}</td>
                <td class="py-4 px-6">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $categories->links() }}
</div>
@endsection