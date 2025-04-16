<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Top Bar -->
        <div class="bg-blue-600 text-white text-sm py-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between">
                <div>
                    <span>USD</span>
                    <span class="mx-2">|</span>
                    <span>English</span>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-blue-200">My Account</a>
                    <a href="#" class="hover:text-blue-200">Wishlist</a>
                    <a href="{{ route('cart.index') }}" class="hover:text-blue-200">My Cart</a>
                    <a href="#" class="hover:text-blue-200">Checkout</a>
                    <a href="#" class="hover:text-blue-200">Login</a>
                </div>
            </div>
        </div>
        
        <!-- Main Header -->
        <div class="bg-blue-500 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-white">{{ config('app.name', 'FlipMart') }}</a>
                
                <div class="flex-1 max-w-xl mx-10">
                    <form action="{{ route('home') }}" method="GET" class="flex">
                        <div class="relative flex-1">
                            <input type="text" name="search" placeholder="Search here..." 
                                class="w-full px-4 py-2 rounded-l border-0 focus:ring-0">
                        </div>
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-r hover:bg-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
                
                <div>
                    <a href="{{ route('cart.index') }}" class="flex items-center text-white hover:text-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="mr-1">CART</span>
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">
                            {{ session()->has('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="bg-blue-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex space-x-8">
                    <a href="{{ route('home') }}" class="px-3 py-4 hover:bg-blue-800">HOME</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">CLOTHING</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">ELECTRONICS</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">HEALTH & BEAUTY</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">WATCHES</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">JEWELLERY</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">SHOES</a>
                    <a href="#" class="px-3 py-4 hover:bg-blue-800">KIDS & GIRLS</a>
                </div>
            </div>
        </nav>

        <main class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4">About Us</h3>
                        <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Customer Service</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">Contact Us</a></li>
                            <li><a href="#" class="hover:text-white">Returns & Exchanges</a></li>
                            <li><a href="#" class="hover:text-white">Shipping & Delivery</a></li>
                            <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">Home</a></li>
                            <li><a href="#" class="hover:text-white">Shop</a></li>
                            <li><a href="#" class="hover:text-white">About</a></li>
                            <li><a href="#" class="hover:text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                    <p>&copy; {{ date('Y') }} {{ config('app.name', 'FlipMart') }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html> 