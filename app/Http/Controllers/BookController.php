<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\user;



use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $booksQuery = Book::query();

        // Filter books by category if a category ID is provided
        if ($request->has('category_id')) {
            $category_id = $request->input('category_id');
            $booksQuery->whereHas('category', function ($query) use ($category_id) {
                $query->where('id', $category_id);
            });
        }

        $books = $booksQuery->get();
        $categories = BookCategory::all();

        return view('books.index', compact('books', 'categories'));
    }





    public function create()
    {
        $categories = BookCategory::all();
        return view('books.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'book_category_id' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(User $user, Book $book)
    {
        return view('books.show', compact('book', 'user'));
    }

    public function edit(Book $book)
    {
        $categories = BookCategory::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'book_category_id' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function borrow(Book $book)
    {
        if ($book->stock > 0) {
            $book->users()->attach(auth()->user()->id, ['issued_at' => now()]);
            $book->decrement('stock');
            return redirect()->route('books.index')->with('success', 'Book borrowed successfully.');
        } else {
            return redirect()->route('books.index')->with('error', 'Book is out of stock.');
        }
    }

    public function return(Book $book)
    {
        $user = auth()->user();
        $book->users()->updateExistingPivot($user->id, ['returned_at' => now()]);
        $book->increment('stock');
        return redirect()->route('books.index')->with('success', 'Book returned successfully.');
    }



}
