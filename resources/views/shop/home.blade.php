@extends('layouts.flipmart')

@section('content')
<!-- Hero Banner -->
<div class="relative mb-8">
    <img src="{{ asset('images/banner.jpg') }}" alt="Fashion Banner" class="w-full rounded-lg" onerror="this.src='https://via.placeholder.com/1200x400?text=SPRING+2016+WOMEN+FASHION'">
    <div class="absolute top-1/4 left-8">
        <div class="text-xl font-medium">SPRING 2016</div>
        <h2 class="text-4xl font-bold mb-2">WOMEN <span class="text-secondary">FASHION</span></h2>
        <p class="text-gray-700 mb-4">Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p>
        <a href="#" class="btn-primary">SHOP NOW</a>
    </div>
</div>

<!-- Promo Banners -->
<div class="grid grid-cols-3 gap-6 mb-8">
    <div class="bg-primary text-white px-6 py-4 flex flex-col items-center justify-center rounded-lg">
        <div class="text-lg font-bold mb-1">MONEY BACK</div>
        <div class="text-sm">30 Days Money Back Guarantee</div>
    </div>
    <div class="bg-primary text-white px-6 py-4 flex flex-col items-center justify-center rounded-lg">
        <div class="text-lg font-bold mb-1">FREE SHIPPING</div>
        <div class="text-sm">Shipping on orders over $99</div>
    </div>
    <div class="bg-primary text-white px-6 py-4 flex flex-col items-center justify-center rounded-lg">
        <div class="text-lg font-bold mb-1">SPECIAL SALE</div>
        <div class="text-sm">Extra $5 off on all items</div>
    </div>
</div>

<!-- Featured Products -->
<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">NEW PRODUCTS</h2>
        <div class="flex space-x-2">
            <button class="px-3 py-1 bg-gray-200 rounded-sm hover:bg-gray-300">All</button>
            <button class="px-3 py-1 bg-gray-200 rounded-sm hover:bg-gray-300">Clothing</button>
            <button class="px-3 py-1 bg-gray-200 rounded-sm hover:bg-gray-300">Electronics</button>
            <button class="px-3 py-1 bg-gray-200 rounded-sm hover:bg-gray-300">Shoes</button>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden relative group">
            <div class="absolute top-2 right-2 z-10">
                @if($product->created_at > now()->subDays(7))
                <span class="new-badge">NEW</span>
                @endif
            </div>
            @if($product->photo)
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                </div>
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No image</span>
                </div>
            @endif
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
                <div class="flex mb-2">
                    <div class="flex text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-lg font-bold text-secondary">${{ number_format($product->price, 2) }}</span>
                        @if(rand(0, 1))
                        <span class="text-gray-500 line-through text-sm ml-2">${{ number_format($product->price * 1.2, 2) }}</span>
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('product.view', $product) }}" class="px-3 py-1 bg-primary text-white rounded hover:bg-blue-600">
                            View
                        </a>
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-secondary text-white rounded hover:bg-yellow-600">
                                Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Hot Deals Section -->
<div class="mb-8">
    <h2 class="text-xl font-bold mb-4">HOT DEALS</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
            <div class="absolute top-2 right-2 z-10">
                <span class="hot-badge">HOT</span>
            </div>
            <img src="https://via.placeholder.com/300x300" alt="Hot Deal" class="w-full h-64 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-1">Floral Print Buttoned</h3>
                <div class="flex mb-2">
                    <div class="flex text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="text-lg font-bold text-secondary">$600.00</span>
                    <span class="text-gray-500 line-through text-sm ml-2">$800.00</span>
                </div>
                
                <div class="flex items-center justify-between text-center">
                    <div class="bg-gray-200 rounded-lg px-2 py-1">
                        <div class="text-xs">132</div>
                        <div class="text-xs">DAYS</div>
                    </div>
                    <div class="bg-gray-200 rounded-lg px-2 py-1">
                        <div class="text-xs">12</div>
                        <div class="text-xs">HRS</div>
                    </div>
                    <div class="bg-gray-200 rounded-lg px-2 py-1">
                        <div class="text-xs">38</div>
                        <div class="text-xs">MINS</div>
                    </div>
                    <div class="bg-gray-200 rounded-lg px-2 py-1">
                        <div class="text-xs">43</div>
                        <div class="text-xs">SECS</div>
                    </div>
                </div>
                
                <button class="w-full mt-3 py-2 bg-secondary text-white rounded hover:bg-yellow-600">
                    ADD TO CART
                </button>
            </div>
        </div>
        
        <!-- Second Banner -->
        <div class="md:col-span-2">
            <div class="bg-gray-100 rounded-lg p-4 h-full flex items-center">
                <div class="w-1/2">
                    <h3 class="text-4xl font-bold mb-2">2016</h3>
                    <h4 class="text-2xl font-bold text-secondary mb-4">FASHION SALE</h4>
                    <button class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-blue-600">
                        BUY NOW
                    </button>
                </div>
                <div class="w-1/2">
                    <img src="https://via.placeholder.com/400x200?text=Fashion+Sale" alt="Fashion Sale" class="w-full">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $products->links() }}
</div>
@endsection 