@extends('layouts.index')
@extends('layouts.header')
@section('title', 'Books')
@section('structure')
    <div class="container">
        <div style="margin-top: 50px">
            <h2>Books</h2>
            <div class = "d-flex justify-content-between">
                <div class="me-2">
                    <a href="{{Route('books.create')}}" class="btn btn-primary">
                        Create
                    </a>
                </div>
                <div class="search_container">
                    <form action='{{Route('books.search') }}' method="GET">
                        @csrf
                        <input class="search" name="search" type="text" placeholder="search" id="searchInput">
                        <button class="btn btn-primary ms-2" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Publication Year</th>
                    <th>Authors</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            @foreach ($book->authors as $author)
                                <div>{{ $author->first_name}}</div>
                            @endforeach
                        </td>
                        <td class=" d-flex">
                            <a href="{{ route('books.edit', $book->id) }}" class = "me-2">
                                <button class="btn btn-success">Edit</button>
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
