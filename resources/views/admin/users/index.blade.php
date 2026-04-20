@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-[#111827]">Users</h1>
    <a href="{{ route('admin.users.create') }}" class="px-6 py-3 bg-[#111827] text-white font-medium rounded-xl hover:bg-[#1f2937] transition-colors">
        + Add User
    </a>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 text-green-700 rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">ID</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Name</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Email</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Joined</th>
                <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t border-gray-100">
                <td class="py-4 px-6 text-gray-500">#{{ $user->id }}</td>
                <td class="py-4 px-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-{{ $user->is_admin ? 'amber' : 'gray' }}-100 flex items-center justify-center">
                            <span class="text-{{ $user->is_admin ? 'amber' : 'gray' }}-600 font-medium">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <span class="font-medium text-[#111827]">{{ $user->name }}</span>
                        @if($user->is_admin)
                        <span class="inline-flex px-2 py-0.5 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Admin</span>
                        @endif
                    </div>
                </td>
                <td class="py-4 px-6 text-gray-600">{{ $user->email }}</td>
                <td class="py-4 px-6 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                <td class="py-4 px-6">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $users->links() }}
</div>
@endsection