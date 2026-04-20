@extends('layouts.admin')

@section('title', 'Ads')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Ads</h1>
    <a href="{{ route('admin.ads.create') }}" class="btn btn-primary">Add Ad</a>
</div>

<form method="GET" class="flex gap-4 mb-6">
    <input type="text" name="search" placeholder="Search ads..." value="{{ request('search') }}" class="input w-64">
    <select name="placement" class="input w-40">
        <option value="">All Placements</option>
        <option value="home" {{ request('placement') === 'home' ? 'selected' : '' }}>Home</option>
        <option value="product" {{ request('placement') === 'product' ? 'selected' : '' }}>Product</option>
        <option value="cart" {{ request('placement') === 'cart' ? 'selected' : '' }}>Cart</option>
        <option value="checkout" {{ request('placement') === 'checkout' ? 'selected' : '' }}>Checkout</option>
    </select>
    <select name="status" class="input w-32">
        <option value="">All</option>
        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    <button type="submit" class="btn btn-secondary">Filter</button>
</form>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<div class="card overflow-hidden">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Placement</th>
                <th>Position</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ads as $ad)
            <tr>
                <td class="font-medium">{{ $ad->title }}</td>
                <td>{{ $ad->image }}</td>
                <td>{{ $ad->placement ?? '-' }}</td>
                <td>{{ $ad->position }}</td>
                <td>
                    <span class="badge {{ $ad->is_active ? 'badge-success' : 'badge-error' }}">
                        {{ $ad->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.ads.edit', $ad) }}" class="text-[var(--color-accent)]">Edit</a>
                    <form method="POST" action="{{ route('admin.ads.destroy', $ad) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">No ads found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $ads->withQueryString()->links() }}
</div>
@endsection