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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        return [
            'name'=>$this->faker->name(),
            'date_of_birth'=>$this->faker-> date(),
            'about_author'=>$this->faker->realText(),
            'date_died'=>$this->faker->date(),
            'author_picture' => $faker->imageUrl(400, 400, ['cats','dogs']),
        ];
    }
}
