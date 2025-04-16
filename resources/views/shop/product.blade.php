@extends('layouts.shop')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="md:flex">
        <div class="md:w-1/2 p-6 flex items-center justify-center bg-gray-50">
            @if($product->photo)
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="max-w-full max-h-96 object-contain">
            @else
                <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No image</span>
                </div>
            @endif
        </div>
        <div class="p-8 md:w-1/2">
            <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
            
            <!-- Rating Stars -->
            <div class="flex mb-4">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < rand(3, 5))
                        <svg class="h-5 w-5 text-yellow-500 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    @else
                        <svg class="h-5 w-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    @endif
                @endfor
                <span class="ml-2 text-gray-600">({{ rand(10, 150) }} reviews)</span>
            </div>
            
            <!-- Price -->
            <div class="flex items-baseline mb-6">
                <span class="text-2xl font-bold text-blue-800">${{ number_format($product->price, 2) }}</span>
                <span class="text-lg text-gray-500 line-through ml-2">${{ number_format($product->price * 1.2, 2) }}</span>
                <span class="ml-2 bg-green-100 text-green-800 px-2 py-1 rounded text-sm">20% Off</span>
            </div>
            
            <div class="border-t border-b py-4 mb-6">
                <p class="text-gray-700">{{ $product->description }}</p>
            </div>
            
            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add', $product) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                    <div class="flex w-1/3">
                        <button type="button" id="decrease" class="bg-gray-200 px-3 rounded-l border border-gray-300">-</button>
                        <input type="number" name="quantity" id="quantity" min="1" value="1" 
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-center">
                        <button type="button" id="increase" class="bg-gray-200 px-3 rounded-r border border-gray-300">+</button>
                    </div>
                </div>
                
                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 bg-blue-600 text-white px-8 py-3 rounded-md hover:bg-blue-700 transition flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Add to Cart
                    </button>
                    <button type="button" class="bg-gray-200 hover:bg-gray-300 p-3 rounded-md transition">
                        <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>
            </form>
            
            <!-- Features -->
            <div class="mt-6 space-y-4 text-sm text-gray-600">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Free shipping on orders over $99</span>
                </div>
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Easy 30 days returns</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Quantity increment/decrement
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity');
        const decreaseBtn = document.getElementById('decrease');
        const increaseBtn = document.getElementById('increase');
        
        decreaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
        
        increaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    });
</script>
@endsection 