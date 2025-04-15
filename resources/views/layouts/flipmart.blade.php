<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary-color: #0077db;
            --secondary-color: #fab300;
            --button-hover: #0068c2;
        }
        .bg-primary { background-color: var(--primary-color); }
        .bg-secondary { background-color: var(--secondary-color); }
        .text-primary { color: var(--primary-color); }
        .text-secondary { color: var(--secondary-color); }
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            display: inline-block;
        }
        .btn-primary:hover {
            background-color: var(--button-hover);
        }
        .sale-badge {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: bold;
        }
        .new-badge {
            background-color: var(--primary-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: bold;
        }
        .hot-badge {
            background-color: #ff4d4d;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="bg-primary text-white py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div>USD</div>
                <div>English</div>
                <div>My Account</div>
                <div>Wishlist</div>
                <div>My Cart</div>
                <div>Checkout</div>
                <div>Login</div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">Flipmart</a>
            
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <select class="border rounded-l py-2 px-4">
                        <option>Categories</option>
                    </select>
                    <input type="text" placeholder="Search here..." class="border-y py-2 px-4 w-64">
                    <button class="bg-secondary text-white py-2 px-4 rounded-r">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex items-center space-x-2">
                    <span class="text-secondary font-bold">CART - $650.00</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Navigation -->
    <nav class="bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center">
                <div class="py-3 px-6 bg-secondary text-white font-bold">HOME</div>
                <div class="py-3 px-6">CLOTHING</div>
                <div class="py-3 px-6">ELECTRONICS</div>
                <div class="py-3 px-6">HEALTH & BEAUTY</div>
                <div class="py-3 px-6">WATCHES</div>
                <div class="py-3 px-6">JEWELLERY</div>
                <div class="py-3 px-6">SHOES</div>
                <div class="py-3 px-6">KIDS & GIRLS</div>
                <div class="py-3 px-6">PAGES</div>
                <div class="ml-auto py-3 px-6 bg-secondary text-white font-bold">TODAY'S OFFER</div>
            </div>
        </div>
    </nav>

    <!-- Categories Sidebar and Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4 pr-4">
                <div class="bg-secondary text-white py-2 px-4 mb-4 font-bold">CATEGORIES</div>
                <div class="bg-white">
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Clothing</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Electronics</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Shoes</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Watches</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Jewellery</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Health and Beauty</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Kids and Babies</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Sports</span>
                        <span class="text-gray-500">›</span>
                    </div>
                    <div class="py-2 px-4 border-b flex justify-between items-center">
                        <span>Home and Garden</span>
                        <span class="text-gray-500">›</span>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-3/4 mt-6 md:mt-0">
                @yield('content')
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-primary text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">CONTACT INFO</h3>
                    <p class="mb-2">123 New Street, City</p>
                    <p class="mb-2">+1 234 5678 90</p>
                    <p class="mb-2">info@flipmart.com</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">CATEGORIES</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Clothing</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Electronics</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Shoes</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Watches</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">INFORMATION</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">About Us</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Contact Us</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Terms & Conditions</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">SERVICE</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">My Account</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Order History</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Wishlist</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-secondary">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-blue-600 mt-8 pt-6 text-center">
                <p>© {{ date('Y') }} {{ config('app.name', 'Flipmart') }}. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 