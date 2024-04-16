<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorsRequest;
use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $books = Book::with('authors')->first();
        return view('admin/authors', compact('authors', 'books'));
    }

    public function create()
    {
        $books = Book::all();
        return view('admin/authors/create', compact('books'));
    }

    public function store(CreateAuthorsRequest $request)
    {
        $validatedData = $request->validated();
        $author = new Author();
        $author->fill($validatedData);
        $author->save();
        $bookId = $request->books;
        if ($bookId) {
            foreach ($bookId as $key) {
                $authorBook = new AuthorBook([
                    'author_id' => $author->id,
                    'book_id' => $key
                ]);
                $authorBook->save();
            }
        }
        return redirect()->route('authors.index');
    }

    public function search(Request $request)
    {
        $authors = Author::where('first_name', 'like', '%' . $request->search . '%')
            ->orWhere('last_name', 'like', '%' . $request->search . '%')
            ->get();
        return view('admin/authors', compact('authors'));
    }

    public function edit($id)
    {
        $author = Author::where('id', $id)
            ->first();
        $books = Book::all();
        return view('admin/authors/edit', compact('author', 'books'));
    }

    public function update(CreateAuthorsRequest $request, $id)
    {
        $validatedData = $request->validated();
        $author = Author::findOrFail($id);
        $author->fill($validatedData);
        $author->books()->detach();
        if ($request->has('books')) {
            $author->books()->attach($request->books);
        }
        return redirect()->route('authors.index');
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if ($author) {
            $author->delete();
        }
        return redirect()->route('authors.index');
    }

    public function welcome()
    {
        $authors = Author::all();
        $books = Book::with('authors')->first();
        return view('authors', compact('authors', 'books'));
    }
}
