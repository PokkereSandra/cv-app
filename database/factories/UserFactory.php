<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->title(),
            'surname' => fake()->name(),
            'birth_data' => fake()->date(),
            'phone_number' => fake()->numberBetween(20000000, 29999999),
            'email' => fake()->unique()->safeEmail(),
        ];
    }

}
