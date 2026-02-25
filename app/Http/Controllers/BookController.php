<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Type;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view("books.index", ["books" => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create($request->all());

        return redirect()->route("books.index")->with("msg", "Book was created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("books.show", ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view("books.edit", ["book" => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $oldTitle = $book->title;
        $book->update($request->all());

        return redirect()->route("books.index")->with("msg", "{$oldTitle} was updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("books.index")->with("msg", "{$book->title} was deleted successfuly");
    }

    public function trashed(){
        $books = Book::onlyTrashed()->get();
        return view("books.index", ["books" => $books]);
    }

    public function restore(Book $book){
        $book->restore();
        return redirect()->route("books.index")->with("msg", "{$book->title} was restored successfuly");
    }
}
