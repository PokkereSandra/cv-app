<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'level'=> 6,
            'university'=>'Turība',
            'study_direction'=>'sabiedriskās attiecības',
            'study_status'=> 3,
            'started_at'=>fake()->date,
            'finished_at'=>fake()->date,
        ];
    }
}
