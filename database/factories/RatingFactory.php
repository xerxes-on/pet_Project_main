<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id' =>  $this->faker->numberBetween(1,50),
            'book_id' => $this->faker->numberBetween(1,250),
            'rating' =>  $this->faker->numberBetween(1,10),
            'comment' =>  $this->faker->realText(),

        ];
    }
}
