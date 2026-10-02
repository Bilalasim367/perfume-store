@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen bg-bg-white flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-#0B0B0F">Create Account</h1>
            <p class="text-gray-500 mt-2">Join us and start shopping</p>
        </div>

        <div class="card p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">
                    <label class="label">Name</label>
                    <input type="text" name="name" class="input" placeholder="Your name" required value="{{ old('name') }}">
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="label">Email</label>
                    <input type="email" name="email" class="input" placeholder="you@example.com" required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="label">Password</label>
                    <input type="password" name="password" class="input" placeholder="••••••••" required minlength="8">
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="input" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary w-full">Create Account</button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-#B8A878 hover:underline font-medium">Sign In</a>
            </p>
        </div>
    </div>
</div>
@endsection