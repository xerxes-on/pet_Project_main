<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'password'=>$this->faker->password(),
            'profile_picture'=>$this->faker->shuffleString('Iamoputtingpicture'),
            'date_of_birth'=>$this->faker->date(),
            'username'=>$this->faker->userName(),
            'gender'=>$this->faker->numberBetween(0,2),



        ];
    }
}
