<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }} {{-- Display product name in header --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Add photo display if implemented --}}
                    @if($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover mb-4 rounded-lg">
                    @endif

                    <h3 class="text-lg font-medium text-gray-900">Description</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $product->description }}</p>

                    <div class="mt-4">
                        <h3 class="text-lg font-medium text-gray-900">Price</h3>
                        <p class="mt-1 text-sm text-gray-600">${{ number_format($product->price, 2) }}</p>
                    </div>

                    {{-- Add links for Edit/Delete if needed --}}
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Back to Products</a>
                        {{-- Example Edit Link --}}
                        <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                        {{-- Add Delete Form/Button here if needed --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
