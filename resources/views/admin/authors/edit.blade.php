@extends('layouts.index')
@extends('layouts.header')
@section('title', 'Edit Author')
@section('structure')
    <div class="container card" style="width: 50%">
        <div class="edit_form_wrapper">
            <div class="edit_form_container">
                <div>
                    <h2>Edit Author {{$author->id}}</h2>
                    <form action="{{ route('authors.update', $author->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group d-flex justify-content-around">
                            <input name="first_name" type="text" placeholder="first_name"
                                   value="{{ $author->first_name }}">
                            <input name="last_name" type="text" placeholder="last_name"
                                   value="{{ $author->last_name }}">
                            <input name="biography" type="text" placeholder="biography"
                                   value="{{ $author->biography }}">
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <select type="text" name="books[]" class="form-select" multiple>
                                <?php
                                for ($i = 0; $i < count($books); $i++) {
                                    ?>
                                <option
                                        <?php
                                    $a = count($author->books);
                                    for ($j = 0; $j < $a; $j++)
                                        if ($i == $author->books[$j]->id)
                                            echo 'selected';
                                    ?>
                                value="{{$books[$i]->id}}">{{$books[$i]->title}}
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
