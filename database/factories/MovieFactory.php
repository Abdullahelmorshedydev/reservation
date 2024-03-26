<?php

namespace Database\Factories;

use App\Enums\MovieTypeEnum;
use App\Enums\MovieStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(1),
            'slug' => str_replace(' ', '-', fake()->sentence(1)),
            'description' => fake()->paragraph(),
            'price' => 100.00,
            'type' => fake()->randomElement(MovieTypeEnum::cases()),
            'status' => fake()->randomElement(MovieStatusEnum::cases()),
        ];
    }
}
