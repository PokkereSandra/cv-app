<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'position'=>'personāldaļas speciālists',
            'company'=>fake()->company,
            'workload' => 3,
            'description' => 'darīju visādus darbus',
            'started_at'=> fake()->date(),
        ];
    }
}
