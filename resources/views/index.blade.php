@extends('layouts.index')
@section('title', 'login')
@section('structure')
<div class="login-form">
    <h2 class="text-center">Login</h2>
    <form action="{{Route('login')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
@endsection
