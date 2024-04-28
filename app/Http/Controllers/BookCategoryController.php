<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        $categories = BookCategory::all();
        return view('book-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('book-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        BookCategory::create($request->all());

        return redirect()->route('book-categories.index')->with('success', 'Category created successfully.');
    }

    public function show(BookCategory $category)
    {
        return view('book-categories.show', compact('category'));
    }

    public function edit(BookCategory $category)
    {
        return view('book-categories.edit', compact('category'));
    }

    public function update(Request $request, BookCategory $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('book-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(BookCategory $category)
    {
        $category->delete();

        return redirect()->route('book-categories.index')->with('success', 'Category deleted successfully.');
    }
}
