<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SAFARI - Premium Perfumes')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
<body class="bg-white text-[#0B0B0F] font-sans antialiased">
    <!-- Alert Banner -->
    <div class="bg-[#1a1510] py-2 text-center">
        <p class="text-white text-sm">
            <span class="font-semibold">RESTOCK ALERT</span>
            <span class="mx-3">|</span>
            <span class="text-[#B8A878] font-bold">FLAT 15% OFF</span>
            <span class="mx-3">|</span>
            <span class="text-gray-300">ON RESTOCKED FRAGRANCES</span>
        </p>
    </div>

    <!-- Navigation -->
    <nav class="bg-[#1a1510]/95 backdrop-blur-lg border-b border-[#2a2520]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('storage/website-logo.png') }}" alt="SAFARI" class="h-20 md:h-24 w-auto">
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-300 hover:text-[#B8A878] transition-colors">Shop By</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-300 hover:text-[#B8A878] transition-colors">Classifications</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-300 hover:text-[#B8A878] transition-colors">Inspire By</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-300 hover:text-[#B8A878] transition-colors">Bundles</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-300 hover:text-[#B8A878] transition-colors">Other Collection</a>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <button class="text-gray-300 hover:text-[#B8A878] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    <!-- User -->
                    <button class="text-gray-300 hover:text-[#B8A878] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </button>
                    @auth
                    <a href="{{ route('cart.index') }}" class="text-gray-300 hover:text-[#B8A878] transition-colors relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        @php $cartCount = auth()->user()->cartItems()->sum('quantity'); @endphp
                        @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 w-5 h-5 bg-[#B8A878] text-[#0B0B0F] text-xs font-bold rounded-full flex items-center justify-center">{{ $cartCount }}</span>
                        @endif
                    </a>
                    @endauth
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-4">
                    @auth
                    <div class="relative" id="user-menu-container">
                        <button onclick="document.getElementById('user-dropdown').classList.toggle('hidden')" class="flex items-center gap-2 text-sm font-medium text-white hover:text-[#B8A878]">
                            <div class="w-8 h-8 rounded-full bg-[#B8A878] flex items-center justify-center">
                                <span class="text-[#0B0B0F] font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        </button>
                        <div id="user-dropdown" class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden z-50">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                            @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Admin Panel</a>
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
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 hover:text-[#B8A878]">Login</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium px-5 py-2.5 bg-[#B8A878] text-[#0B0B0F] rounded-xl hover:bg-[#D4C4A8] transition-colors">Sign Up</a>
                    </div>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#1a1510] border-t border-[#2a2520]">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('home') }}" class="block py-2 text-sm font-medium text-gray-300 hover:text-[#B8A878]">Home</a>
                <a href="{{ route('products.index') }}" class="block py-2 text-sm font-medium text-gray-300 hover:text-[#B8A878]">Shop</a>
                <a href="{{ route('products.index') }}" class="block py-2 text-sm font-medium text-gray-300 hover:text-[#B8A878]">Shop By</a>
                <a href="{{ route('products.index') }}" class="block py-2 text-sm font-medium text-gray-300 hover:text-[#B8A878]">Classifications</a>
                <a href="{{ route('products.index') }}" class="block py-2 text-sm font-medium text-gray-300 hover:text-[#B8A878]">Inspirations</a>
                <a href="{{ route('products.index') }}" class="block py-2 text-sm font-medium text-gray-300 hover:text-[#B8A878]">Bundles</a>
                @auth
                <a href="{{ route('cart.index') }}" class="block py-2 text-sm font-medium text-gray-300">Cart</a>
                @else
                <a href="{{ route('login') }}" class="block py-2 text-sm font-medium text-gray-300">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1a1510] text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-10 mb-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <img src="{{ asset('storage/website-logo.png') }}" alt="SAFARI" class="h-28 md:h-32 w-auto mb-5">
                    <p class="text-gray-400 text-base leading-relaxed max-w-sm mb-6">Premium fragrances crafted for the modern individual. Discover your signature scent.</p>

                    <!-- Newsletter -->
                    <div>
                        <h4 class="font-medium text-white mb-4">Newsletter</h4>
                        <form class="flex gap-2">
                            <input type="email" placeholder="Your email" class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#B8A878]">
                            <button type="submit" class="px-6 py-3 bg-[#B8A878] text-[#0B0B0F] font-semibold rounded-xl hover:bg-[#D4C4A8] transition-colors">
                                SUBSCRIBE
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Customer Service -->
                <div>
                    <h4 class="font-medium text-white mb-5">Customer Service</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-[#B8A878] transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-[#B8A878] transition-colors">Shipping & Delivery</a></li>
                        <li><a href="#" class="hover:text-[#B8A878] transition-colors">Returns & Exchanges</a></li>
                        <li><a href="#" class="hover:text-[#B8A878] transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-[#B8A878] transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-medium text-white mb-5">Quick Links</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#B8A878] transition-colors">All Products</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#B8A878] transition-colors">New Arrivals</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#B8A878] transition-colors">Best Sellers</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#B8A878] transition-colors">Bundles</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-medium text-white mb-5">Contact Us</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li>Email: info@rawanaha.com</li>
                        <li>Phone: +1 234 567 890</li>
                        <li>Address: Dubai, UAE</li>
                    </ul>

                    <!-- Social Icons -->
                    <div class="flex gap-4 mt-6">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#B8A878] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.757-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="border-t border-white/10 pt-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-400">&copy; {{ date('Y') }} SAFARI. All rights reserved.</p>
                    <div class="flex gap-3">
                        <span class="px-3 py-1 bg-white/10 rounded text-xs text-gray-400">Visa</span>
                        <span class="px-3 py-1 bg-white/10 rounded text-xs text-gray-400">Mastercard</span>
                        <span class="px-3 py-1 bg-white/10 rounded text-xs text-gray-400">Amex</span>
                        <span class="px-3 py-1 bg-white/10 rounded text-xs text-gray-400">PayPal</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Purchase Notification Popup -->
    @php
    $notifications = [
        ['name' => 'Ali Ahmed', 'city' => 'Lahore', 'product' => 'Midnight Rose', 'image' => 'storage/products/1776632967_69e544878014f.png'],
        ['name' => 'Muhammad Bilal', 'city' => 'Karachi', 'product' => 'Ocean Breeze', 'image' => 'storage/products/1776620032_69e5120064796.png'],
        ['name' => 'Saif Khan', 'city' => 'Faisalabad', 'product' => 'Cedar Wood 1', 'image' => 'storage/products/1776620108_69e5124c793a3.png'],
        ['name' => 'Usman Raza', 'city' => 'Islamabad', 'product' => 'Amber Dreams', 'image' => 'storage/products/1776632848_69e5441063d19.png'],
        ['name' => 'Hamza Malik', 'city' => 'Multan', 'product' => 'Citrus Blast 1', 'image' => 'storage/products/1776620138_69e5126a516af.png'],
        ['name' => 'Ahmed Hussain', 'city' => 'Rawalpindi', 'product' => 'Fresh Linen 1', 'image' => 'storage/products/1776632868_69e54424c0e5a.png'],
        ['name' => 'Farhan Ali', 'city' => 'Peshawar', 'product' => 'Wood Spice 1', 'image' => 'storage/products/1776632885_69e54435ac882.png'],
        ['name' => 'Bilal Aslam', 'city' => 'Sialkot', 'product' => 'Sweet Vanilla 1', 'image' => 'storage/products/1776632919_69e544576e4f8.png'],
    ];
    @endphp

    <div id="notification-popup" class="fixed bottom-6 left-6 max-w-md bg-white border border-gray-200 rounded-2xl shadow-2xl p-4 flex items-center gap-4 z-50 transition-all duration-300 opacity-0 translate-y-4 pointer-events-none">
        <button onclick="hideNotification()" class="absolute top-2 right-2 w-7 h-7 flex items-center justify-center text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden bg-gray-100">
            <img id="notif-image" src="" alt="Product" class="w-full h-full object-cover">
        </div>
        <div class="flex-1 min-w-0 pr-2">
            <p class="text-base font-bold text-gray-800 truncate" id="notif-customer"></p>
            <p class="text-sm text-gray-600 truncate" id="notif-product"></p>
            <div class="flex items-center gap-1 mt-1">
                <svg class="w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-xs text-gray-400" id="notif-time"></span>
                <span class="text-xs text-green-500 font-medium">Verified</span>
            </div>
            <div class="mt-2 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                <div id="notif-progress" class="h-full bg-[#B8A878] rounded-full w-full"></div>
            </div>
        </div>
    </div>

    <script>
        const notifications = @json($notifications);
        let currentIndex = 0;
        let notificationTimeout = null;
        let progressInterval = null;
        const baseUrl = '{{ asset('') }}';
        const displayTime = 4000;
        const totalTime = displayTime + 100;

        function startProgressBar() {
            const progress = document.getElementById('notif-progress');
            progress.style.width = '100%';
            progress.style.transition = 'none';
            
            setTimeout(() => {
                progress.style.transition = `width ${displayTime}ms linear`;
                progress.style.width = '0%';
            }, 50);
        }

        function showNotification() {
            const notif = notifications[currentIndex];
            const times = ['Just now', '1 min ago', '2 min ago', '3 min ago', '5 min ago', 'Just now'];
            
            document.getElementById('notif-customer').textContent = notif.name + ' (' + notif.city + ')';
            document.getElementById('notif-product').textContent = 'purchased ' + notif.product;
            document.getElementById('notif-time').textContent = times[Math.floor(Math.random() * times.length)];
            document.getElementById('notif-image').src = baseUrl + notif.image;
            
            const popup = document.getElementById('notification-popup');
            popup.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
            popup.classList.add('opacity-100', 'translate-y-0');
            
            startProgressBar();
            notificationTimeout = setTimeout(hideNotification, displayTime);
        }

        function hideNotification() {
            clearTimeout(notificationTimeout);
            const popup = document.getElementById('notification-popup');
            popup.classList.remove('opacity-100', 'translate-y-0');
            popup.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
            
            currentIndex = (currentIndex + 1) % notifications.length;
            setTimeout(showNotification, 3000);
        }

        setTimeout(showNotification, 3000);
    </script>

    <script>
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('user-dropdown');
            var button = event.target.closest('#user-menu-container button');
            if (dropdown && !dropdown.classList.contains('hidden')) {
                if (!button && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/923277217367" target="_blank" class="fixed bottom-6 right-6 z-40 w-16 h-16 rounded-full shadow-xl flex items-center justify-center hover:scale-110 transition-transform">
        <img src="{{ asset('storage/whatapp.svg') }}" alt="WhatsApp" class="w-12 h-12">
    </a>
</body>
</html>