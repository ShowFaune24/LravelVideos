<?php

namespace App\Observers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     */
    public function creating(Book $book): void
    {
        $book->created_by = Auth::user()->id;
    }

    /**
     * Handle the Book "updated" event.
     */
    public function updating(Book $book): void
    {
        //
    }

    /**
     * Handle the Book "deleted" event.
     */
    public function deleted(Book $book): void
    {
        //
    }

    /**
     * Handle the Book "restored" event.
     */
    public function restored(Book $book): void
    {
        //
    }

    /**
     * Handle the Book "force deleted" event.
     */
    public function forceDeleted(Book $book): void
    {
        //
    }
}
