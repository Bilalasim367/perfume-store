@extends('layouts.admin')

@section('title', 'Add Banner')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Add Banner</h1>

<form method="POST" action="{{ route('admin.banners.store') }}" class="card p-6 max-w-xl">
    @csrf
    <div class="grid gap-4">
        <div>
            <label class="label">Title</label>
            <input type="text" name="title" class="input" required value="{{ old('title') }}">
            @error('title')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="label">Image URL</label>
            <input type="text" name="image" class="input" required placeholder="banners/banner.jpg" value="{{ old('image') }}">
            @error('image')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="label">Link (optional)</label>
            <input type="text" name="link" class="input" placeholder="/products" value="{{ old('link') }}">
        </div>
        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr;">
            <div>
                <label class="label">Position</label>
                <input type="number" name="position" class="input" required value="{{ old('position', 0) }}">
            </div>
            <div>
                <label class="flex items-center gap-2 mt-6">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <span>Active</span>
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-6">Create Banner</button>
    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary ml-2">Cancel</a>
</form>
@endsection