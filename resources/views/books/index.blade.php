@extends("layouts.app")

@section('content')

    @if (session()->has("msg"))
        <p>{{ session()->get("msg") }}</p>
    @endif

    <table>
        <thead>
            <th>Title</th>
            <th>Price</th>
            <th>Realise Year</th>
            <th>Author</th>
            <th>Limited edition?</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($books as $book)
                
            
            <tr class="table-row">
                <td>{{ $book->title }}</td>
                <td>${{ $book->price }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->author }}</td>
                <td><input type="checkbox" {{ $book->limited ? "checked" : "" }} disabled></td>
                <td>
                    <div class="action-holder">
                        @if (isset($book->deleted_at) == false)
                        <form action="{{ route("books.show", $book) }}">
                            <button class="like-a-tag">Show</button>
                        </form>
                        <form action="{{ route("books.edit", $book) }}">
                            <button class="like-a-tag">Edit</button>
                        </form>
                        <form action="{{ route("books.destroy", $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="like-a-tag">Delete</button>
                        </form>
                        @else
                        <form action="{{ route("books.restore", $book) }}" method="POST">
                            @csrf
                            <button class="like-a-tag">Restore</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection