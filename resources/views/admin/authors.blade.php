@extends('layouts.index')
@extends('layouts.header')
@section('title', 'Authors')
@section('structure')
    <div class="container">
        <div style="margin-top: 50px">
            <h2>Authors</h2>
            <div class = "d-flex justify-content-between">
                <div class="me-2">
                    <a href="{{Route('authors.create')}}" class="btn btn-primary">
                        Create
                    </a>
                </div>
                <div class="search_container">
                    <form action='{{Route('authors.search') }}' method="GET">
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
                    <th>First_name</th>
                    <th>Last_name</th>
                    <th>Biography</th>
                    <th>Books</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->first_name }}</td>
                        <td>{{ $author->last_name }}</td>
                        <td>{{ $author->biography }}</td>
                        <td>
                            @foreach ($author->books as $book)
                                <div>{{ $book->title}}</div>
                            @endforeach
                        </td>
                        <td class=" d-flex">
                            <a href="{{ route('authors.edit', $author->id) }}" class = "me-2">
                                <button class="btn btn-success">Edit</button>
                            </a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
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
