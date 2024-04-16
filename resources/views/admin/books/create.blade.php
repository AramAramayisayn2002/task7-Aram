@extends('layouts.index')
@extends('layouts.header')
@section('title', 'Create Book')
@section('structure')
    <div class="container card" style="width: 40%">
        <h2>Create Book</h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input required type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea required name="description" id="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="publication_year">Publication Year:</label>
                <input required type="number" name="publication_year" id="publication_year" class="form-control">
            </div>
            <div class="form-group">
                <label for="authors_count">Authors:</label>
                <select type="text" name="authors[]" class="form-select" multiple required>
                        @foreach ($authors as $author)
                    <option value = "{{$author->id}}">{{$author->first_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
