@extends('layouts.index')
@extends('layouts.header')
@section('title', 'Edit Book')
@section('structure')
    <div class="container card" style="width: 50%">
        <div class="edit_form_wrapper">
            <div class="edit_form_container">
                <div>
                    <h2>Edit book {{$book->id}}</h2>
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group d-flex justify-content-around">
                            <input name="title" type="text" placeholder="title"
                                   value="{{ $book->title }}">
                            <input name="description" type="text" placeholder="description"
                                   value="{{ $book->description }}">
                            <input name="publication_year" type="number" placeholder="publication_year"
                                   value="{{ $book->publication_year }}">
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <select type="text" name="authors[]" class="form-select" multiple required>
                                <?php
                                for ($i = 0; $i < count($authors); $i++) {
                                    ?>
                                <option
                                        <?php
                                    $a = count($book->authors);
                                    for ($j = 0; $j < $a; $j++)
                                        if ($i == $book->authors[$j]->id)
                                            echo 'selected';
                                    ?>
                                value="{{$authors[$i]->id}}">{{$authors[$i]->first_name}}
                                </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
