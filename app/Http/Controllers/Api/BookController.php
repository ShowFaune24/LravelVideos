<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return response()->json(["books"=> $books, "msg" => "Here are your books" ]);
    }

    public function store(StoreBookRequest $request){
        $book = Book::create($request->all());
        return response()->json(["msg"=> "Book added", $book]);
    }

    public function update(UpdateBookRequest $request, Book $book){
        $book->update($request->all());
        return response()->json(["msg" => "Book was updated", $book]);
    }

    public function destroy(Book $book){
        $book->delete();
        return response()->json(["msg" => "Book was deleted"]);
    }
}
