<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\tr_TR\Person;

class BookFactory extends Factory
{
    protected $model = Book::class;

    
    public function definition()
    {
        $bookNames = [
            'Şeker Portakalı',
            'Sefiller',
            'Daltonlar',
            'Şahmeran',
            'Robin Hood',
            'Ejderha',
            'İngilizce Burda',
            'Sergüzeşt',
            'Sherlock Holmes',
            'Parsons',
            'Kolombiya',
            'Da vinci Şifresi',
            'Perili Köşk',
            'Hayvan Çiftliği',
            'Dönüşüm',
            'Küçük Prens',
            'Fareler ve İnsanlar',

        

        ];
       

        $date = $this->faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d');

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->unique()->randomElement($bookNames),
            'writer' => $this->faker->name,
            'page_count' => $this->faker->numberBetween($min = 100, $max = 1000),
            'date' => $date,
        ];
    }
}
