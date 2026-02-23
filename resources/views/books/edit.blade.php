@extends("layouts.app")

@section("subtitle")
    <h4>Edit {{ $book->title }}</h4>
@endsection

@section("content")
    <div class="form-container">
        @if ($errors->any())
        <p style="color: red; font-weight: bold;">You have some errors</p>
            <ul style="color: red">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                    <label for="title" @error('title') style="color: red" @enderror>Title</label>
                    @error('title')
                        <span>{{ $error }}</span>                        
                    @enderror
                    <input type="text" name="title" id="title" value="{{ old("title", $book->title) }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old("price", $book->price) }}" step=".01">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" value="{{ old("year", $book->year) }}" min="0" max="2026">
            </div>
            <div class="form-group">
                <label for="limited">Limited edition?</label>
                <input type="checkbox" name="limited" id="limited" value="1" 
                {{ old("limited", $book->limited ? "checked" : "") ? "checked" : "" }}>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ old("author", $book->author) }}">
            </div>
            <div>
                <button class="like-a-tag">Edit this book</button>
            </div>
        </form>
    </div>
@endsection