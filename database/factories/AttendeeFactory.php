<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendee>
 */
class AttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'eventday_id' => rand(1, 10),
            'movie_id' => rand(1, 10),
            'showtime_id' => rand(1, 3),
        ];
    }
}
