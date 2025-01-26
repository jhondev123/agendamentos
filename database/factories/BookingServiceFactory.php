<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingService>
 */
class BookingServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $booking = \App\Models\Booking::factory()->create();
        $service = \App\Models\Service::factory()->create();
        return [
            'booking_id' => $booking->id,
            'service_id' => $service->id,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'duration' => $this->faker->numberBetween(15, 240),

        ];
    }
}
