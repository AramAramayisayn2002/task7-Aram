@extends('layouts.index')
@section('title', 'Authors')
@section('structure')
    <div class="container">
        <div style="margin-top: 50px">
            <div class="d-flex justify-content-between">
                <a href="http://127.0.0.1:8000/"><h2>Books</h2></a>
                <a href="http://127.0.0.1:8000/authors"><h2>Authors</h2></a>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th>First_name</th>
                <th>Last_name</th>
                <th>Biography</th>
                <th>Books</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->first_name }}</td>
                    <td>{{ $author->last_name }}</td>
                    <td>{{ $author->biography }}</td>
                    <td>
                        @foreach ($author->books as $book)
                            <div>{{ $book->title}}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
