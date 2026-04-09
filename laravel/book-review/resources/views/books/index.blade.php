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
                    <ul>
                        @foreach($books as $book)
                            <li class="mb-4 border-b pb-4">
                            <div class="book-item">
                                <div
                                class="flex flex-wrap items-center justify-between">
                                <div class="w-full flex-grow sm:w-auto">
                                    <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                                </div>
                                <div class="w-full sm:w-auto mt-2 sm:mt-0">
                                    <span class="book-author">by {{ $book->author }}</span>
                                </div>
                                <div>
                                    <div class="book-rating">
                                    3.5
                                    </div>
                                    <div class="book-review-count">
                                    out of 5 reviews
                                    </div>
                                </div>
                                </div>
                            </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
