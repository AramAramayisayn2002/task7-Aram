@extends('layouts.index')
@section('title', 'Books')
@section('structure')
    <div class="container">
        <div style="margin-top: 50px">
            <div class = "d-flex justify-content-between">
                <a href="http://127.0.0.1:8000/"><h2>Books</h2></a>
                <a href="http://127.0.0.1:8000/authors"><h2>Authors</h2></a>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Publication Year</th>
                <th>Authors</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>
                        @foreach ($book->authors as $author)
                            <div>{{ $author->first_name}}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
