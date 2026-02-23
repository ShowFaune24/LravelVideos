<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("book_user")->insert([
            [
                "book_id" => 1,
                "user_id" => 1
            ],
            [
                "book_id" => 2,
                "user_id" => 1
            ],
            [
                "book_id" => 3,
                "user_id" => 1
            ],
            [
                "book_id" => 4,
                "user_id" => 1
            ],
            [
                "book_id" => 2,
                "user_id" => 2
            ],
            [
                "book_id" => 2,
                "user_id" => 7
            ],
            
        ]);
    }
}
