<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookShop</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
    <h1>Welcome to our Tiny Seaside BookShop</h1>
    @yield('subtitle')
    <hr>
    <a href="{{ route("books.index") }}">List all books</a>
    <a href="{{ route("books.create") }}">Create new book</a>
    <a href="">Show deleted books</a>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>