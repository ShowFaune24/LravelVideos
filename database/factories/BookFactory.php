<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->words(3, true),
            "price" => fake()->randomFloat(2, 5, 9999),
            "year" => fake()->year(),
            "limited" => fake()->boolean(30),
            "author" => fake()->name()
        ];
    }
}
