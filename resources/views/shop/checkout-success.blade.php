@extends('layouts.shop')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <h2 class="mt-4 text-2xl font-bold text-gray-900">Order Placed Successfully!</h2>
                <p class="mt-2 text-gray-600">Thank you for your order. Your order number is #{{ $order->id }}</p>
                
                @if(session('success'))
                    <div class="mt-4 p-2 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mt-4 p-2 bg-red-100 text-red-800 rounded">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Order Details</h3>
                <div class="border-t border-gray-200 pt-4">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="text-sm text-gray-900">{{ $order->customer_name }}</dd>
                        </div>
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="text-sm text-gray-900">{{ $order->customer_email }}</dd>
                        </div>
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="text-sm text-gray-900">{{ $order->customer_phone }}</dd>
                        </div>
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Shipping Address</dt>
                            <dd class="text-sm text-gray-900">{{ $order->shipping_address }}</dd>
                        </div>
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Payment Method</dt>
                            <dd class="text-sm text-gray-900">{{ ucfirst($order->payment_method) }}</dd>
                        </div>
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Payment Status</dt>
                            <dd class="text-sm font-semibold 
                                {{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
                                {{ ucfirst($order->payment_status) }}
                            </dd>
                        </div>
                        <div class="py-3 flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Total Amount</dt>
                            <dd class="text-sm font-semibold text-gray-900">${{ number_format($order->total_amount, 2) }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            @if($order->payment_method === 'manual')
            <div class="mt-8 bg-blue-50 p-4 rounded-md">
                <h4 class="text-lg font-semibold text-blue-800 mb-2">Bank Transfer Details</h4>
                <p class="text-sm text-blue-600">Please transfer the total amount to:</p>
                <div class="mt-2 text-sm text-blue-600">
                    <p>Bank: Your Bank Name</p>
                    <p>Account Name: Your Company Name</p>
                    <p>Account Number: XXXX-XXXX-XXXX</p>
                    <p>Reference: Order #{{ $order->id }}</p>
                </div>
            </div>
            @endif

            @if($order->payment_method === 'gateway' && $order->payment_status !== 'paid')
            <div class="mt-8 bg-yellow-50 p-4 rounded-md">
                <h4 class="text-lg font-semibold text-yellow-800 mb-2">Payment Pending</h4>
                <p class="text-sm text-yellow-600">Your payment is being processed. Once confirmed, your order status will be updated.</p>
            </div>
            @endif

            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 