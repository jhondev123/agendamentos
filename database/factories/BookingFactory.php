<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = \App\Models\User::factory()->create();
        return [
            'user_id' => $user->id,
            'booking_status_id' => $this->faker->numberBetween(0, 4),
            'total_price' => $this->faker->randomFloat(2, 0, 1000),
            'duration' => $this->faker->numberBetween(15, 240),
            'notes' => $this->faker->text,
        ];
    }
}
