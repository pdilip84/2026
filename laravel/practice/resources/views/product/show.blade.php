<x-app-layout   >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
        <p class="text-lg mb-2">Price: ${{ number_format($product->price, 2) }}</p>
        <p class="text-lg mb-2">Stock: {{ $product->stock }}</p>
        <p class="text-gray-700">{{ $product->description }}</p>
        <p class="text-sm text-gray-500 mt-4">Category: {{ $product->category->name }}</p>
        <p class="text-sm text-gray-500 mt-4">Created at: {{ $product->created_at->format('Y-m-d') }}</p>
        <p class="text-sm text-gray-500">Updated at: {{ $product->updated_at->format('Y-m-d') }}</p>
        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to List</a>
    </div>
</x-app-layout>
