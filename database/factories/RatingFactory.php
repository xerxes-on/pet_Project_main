<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id' =>  $this->faker->numberBetween(62, 100),
            'book_id' => $this->faker->numberBetween(1,200),
            'rating' =>  $this->faker->numberBetween(1,10),
            'comment' =>  $this->faker->realText(),
            'created_at' => $this->faker->dateTimeBetween('-1 month',now())
        ];
    }
}
