@extends('layouts.flipmart')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            
            <h2 class="text-3xl font-bold mb-4">Thank You for Your Order!</h2>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">Your order has been placed successfully. We'll send a confirmation email when your order ships.</p>
            
            <div class="bg-gray-50 max-w-lg mx-auto p-6 rounded-lg mb-8">
                <h3 class="text-lg font-bold mb-4 pb-2 border-b">Order Summary</h3>
                
                <div class="mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Order ID:</span>
                        <span class="font-medium">{{ $order->id }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium">{{ $order->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Total:</span>
                        <span class="font-medium">${{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Payment Method:</span>
                        <span class="font-medium">{{ ucfirst($order->payment_method) }}</span>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center">
                <a href="{{ route('home') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 