@extends('layouts.admin')

@section('title', 'Banners')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Banners</h1>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add Banner</a>
</div>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<div class="card overflow-hidden">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Position</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
            <tr>
                <td class="font-medium">{{ $banner->title }}</td>
                <td>{{ $banner->image }}</td>
                <td>{{ $banner->position }}</td>
                <td>
                    <span class="badge {{ $banner->is_active ? 'badge-success' : 'badge-error' }}">
                        {{ $banner->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.banners.edit', $banner) }}" class="text-[var(--color-accent)]">Edit</a>
                    <form method="POST" action="{{ route('admin.banners.destroy', $banner) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $banners->links() }}
</div>
@endsection