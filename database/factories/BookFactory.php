<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'=>$this->faker->realTextBetween(5, 35),
            'author_id'=>$this->faker->numberBetween(1,100),
            'number_of_pages'=>$this->faker->numberBetween(60,500),
            'published_date'=>$this->faker->date(),
            'rating'=>$this->faker->randomFloat(2, 0, 10),
            'created_at'=>$this->faker->dateTimeBetween('-1 year', now()),
            'images' => 'default-image.png'

        ];
    }
}
