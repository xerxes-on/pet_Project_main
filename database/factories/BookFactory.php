<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

class BookFactory extends Factory
{
    /**
     * @throws RandomException
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        return [
            'title' => $this->faker->realTextBetween(5, 35),
            'author_id' => Author::inRandomOrder()->first()->id,
            'number_of_pages' => $this->faker->numberBetween(60, 500),
            'published_date' => $this->faker->date(),
            'rating' => $this->faker->randomFloat(2, 0, 10),
            'created_at' => $this->faker->dateTimeBetween('-1 year', now()),
            'image' => $faker->imageUrl(400, 200, ['cats', 'dogs']),
            'description' => $this->faker->paragraph(9)
        ];
    }
}
