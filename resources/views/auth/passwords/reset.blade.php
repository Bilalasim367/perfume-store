@extends('layouts.app')

@section('title', 'Reset Password - SAFARI Perfumes')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <img src="{{ asset('storage/website-logo.png') }}" alt="SAFARI" class="h-20 mx-auto mb-6">
            <h2 class="text-3xl font-display font-bold text-[#0B0B0F]">Reset Your Password</h2>
            <p class="mt-2 text-gray-600">Enter your new password below</p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input id="email" name="email" type="email" required 
                    value="{{ $email ?? old('email') }}"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <input id="password" name="password" type="password" required 
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
                @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required 
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B8A878]/20 focus:border-[#B8A878]">
            </div>

            <button type="submit" class="w-full px-6 py-3 bg-[#B8A878] text-[#0B0B0F] font-semibold rounded-xl hover:bg-[#D4C4A8] transition-colors">
                Reset Password
            </button>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-sm text-[#B8A878] hover:underline">
                    Back to Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection