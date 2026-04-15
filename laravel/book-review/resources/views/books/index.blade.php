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
                    <ul>
                        @foreach($books as $book)
                            <li class="mb-4 border-b pb-4">
                            <div class="book-item">
                                <div class="book-id">
                                    ID: {{ $book->id }}
                                </div>
                                <div class="flex flex-wrap items-center justify-between">
                                <div class="w-full flex-grow sm:w-auto">
                                    <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                                </div>
                                <div class="w-full sm:w-auto mt-2 sm:mt-0">
                                    <span class="book-author">by {{ $book->author }}</span>
                                </div>
                                @if ($book->reviews_count > 0)
                                <div>
                                    <div class="book-rating">
                                        {{-- @php
                                            dd($book);
                                        @endphp --}}
                                    {{ $book->reviews_count }} reviews
                                    </div>
                                </div>
                                @endif
                                @if ($book->reviews_avg_rating > 0)
                                <div>
                                    <div class="book-rating">
                                    {{ number_format($book->reviews_avg_rating, 1)   }}/5
                                    </div>
                                </div>
                                @endif
                                </div>
                            </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $books->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
