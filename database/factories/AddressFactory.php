<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country'=>'Latvija',
            'region'=>'Rīgas novads',
            'city'=>'Rīga',
            'street'=>'Brīvības',
            'street_number'=>fake()->numberBetween(1,300),
            'flat_number'=>fake()->numberBetween(1,60),
            'postcode'=>'LV-' . fake()->numberBetween(1000,5000),
        ];
    }
}
