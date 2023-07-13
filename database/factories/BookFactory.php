<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'writer' => $this->faker->name,
            'page_count' => $this->faker->numberBetween($min = 1, $max = 100),
            'date' => $this->faker->date($format = 'Y-m-d'), // Specify the desired date format
        ];
    }
}
