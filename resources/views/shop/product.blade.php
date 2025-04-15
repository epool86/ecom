@extends('layouts.flipmart')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Product Image -->
        <div class="md:w-1/2">
            @if($product->photo)
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg">
            @else
                <div class="w-full h-80 bg-gray-200 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">No image available</span>
                </div>
            @endif
            
            <!-- Thumbnails (for demonstration) -->
            <div class="flex gap-2 mt-4">
                <div class="w-20 h-20 bg-gray-200 rounded-md border-2 border-primary"></div>
                <div class="w-20 h-20 bg-gray-200 rounded-md"></div>
                <div class="w-20 h-20 bg-gray-200 rounded-md"></div>
                <div class="w-20 h-20 bg-gray-200 rounded-md"></div>
            </div>
        </div>
        
        <!-- Product Details -->
        <div class="md:w-1/2">
            <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
            
            <div class="flex items-center mb-4">
                <div class="flex text-yellow-400 mr-2">
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
                <span class="text-gray-600 text-sm">(18 reviews)</span>
            </div>
            
            <div class="mb-4">
                <span class="text-2xl font-bold text-secondary">${{ number_format($product->price, 2) }}</span>
                <span class="text-gray-500 line-through text-lg ml-2">${{ number_format($product->price * 1.2, 2) }}</span>
            </div>
            
            <div class="mb-6">
                <h3 class="text-gray-700 font-medium mb-2">Description:</h3>
                <p class="text-gray-600">{{ $product->description }}</p>
            </div>
            
            <div class="mb-6">
                <h3 class="text-gray-700 font-medium mb-2">Availability:</h3>
                <p class="text-green-600">In Stock</p>
            </div>
            
            <div class="mb-6">
                <div class="flex items-center gap-4">
                    <div>
                        <label for="quantity" class="block text-gray-700 font-medium mb-2">Quantity:</label>
                        <div class="flex">
                            <button class="bg-gray-200 px-3 py-1 rounded-l">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-16 border-y text-center py-1">
                            <button class="bg-gray-200 px-3 py-1 rounded-r">+</button>
                        </div>
                    </div>
                    
                    <div>
                        <label for="color" class="block text-gray-700 font-medium mb-2">Color:</label>
                        <select id="color" name="color" class="border rounded px-3 py-1 w-full">
                            <option>Black</option>
                            <option>White</option>
                            <option>Red</option>
                            <option>Blue</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-secondary text-white rounded hover:bg-yellow-600">
                        ADD TO CART
                    </button>
                </form>
                <button class="px-6 py-2 bg-primary text-white rounded hover:bg-blue-600">
                    BUY NOW
                </button>
            </div>
            
            <div class="flex items-center gap-4 mt-4">
                <button class="flex items-center text-gray-600 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                    Add to Wishlist
                </button>
                <button class="flex items-center text-gray-600 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                    </svg>
                    Share
                </button>
            </div>
        </div>
    </div>
    
    <!-- Product Tabs -->
    <div class="mt-12">
        <div class="border-b">
            <div class="flex">
                <button class="py-2 px-4 border-b-2 border-primary text-primary font-medium">Description</button>
                <button class="py-2 px-4 text-gray-600 font-medium">Reviews</button>
                <button class="py-2 px-4 text-gray-600 font-medium">Shipping Info</button>
            </div>
        </div>
        <div class="py-4">
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.
            </p>
        </div>
    </div>
    
    <!-- Related Products -->
    <div class="mt-12">
        <h2 class="text-xl font-bold mb-4">Related Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach(range(1, 4) as $i)
            <div class="bg-white rounded-lg shadow-md overflow-hidden relative group">
                <div class="absolute top-2 right-2 z-10">
                    @if($i % 2 == 0)
                    <span class="new-badge">NEW</span>
                    @else
                    <span class="sale-badge">SALE</span>
                    @endif
                </div>
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/300x300" alt="Related Product" class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-1">Related Product {{ $i }}</h3>
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
                            <span class="text-lg font-bold text-secondary">${{ number_format(rand(10, 100), 2) }}</span>
                            @if($i % 2 == 0)
                            <span class="text-gray-500 line-through text-sm ml-2">${{ number_format(rand(110, 200), 2) }}</span>
                            @endif
                        </div>
                        <div class="flex space-x-2">
                            <a href="#" class="px-3 py-1 bg-primary text-white rounded hover:bg-blue-600">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection 