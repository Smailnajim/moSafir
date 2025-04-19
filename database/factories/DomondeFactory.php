<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DomondeFactory extends Factory
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
            'ofer_id' => $this->faker->numberBetween(1, 3),
            'numberOfPersensons' => $this->faker->numberBetween(1, 5),
            'numberOfDays' => $this->faker->numberBetween(10, 30),
            'description' => $this->faker->text($maxNbChars = 100),
            'stars' => $this->faker->numberBetween(1, 5),
        ];
    }
}
