@extends('layouts.shop')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Cart Header -->
    <div class="border-b px-6 py-4">
        <h2 class="text-2xl font-bold text-gray-800">Shopping Cart</h2>
    </div>
    
    @if(count($cart) > 0)
        <!-- Cart Items -->
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="pb-4 font-semibold">Product</th>
                            <th class="pb-4 font-semibold">Price</th>
                            <th class="pb-4 font-semibold">Quantity</th>
                            <th class="pb-4 font-semibold">Total</th>
                            <th class="pb-4 font-semibold"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $item)
                        <tr class="border-b">
                            <td class="py-4 pr-4">
                                <div class="flex items-center">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded mr-4">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center mr-4">
                                            <span class="text-gray-500">No image</span>
                                        </div>
                                    @endif
                                    <span class="font-medium">{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-blue-700 font-medium">${{ number_format($item['price'], 2) }}</td>
                            <td class="py-4">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center max-w-[120px]">
                                    @csrf
                                    <button type="button" class="quantity-btn decrease bg-gray-100 px-3 py-1 rounded-l border border-gray-300">-</button>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                        class="quantity-input w-12 border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-center py-1 border-y">
                                    <button type="button" class="quantity-btn increase bg-gray-100 px-3 py-1 rounded-r border border-gray-300">+</button>
                                    <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800 text-sm underline">Update</button>
                                </form>
                            </td>
                            <td class="py-4 font-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="py-4 text-right">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Cart Footer -->
        <div class="bg-gray-50 p-6">
            <div class="md:flex justify-between items-start">
                <!-- Coupon Code -->
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <div class="flex max-w-md">
                        <input type="text" placeholder="Coupon Code" class="w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700">
                            Apply Coupon
                        </button>
                    </div>
                </div>
                
                <!-- Cart Totals -->
                <div class="md:w-1/3">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold mb-4 pb-2 border-b">Cart Total</h3>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium">Free</span>
                            </div>
                            <div class="flex justify-between py-2 text-lg font-bold">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ route('checkout') }}" class="block w-full bg-blue-600 text-white text-center px-6 py-3 rounded-md hover:bg-blue-700 transition">
                                Proceed to Checkout
                            </a>
                            <a href="{{ route('home') }}" class="block w-full bg-gray-200 text-gray-800 text-center px-6 py-3 rounded-md hover:bg-gray-300 transition">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty Cart -->
        <div class="p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Your cart is empty</h3>
            <p class="text-gray-600 mb-6">Looks like you haven't added any products to your cart yet.</p>
            <a href="{{ route('home') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
                Continue Shopping
            </a>
        </div>
    @endif
</div>

<script>
    // Quantity increment/decrement
    document.addEventListener('DOMContentLoaded', function() {
        const decreaseBtns = document.querySelectorAll('.quantity-btn.decrease');
        const increaseBtns = document.querySelectorAll('.quantity-btn.increase');
        
        decreaseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.nextElementSibling;
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
        });
        
        increaseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const currentValue = parseInt(input.value);
                input.value = currentValue + 1;
            });
        });
    });
</script>
@endsection 