<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(10000, 100000),
            'due_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'description' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
        ];
    }
}
