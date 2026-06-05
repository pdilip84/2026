<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
<div class="p-6 bg-white border-b border-gray-200">
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full px-3 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price:</label>
            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full px-3 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea name="description" id="description" class="w-full px-3 py-2 border rounded">{{ old('description', $product->description) }}</textarea>
        </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock:</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category:</label>
                <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">Update Product</button>
        <a href="{{ route('products.index') }}" class="ml-4 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
</x-app-layout>
