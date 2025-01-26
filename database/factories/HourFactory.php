<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hour>
 */
class HourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hour' => $this->faker->time(),
            'date' => $this->faker->date(),
            'available' => $this->faker->boolean,
            'day' => $this->faker->word,

        ];
    }
}
