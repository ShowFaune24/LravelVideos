<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookShop</title>

    @vite(['resources/sass/app.scss', 'resources/js/app/js'])
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
    <h1>Welcome to our Tiny Seaside BookShop</h1>
    @yield('subtitle')
    <hr>
    <a href="{{ route('books.index') }}">List all books</a>
    @can('create', App\Models\Book::class)
        <a href="{{ route('books.create') }}">Create new book</a>
    @endcan
    <a href="{{ route('books.trashed') }}">Show deleted books</a>
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @else
    
    <form action="{{ route('logout') }}" method="POST" id="LogoutForm">
        @csrf
        <button class="like-a-tag">Logout</button>
    </form>
    @endguest
    <div class="app-container">
        @yield('content')
    </div>
</body>
</html>