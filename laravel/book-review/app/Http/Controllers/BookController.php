<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        // if ($request->has('filter')) {
        //     $filter = $request->input('filter');
        //     // dd($filter);
        //     if ($filter === 'highest_reviewed') {
        //         $books = Book::mostReviewedBooks()->paginate(20);
        //     } elseif ($filter === 'highest_rated') {
        //         $books = Book::highestRatedBooks()->paginate(20);
        //     } else {
        //         $books = Book::select(['id', 'title', 'author', 'published_date'])->paginate(20);
        //     }
        // } else if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $books = Book::where('title', 'like', "%{$search}%")
        //         ->orWhere('author', 'like', "%{$search}%")
        //         ->select(['id', 'title', 'author', 'published_date'])
        //         ->paginate(20);
        // } else {
        //     $books = Book::select(['id', 'title', 'author', 'published_date'])->paginate(20);
        // }

        $query = Book::query()->select(['id', 'title', 'author', 'published_date']);

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
                $query->mostReviewedBooks(); // scope
            } elseif ($filter === 'highest_rated') {
                $query->highestRatedBooks(); // scope
            }
        }
        // Default ordering (optional)
        if (!$request->filled('filter')) {
            $query->latest(); // or any default order
        }

        $books = $query->paginate(20);

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
    public function update(Request $request, string $id)
    {
        //
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
