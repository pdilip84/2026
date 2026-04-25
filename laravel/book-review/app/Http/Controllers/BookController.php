<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start with base query
        $query = Book::query()->select(['id', 'title', 'author', 'created_at', 'updated_at']);

        // Apply search (if exists)
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }
        // Apply filter (if exists)
        if ($request->filled('filter')) {
            $filter = $request->input('filter');

            if ($filter === 'highest_reviewed') {
                $query->mostReviewedBooks()->WithcountRatings(); // scope
            } elseif ($filter === 'highest_rated') {
                $query->highestRatedBooks()->WithCountReviews(); // scope
            }
        }
        // Default ordering (optional)
        if (!$request->filled('filter')) {
            $query->WithCountReviews(); // default to most reviewed if no filter is applied
            $query->WithcountRatings(); // default to highest rated if no filter is applied
            $query->latest(); // or any default order
        }

        $books = $query->paginate(20);

        // Cache the paginated results for 1 hour (3600 seconds) using default database cache store

        // $books = cache()->store('database')->remember('books_index_1', 3600, function () use ($query) {
        //     return $query->paginate(20);
        // });

        // let us demonstrate file cache store for the same query
        // $books = cache()->store('file')->remember('books_index_1', 3600, function () use ($query) {
        //     return $query->paginate(20);
        // });

        // let us demonstrate memcached cache store for the same query
        // this required memcached server to be installed and configured in the .env file

        // $books = cache()->store('memcached')->remember('books_index_1', 3600, function () use ($query) {
        //     return $query->paginate(20);
        // });

        // demonstrate redis cache store for the same query
        // this required redis server to be installed and configured in the .env file

        // $books = cache()->store('redis')->remember('books_index_1', 3600, function () use ($query) {
        //     return $query->paginate(20);
        // });

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // $query = Book::query()->select(['id', 'title', 'author', 'created_at']);
        // $book = $query->withCount('reviews')->withAvg('reviews', 'rating')->findOrFail($book->id);

        // $book->loadCount('reviews')->loadAvg('reviews', 'rating')->orderBy('created_at', 'asc');
        $book->loadCount('reviews')->loadAvg('reviews', 'rating')->orderBy('created_at', 'asc');
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->validated());

        return redirect()->route('books.show', $book)->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}