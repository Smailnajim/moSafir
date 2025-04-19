<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'adress_id' => $this->faker->numberBetween(1, 2),
            'title' => $this->faker->text(($maxNbChars = 10)),
            'description' => $this->faker->text($maxNbChars = 100),
            'stars' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(500, 1000),
        ];
    }
}
