<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{

    public function definition(): array
    {
        return [
            'author_id' =>$this->faker->numberBetween(1,100),
            'quote'=>$this->faker->realText(),
        ];
    }
}
