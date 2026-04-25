<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books Show') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.review.store', $book->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="review" class="block text-sm font-medium text-gray-700 dark:text-gray-300" >Review:</label>
                        <textarea class="border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" name="review" id="review" required></textarea>
                    </div>
                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rating:</label>
                        <select class="border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" name="rating" id="rating" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                    <a href="{{ route('books.show', $book) }}" class="text-blue-500 hover:underline ml-4">Back to Book Details</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

