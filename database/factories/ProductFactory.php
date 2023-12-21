<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->colorName();
        $slug = Str::slug($title). fake()->randomNumber();
        return [
            'title' => $title,
            'slug' => $slug,
            'price' => fake()->numberBetween(20, 500),
            'description' => fake()->realText(),
            'quantity' => fake()->numberBetween(10, 50),
        ];
    }
}
