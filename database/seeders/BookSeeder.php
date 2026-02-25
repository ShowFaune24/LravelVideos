<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Book::create([
            "title" => "The Lord Of The Rings - The Fellowship of the Ring",
            "price" => 19.99,
            "year" => 1954,
            "limited" => false,
            "author" => "J.R.R.Tolkien",
            "type_id" => 1
        ]);

        Book::factory(10)->create();

        Book::factory(5)->create([
            "limited" => true
        ]);
        
        Book::insert([
            [
                "title" => "The Lord Of The Rings - The Two Towers",
                "price" => 19.99,
                "year" => 1954,
                "limited" => false,
                "author" => "J.R.R.Tolkien",
                "created_at" => now(),
                "updated_at" => now(),
                "type_id" => 1
            ],
            [
                "title" => "The Lord Of The Rings - The Return of the King",
                "price" => 19.99,
                "year" => 1955,
                "limited" => false,
                "author" => "J.R.R.Tolkien",
                "created_at" => now(),
                "updated_at" => now(),
                "type_id" => 1
            ],
        ]);

        DB::table("books")->insert([
            [
                "title" => "Harry Potter and the Philosopher's Stone",
                "price" => 13.99,
                "year" => 1997,
                "limited" => false,
                "author" => "J.K.Rowling",
                "created_at" => now(),
                "updated_at" => now(),
                "type_id" => 1
            ]
        ]);
    }
}
