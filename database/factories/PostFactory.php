<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text($maxNbChars = 20),
            'image' => 'https://kinsta.com/wp-content/uploads/2021/11/about-us-page.png',
        ];
    }
}
