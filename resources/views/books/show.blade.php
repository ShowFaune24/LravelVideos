@extends("layouts.app")

@section("content")

    <p>This page is about {{ $book->title }}</p>
    <p>It was written by {{ $book->author }} in the year of {{ $book->year }}</p>

@endsection