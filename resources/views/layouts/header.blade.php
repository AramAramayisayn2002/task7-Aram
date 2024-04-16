<div class="d-flex justify-content-around mt-5">
    <a href="{{route('books.index')}}"><h3>Books</h3></a>
    <a href="{{route('authors.index')}}"><h3>Authors</h3></a>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button class="btn btn-danger">
            Logout
        </button>
    </form>
</div>
