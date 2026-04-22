<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="{{ route('books.index') }}" class="mb-4">
                        <div class="flex flex-wrap -mx-2 items-center space-x-4">
                            <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title or author" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            @if(request('filter'))
                                <input type="hidden" name="filter" value="{{ request('filter') }}">
                            @endif
                            <div class="w-full md:w-auto px-2 mb-4 md:mb-0">
                                <button type="submit" class="btn btn-primary px-4">Search</button>
                                <button type="button" onclick="window.location='{{ route('books.index') }}'" class="btn btn-secondary px-4">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        @php
                            $filters = [
                                'highest_reviewed' => 'Most Reviwed Books',
                                'highest_rated' => 'Highest Rated / Popular Books'
                            ]
                        @endphp
                        <div class="flex space-x-4">
                            @foreach($filters as $key => $label)
                                <a href="{{ route('books.index', array_filter(['filter' => $key, 'search' => request('search')])) }}" class="px-3 py-2 rounded-md {{ request('filter') === $key ? 'bg-gray-200 text-gray-700 hover:bg-gray-300' : 'bg-white-200 text-gray-700 hover:bg-gray-300' }}">
                                    {{ $label }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-start">
                            <thead class="text-start">
                                <tr class="bg-gray-100 dark:bg-gray-700 border-b-2 border-gray-300 dark:border-gray-600">
                                    <th class="w-2/5 px-4 py-3 text-start font-bold">Book Name</th>
                                    <th class="w-1/5 px-4 py-3 text-start font-bold">Author</th>
                                    <th class="w-1/5 px-4 py-3 text-start font-bold">Total Reviews</th>
                                    <th class="w-1/5 px-4 py-3 text-start font-bold">Average Ratings</th>
                                    <th class="w-1/5 px-4 py-3 text-start font-bold">Created Date</th>
                                    <th class="w-1/5 px-4 py-3 text-start font-bold">Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr class="border-b border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="w-2/5 px-4 py-4">
                                            <a href="{{ route('books.show', $book) }}" class="book-title font-semibold text-blue-600 dark:text-blue-400 hover:underline">{{ $book->title }}</a>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">ID: {{ $book->id }}</div>
                                        </td>
                                        <td class="w-1/5 px-4 py-4 text-gray-700 dark:text-gray-300">{{ $book->author }}</td>
                                        <td class="w-1/5 px-4 py-4 text-gray-700 dark:text-gray-300">
                                            @if ($book->reviews_count > 0)
                                                {{ $book->reviews_count }} reviews
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">No reviews</span>
                                            @endif
                                        </td>
                                        <td class="w-1/5 px-4 py-4 text-gray-700 dark:text-gray-300">
                                            @if ($book->reviews_avg_rating > 0)
                                                {{ number_format($book->reviews_avg_rating, 1) }}/5
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">No rating</span>
                                            @endif
                                        </td>
                                        <td class="w-1/5 px-4 py-4 text-gray-700 dark:text-gray-300">{{ date_format($book->created_at, 'd-m-y') }}</td>
                                        <td class="w-1/5 px-4 py-4 text-gray-700 dark:text-gray-300">{{ date_format($book->updated_at, 'd-m-y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $books->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
