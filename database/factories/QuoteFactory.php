<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{

    public function definition(): array
    {
        return [
            'author_id' => Author::inRandomOrder()->first()->id,
            'quote'=>$this->faker->realText(),
        ];
    }
}
