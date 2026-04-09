<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Author: {{ $book->author }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $book->description }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Published on {{ $book->created_at->format('F j, Y') }}</p>
                    <div class="book-rating">
                        3.5 out of 5 reviews</div>
                    <div class="book-review-count">
                        10 reviews</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('books.index') }}" class="text-blue-500 hover:underline ">Back to Book List</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 hover:underline ml-4 px-4">Edit Book</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline ml-4">Delete Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
