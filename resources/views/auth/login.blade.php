@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-display font-bold text-[#0B0B0F]">Welcome Back</h1>
            <p class="text-gray-500 mt-2 text-lg">Sign in to your account</p>
        </div>

        <div class="card p-10">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <label class="label">Email</label>
                    <input type="email" name="email" class="input" placeholder="you@example.com" required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="label">Password</label>
                    <input type="password" name="password" class="input" placeholder="••••••••" required>
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">Sign In</button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-500">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[var(--color-accent)] hover:underline font-medium">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection