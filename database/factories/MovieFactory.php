<?php

namespace Database\Factories;

use App\Enums\MovieTypeEnum;
use App\Enums\MovieStatusEnum;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    use TranslateTrait;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => TranslateTrait::translate(fake()->sentence(1), fake()->sentence(1)),
            'slug' => TranslateTrait::translate(fake()->sentence(1), fake()->sentence(1), true),
            'description' => TranslateTrait::translate(fake()->paragraph(), fake()->paragraph()),
            'price' => 100.00,
            'type' => fake()->randomElement(MovieTypeEnum::cases()),
            'status' => fake()->randomElement(MovieStatusEnum::cases()),
        ];
    }
}
