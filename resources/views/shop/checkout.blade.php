@extends('layouts.shop')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-6">Checkout</h2>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                <div class="space-y-2">
                    @foreach($cart as $id => $item)
                    <div class="flex justify-between">
                        <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                        <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </div>
                    @endforeach
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-bold">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone" id="phone" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                    <textarea name="address" id="address" rows="3" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="manual" value="manual" checked 
                                class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="manual" class="ml-2 block text-sm text-gray-900">
                                Manual Bank Transfer
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="gateway" value="gateway" 
                                class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="gateway" class="ml-2 block text-sm text-gray-900">
                                Online Payment (Credit Card)
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 