<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perfume Store')</title>
    @vite(['resources/css/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#f9fafb]">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-lg border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="text-xl font-bold text-primary">Perfume<span class="text-amber-500">Store</span></span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}">Home</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors {{ request()->routeIs('products.*') ? 'text-primary' : '' }}">Shop</a>
                    @auth
                    <a href="{{ route('cart.index') }}" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors {{ request()->routeIs('cart.*') ? 'text-primary' : '' }}">Cart</a>
                    @endauth
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-4">
                    @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-primary">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden">
                            @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Admin Panel</a>
                            @endif
                            <a href="{{ route('checkout.orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">My Orders</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Logout</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="hidden md:flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary text-sm">Sign Up</a>
                    </div>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('home') }}" class="block py-2 text-sm font-medium text-gray-600">Home</a>
                <a href="{{ route('products.index') }}" class="block py-2 text-sm font-medium text-gray-600">Shop</a>
                @auth
                <a href="{{ route('cart.index') }}" class="block py-2 text-sm font-medium text-gray-600">Cart</a>
                @else
                <a href="{{ route('login') }}" class="block py-2 text-sm font-medium text-gray-600">Login</a>
                <a href="{{ route('register') }}" class="block py-2 text-sm font-medium text-amber-600">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 md:pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <h3 class="text-xl font-bold mb-4">Perfume<span class="text-amber-500">Store</span></h3>
                    <p class="text-gray-400 text-sm mb-6 max-w-md">Discover our premium collection of Luxury fragrances. Premium scents for the modern individual.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-medium mb-4">Shop</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('products.index') }}" class="hover:text-white transition-colors">All Products</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'floral']) }}" class="hover:text-white transition-colors">Floral</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'woody']) }}" class="hover:text-white transition-colors">Woody</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="font-medium mb-4">Support</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-400">&copy; {{ date('Y') }} PerfumeStore. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.248-2.224.148.656 2.109 2.548 3.635 4.807 3.683-2.217 1.732-4.965 2.636-6.958 2.522 2.093 1.35 4.109 2.154 6.033 2.154 6.369 0 10.159-5.273 10.159-9.853 0-.298-.022-.588-.063-.883z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.947.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.281.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.209-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>