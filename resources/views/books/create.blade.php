@extends("layouts.app")

@section("subtitle")
    <h4>Create new book</h4>
@endsection

@section("content")
    <div class="form-container">
        <form action="{{ route("books.store") }}" method="POST">
            @csrf
            <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="Harry Potter and the Chamber of Secrets">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="14.75" step=".01">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" value="1990" min="0" max="2026">
            </div>
            <div class="form-group">
                <label for="limited">Limited edition?</label>
                <input type="checkbox" name="limited" id="limited" value="1">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="J.K Rowling">
            </div>
            <div>
                <button class="like-a-tag">Create new book</button>
            </div>
        </form>
    </div>
@endsection