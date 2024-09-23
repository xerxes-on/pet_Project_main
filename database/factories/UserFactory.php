<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{

    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
//            'password' => $this->faker->password(),
            'profile_picture' => $faker->imageUrl(400, 400, ['cats', 'dogs']),
            'date_of_birth' => $this->faker->date(),
            'email_verified_at' => $this->faker->date(),
            'username' => $this->faker->userName(),
            'gender' => $this->faker->numberBetween(0, 2),
        ];
    }
}
