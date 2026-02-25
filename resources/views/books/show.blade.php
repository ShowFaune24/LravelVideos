@extends("layouts.app")

@section("content")

    <p>This page is about {{ $book->title }}</p>
    <p>It was written by {{ $book->author }} in the year of {{ $book->year }}</p>

    <p>This book is a {{ $book->type->name }} book</p>

    <ul>
        @foreach ($book->type->books as $recommendedbook)
        @if ($recommendedbook->id === $book->id)
            @continue
        @endif
            <li>{{ $recommendedbook->title }}</li>
        @endforeach
    </ul>

    <p>Users who bought this:</p>
    <ul>
        @foreach ($book->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection