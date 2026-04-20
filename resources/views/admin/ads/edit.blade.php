@extends('layouts.admin')

@section('title', 'Edit Ad')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Edit Ad</h1>

<form method="POST" action="{{ route('admin.ads.update', $ad) }}" class="card p-6 max-w-xl">
    @csrf
    @method('PATCH')
    <div class="grid gap-4">
        <div>
            <label class="label">Title</label>
            <input type="text" name="title" class="input" required value="{{ old('title', $ad->title) }}">
            @error('title')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="label">Image URL</label>
            <input type="text" name="image" class="input" required value="{{ old('image', $ad->image) }}">
            @error('image')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="label">Link (optional)</label>
            <input type="text" name="link" class="input" value="{{ old('link', $ad->link) }}">
        </div>
        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr;">
            <div>
                <label class="label">Placement</label>
                <select name="placement" class="input">
                    <option value="">Select Placement</option>
                    <option value="home" {{ old('placement', $ad->placement) === 'home' ? 'selected' : '' }}>Home</option>
                    <option value="product" {{ old('placement', $ad->placement) === 'product' ? 'selected' : '' }}>Product</option>
                    <option value="cart" {{ old('placement', $ad->placement) === 'cart' ? 'selected' : '' }}>Cart</option>
                    <option value="checkout" {{ old('placement', $ad->placement) === 'checkout' ? 'selected' : '' }}>Checkout</option>
                </select>
            </div>
            <div>
                <label class="label">Position</label>
                <input type="number" name="position" class="input" required value="{{ old('position', $ad->position) }}">
            </div>
        </div>
        <div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $ad->is_active) ? 'checked' : '' }}>
                <span>Active</span>
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-6">Update Ad</button>
    <a href="{{ route('admin.ads.index') }}" class="btn btn-secondary ml-2">Cancel</a>
</form>
@endsection