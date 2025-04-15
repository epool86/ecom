@extends('layouts.flipmart')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Checkout</h2>
        
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Customer Information -->
                <div class="lg:w-2/3">
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-4 pb-2 border-b">Billing Details</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="first_name" class="block text-gray-700 mb-2">First Name <span class="text-red-500">*</span></label>
                                <input type="text" id="first_name" name="first_name" required class="w-full border rounded px-4 py-2">
                            </div>
                            <div>
                                <label for="last_name" class="block text-gray-700 mb-2">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" id="last_name" name="last_name" required class="w-full border rounded px-4 py-2">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="company" class="block text-gray-700 mb-2">Company Name (Optional)</label>
                            <input type="text" id="company" name="company" class="w-full border rounded px-4 py-2">
                        </div>
                        
                        <div class="mb-4">
                            <label for="country" class="block text-gray-700 mb-2">Country <span class="text-red-500">*</span></label>
                            <select id="country" name="country" required class="w-full border rounded px-4 py-2">
                                <option value="">Select a country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="AU">Australia</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 mb-2">Street Address <span class="text-red-500">*</span></label>
                            <input type="text" id="address" name="address" required placeholder="House number and street name" class="w-full border rounded px-4 py-2 mb-2">
                            <input type="text" id="address2" name="address2" placeholder="Apartment, suite, unit, etc. (optional)" class="w-full border rounded px-4 py-2">
                        </div>
                        
                        <div class="mb-4">
                            <label for="city" class="block text-gray-700 mb-2">Town / City <span class="text-red-500">*</span></label>
                            <input type="text" id="city" name="city" required class="w-full border rounded px-4 py-2">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="state" class="block text-gray-700 mb-2">State <span class="text-red-500">*</span></label>
                                <input type="text" id="state" name="state" required class="w-full border rounded px-4 py-2">
                            </div>
                            <div>
                                <label for="postcode" class="block text-gray-700 mb-2">Postcode / ZIP <span class="text-red-500">*</span></label>
                                <input type="text" id="postcode" name="postcode" required class="w-full border rounded px-4 py-2">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" required class="w-full border rounded px-4 py-2">
                            </div>
                            <div>
                                <label for="phone" class="block text-gray-700 mb-2">Phone <span class="text-red-500">*</span></label>
                                <input type="tel" id="phone" name="phone" required class="w-full border rounded px-4 py-2">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <input type="checkbox" id="shipping_different" name="shipping_different" class="mr-2">
                            <label for="shipping_different" class="text-gray-700">Ship to a different address?</label>
                        </div>
                        
                        <div class="mb-4">
                            <label for="order_notes" class="block text-gray-700 mb-2">Order Notes (Optional)</label>
                            <textarea id="order_notes" name="order_notes" rows="4" placeholder="Notes about your order, e.g. special notes for delivery" class="w-full border rounded px-4 py-2"></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-bold mb-4 pb-2 border-b">Your Order</h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between pb-2 border-b">
                                <span class="font-medium">Product</span>
                                <span class="font-medium">Total</span>
                            </div>
                            
                            @if(session('cart') && count(session('cart')) > 0)
                                @php $total = 0; @endphp
                                @foreach(session('cart') as $id => $item)
                                    @php 
                                        $productTotal = $item['price'] * $item['quantity'];
                                        $total += $productTotal;
                                    @endphp
                                    <div class="flex justify-between py-2 border-b">
                                        <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                                        <span>${{ number_format($productTotal, 2) }}</span>
                                    </div>
                                @endforeach
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span>Subtotal</span>
                                    <span>${{ number_format($total, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between py-2 border-b">
                                    <span>Shipping</span>
                                    <span>Free Shipping</span>
                                </div>
                                
                                <div class="flex justify-between py-2 font-bold">
                                    <span>Total</span>
                                    <span class="text-secondary">${{ number_format($total, 2) }}</span>
                                </div>
                            @else
                                <div class="py-4 text-center text-gray-500">
                                    Your cart is empty.
                                </div>
                            @endif
                        </div>
                        
                        <div class="space-y-4 mb-6">
                            <div class="border p-4 rounded">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="bank" class="mr-2" checked>
                                    <span>Direct Bank Transfer</span>
                                </label>
                                <p class="text-sm text-gray-600 mt-2 pl-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                            </div>
                            
                            <div class="border p-4 rounded">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="check" class="mr-2">
                                    <span>Check Payment</span>
                                </label>
                            </div>
                            
                            <div class="border p-4 rounded">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash" class="mr-2">
                                    <span>Cash on Delivery</span>
                                </label>
                            </div>
                            
                            <div class="border p-4 rounded">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="paypal" class="mr-2">
                                    <span>PayPal</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-4">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                            
                            <label class="flex items-center mb-4">
                                <input type="checkbox" name="terms" required class="mr-2">
                                <span class="text-sm">I have read and agree to the website <a href="#" class="text-primary">terms and conditions</a> <span class="text-red-500">*</span></span>
                            </label>
                        </div>
                        
                        <button type="submit" class="w-full bg-secondary text-white py-3 rounded hover:bg-yellow-600 font-bold">
                            PLACE ORDER
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 