<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'date_of_birth'=>$this->faker-> date(),
            'about_author'=>$this->faker->realText(),
            'date_died'=>$this->faker->date(),
            'author_picture'=>$this->faker->shuffleString(),
        ];
    }
}
