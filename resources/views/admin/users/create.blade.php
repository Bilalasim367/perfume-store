@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Add User</h1>
    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-gray-600 hover:text-[#111827]">← Back</a>
</div>

<form method="POST" action="{{ route('admin.users.store') }}" class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 max-w-xl">
    @csrf
    <div class="grid gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required value="{{ old('name') }}">
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required value="{{ old('email') }}">
            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20" required minlength="8">
            @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="is_admin" value="1" class="w-5 h-5 rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                <span class="text-gray-700 font-medium">Make as Admin</span>
            </label>
        </div>
    </div>
    <div class="flex gap-4 mt-8">
        <button type="submit" class="px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
            Create User
        </button>
        <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors">
            Cancel
        </a>
    </div>
</form>
@endsection