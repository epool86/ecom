@extends('layouts.flipmart')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Shopping Cart</h2>
        
        @if(session('cart') && count(session('cart')) > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-gray-600">Product</th>
                            <th class="px-4 py-3 text-left text-gray-600">Price</th>
                            <th class="px-4 py-3 text-left text-gray-600">Quantity</th>
                            <th class="px-4 py-3 text-left text-gray-600">Total</th>
                            <th class="px-4 py-3 text-gray-600"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @php $total = 0; @endphp
                        @foreach(session('cart') as $id => $item)
                            @php 
                                $productTotal = $item['price'] * $item['quantity'];
                                $total += $productTotal;
                            @endphp
                            <tr>
                                <td class="px-4 py-4">
                                    <div class="flex items-center">
                                        <div class="w-20 h-20 bg-gray-200 rounded-md mr-4 flex-shrink-0 overflow-hidden">
                                            @if($item['photo'])
                                                <img src="{{ asset('storage/' . $item['photo']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <span class="text-xs text-gray-500">No image</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h3 class="font-medium">{{ $item['name'] }}</h3>
                                            <p class="text-gray-500 text-sm line-clamp-1">{{ Str::limit($item['description'] ?? '', 50) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-secondary font-medium">${{ number_format($item['price'], 2) }}</td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="flex">
                                            @csrf
                                            <button type="submit" name="action" value="decrease" class="bg-gray-200 px-3 py-1 rounded-l">-</button>
                                            <input type="text" readonly value="{{ $item['quantity'] }}" class="w-12 border-y text-center py-1">
                                            <button type="submit" name="action" value="increase" class="bg-gray-200 px-3 py-1 rounded-r">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-4 py-4 font-bold text-secondary">${{ number_format($productTotal, 2) }}</td>
                                <td class="px-4 py-4 text-right">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="flex flex-col md:flex-row mt-10 gap-6">
                <!-- Coupon Code -->
                <div class="md:w-1/2">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-bold text-lg mb-4">Coupon Code</h3>
                        <form class="flex">
                            <input type="text" placeholder="Enter coupon code" class="flex-1 border rounded-l px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                            <button class="bg-primary text-white px-4 py-2 rounded-r hover:bg-blue-600">Apply</button>
                        </form>
                    </div>
                </div>
                
                <!-- Cart Totals -->
                <div class="md:w-1/2">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-bold text-lg mb-4">Cart Total</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between pb-2 border-b">
                                <span>Subtotal</span>
                                <span class="font-medium">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between pb-2 border-b">
                                <span>Shipping</span>
                                <span class="font-medium">Free</span>
                            </div>
                            <div class="flex justify-between pt-2">
                                <span class="font-bold">Total</span>
                                <span class="font-bold text-secondary">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        <div class="mt-6 flex space-x-2">
                            <a href="{{ route('home') }}" class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded text-center hover:bg-gray-300">
                                Continue Shopping
                            </a>
                            <a href="{{ route('checkout') }}" class="flex-1 bg-secondary text-white py-2 px-4 rounded text-center hover:bg-yellow-600">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-xl font-bold mb-2">Your cart is empty</h3>
                <p class="text-gray-600 mb-6">Looks like you haven't added any products to your cart yet.</p>
                <a href="{{ route('home') }}" class="bg-primary text-white py-2 px-6 rounded hover:bg-blue-600">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</div>
@endsection 