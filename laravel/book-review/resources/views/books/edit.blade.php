<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books Edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Edit Book</h1>
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" value="{{ $book->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="author" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Author:</label>
                            <input type="text" name="author" id="author" value="{{ $book->author }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="created_at" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Created Date:</label>
                            <input type="date" name="created_at" id="created_at" value="{{ $book->created_at->format('Y-m-d') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline btn">Update Book</button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline btn" onclick="window.location='{{ route('books.show', $book->id) }}'">Cancel</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
