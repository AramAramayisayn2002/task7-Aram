@extends('layouts.index')
@extends('layouts.header')
@section('title', 'Create Author')
@section('structure')
    <div class="container card" style="width: 40%">
        <h2>Create Author</h2>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input required type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <textarea required name="last_name" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="biography">Biography:</label>
                <textarea required name="biography" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="authors_count">Books:</label>
                <select type="text" name="books[]" class="form-select" multiple>
                    @foreach ($books as $book)
                        <option value = "{{$book->id}}">{{$book->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
