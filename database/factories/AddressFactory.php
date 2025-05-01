<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
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
            'city' => $this->faker->text($maxNbChars = 20),
            'country_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
