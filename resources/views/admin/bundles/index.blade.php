@extends('layouts.admin')

@section('title', 'Bundles - Admin')

@section('content')
<div class="py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-display font-bold text-[#0B0B0F]">Bundles</h1>
        <a href="{{ route('admin.bundles.create') }}" class="px-4 py-2 bg-[#0B0B0F] text-white rounded-xl hover:bg-[#333] transition-colors">
            Add Bundle
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Products</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($bundles as $bundle)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($bundle->image)
                            <img src="{{ asset($bundle->image) }}" alt="" class="w-12 h-12 object-cover rounded-lg">
                            @else
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400">B</span>
                            </div>
                            @endif
                            <div>
                                <p class="font-medium text-[#0B0B0F]">{{ $bundle->name }}</p>
                                <p class="text-sm text-gray-400">{{ $bundle->slug }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $bundle->products->count() }} products
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-medium text-[#0B0B0F]">PKR {{ number_format($bundle->price * 280, 0) }}</span>
                        @if($bundle->original_price)
                        <span class="text-sm text-gray-400 line-through ml-2">PKR {{ number_format($bundle->original_price * 280, 0) }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($bundle->is_active)
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Active</span>
                        @else
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.bundles.edit', $bundle->id) }}" class="p-2 text-gray-400 hover:text-[#0B0B0F] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L13.828 15H9v-4.828L18.172 5.172a2 2 0 012.828 2.828z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.bundles.destroy', $bundle->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors" onclick="return confirm('Are you sure?')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection