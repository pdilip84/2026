<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of Products') }}
        </h2>
    </x-slot>
<div class="p-6 bg-white border-b border-gray-200">
    @if (session('success'))
        <div class="mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    <a href="{{ route('products.create') }}" class="bg-green-500 text-black px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Add New Product</a>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Created At</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->id }}</td>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">${{ number_format($product->price, 2) }}</td>
                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($product->description, 50) }}</td>
                    <td class="border px-4 py-2">{{ $product->created_at->format('Y-m-d') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="text-green-500 hover:underline ml-2">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
</x-app-layout>
