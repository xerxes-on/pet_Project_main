<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title'=>$this->faker->realTextBetween(5, 35),
            'author_id'=>$this->faker->numberBetween(1,100),
            'number_of_pages'=>$this->faker->numberBetween(60,500),
            'published_date'=>$this->faker->date(),
            'rating'=>$this->faker->randomFloat(2, 0, 10),
        ];
    }
}
