<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $authors = Author::with('books')->first();
        return view('admin/books', compact('books', 'authors'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin/books/create', compact('authors'));
    }

    public function store(Request $request)
    {
        $authorId = $request->authors;
        if ($authorId) {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'max:1000|required',
                'publication_year' => 'integer|required|max:2024'
            ]);
            $book = new Book($validatedData);
            $book->save();
            foreach ($authorId as $key) {
                $authorBook = new AuthorBook([
                    'author_id' => $key,
                    'book_id' => $book->id
                ]);
                $authorBook->save();
            }
            return redirect()->route('books.index');
        } else {
            return redirect()->route('books.create');
        }
    }

    public function search(Request $request)
    {
        $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        return view('admin/books', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::where('id', $id)
            ->first();
        $authors = Author::all();
        return view('admin/books/edit', compact('book', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $authorId = $request->authors;
        if ($authorId) {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'max:1000|required',
                'publication_year' => 'integer|required|max:2024'
            ]);
            $book = Book::findOrFail($id);
            $book->update($validatedData);
            AuthorBook::where('book_id', $id)
                ->delete();
            foreach ($request->authors as $key) {
                $authorBook = new AuthorBook([
                    'author_id' => $key,
                    'book_id' => $book->id
                ]);
                $authorBook->save();
            }
        }
        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
        }
        return redirect()->route('books.index');
    }

    public function welcome()
    {
        $books = Book::all();
        $authors = Author::with('books')->first();
        return view('books', compact('books', 'authors'));
    }
}
