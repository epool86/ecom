@extends('layouts.shop')

@section('content')
<!-- Hero Banner -->
<div class="bg-gray-100 mb-8 rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2 p-10 flex flex-col justify-center">
            <div class="text-sm text-blue-600 mb-2">SPRING 2023</div>
            <h2 class="text-4xl font-bold mb-2">WOMEN <span class="text-yellow-500">FASHION</span></h2>
            <p class="text-gray-600 mb-6">Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p>
            <div>
                <a href="#" class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
                    SHOP NOW
                </a>
            </div>
        </div>
        <div class="md:w-1/2 bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center p-10">
            <div class="text-white text-center">
                <h3 class="text-3xl font-bold mb-2">2023</h3>
                <p class="text-xl">TRENDING STYLES</p>
            </div>
        </div>
    </div>
</div>

<!-- Features -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-0 mb-8">
    <div class="bg-blue-600 text-white p-6 text-center">
        <h3 class="font-bold mb-1">MONEY BACK</h3>
        <p class="text-sm text-blue-200">30 Days Money Back Guarantee</p>
    </div>
    <div class="bg-blue-700 text-white p-6 text-center">
        <h3 class="font-bold mb-1">FREE SHIPPING</h3>
        <p class="text-sm text-blue-200">Shipping on orders over $99</p>
    </div>
    <div class="bg-blue-800 text-white p-6 text-center">
        <h3 class="font-bold mb-1">SPECIAL SALE</h3>
        <p class="text-sm text-blue-200">Extra $5 off on all items</p>
    </div>
</div>

<!-- Products Section -->
<div class="mb-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">NEW PRODUCTS</h2>
        <div class="flex space-x-2">
            <a href="#" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">All</a>
            <a href="#" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Clothing</a>
            <a href="#" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Electronics</a>
            <a href="#" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Shoes</a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden group relative">
            <div class="relative">
                @if($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No image</span>
                    </div>
                @endif
                
                <!-- New Tag -->
                @if($product->created_at->diffInDays(now()) < 14)
                <div class="absolute top-4 left-4 bg-blue-500 text-white text-xs font-bold uppercase rounded-full px-3 py-1">
                    New
                </div>
                @endif
                
                <!-- Quick View Overlay - Shows on Hover -->
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('product.view', $product) }}" class="bg-white text-gray-900 py-2 px-4 rounded-full font-bold hover:bg-yellow-500 hover:text-white transition">
                        Quick View
                    </a>
                </div>
            </div>
            
            <div class="p-4">
                <!-- Rating Stars -->
                <div class="flex mb-1">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < rand(3, 5))
                            <svg class="h-4 w-4 text-yellow-500 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @else
                            <svg class="h-4 w-4 text-gray-300 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endif
                    @endfor
                </div>
                
                <h3 class="text-sm font-semibold mb-1 text-gray-700">{{ $product->name }}</h3>
                
                <div class="flex items-baseline mb-2">
                    <span class="text-lg font-bold text-blue-800">${{ number_format($product->price, 2) }}</span>
                    <span class="text-sm text-gray-500 line-through ml-2">${{ number_format($product->price * 1.2, 2) }}</span>
                </div>
                
                <div class="flex space-x-2">
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-3 rounded text-sm flex items-center justify-center transition">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Add to Cart
                        </button>
                    </form>
                    
                    <a href="{{ route('product.view', $product) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-3 rounded text-sm transition">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $products->links() }}
</div>

<!-- Banner Areas -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
    <div class="bg-yellow-100 rounded-lg p-8 flex items-center">
        <div>
            <h3 class="text-2xl font-bold mb-2">2023 FASHION SALE</h3>
            <p class="text-gray-600 mb-4">Special offers and great deals</p>
            <a href="#" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                BUY NOW
            </a>
        </div>
    </div>
    <div class="bg-pink-100 rounded-lg p-8 flex items-center">
        <div>
            <h3 class="text-2xl font-bold mb-2">SAVE UPTO 50%</h3>
            <p class="text-gray-600 mb-4">On selected items</p>
            <a href="#" class="inline-block bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">
                SHOP NOW
            </a>
        </div>
    </div>
</div>
@endsection 