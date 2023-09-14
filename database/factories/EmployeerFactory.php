<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Employeer>
 */
class EmployeerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companies = Company::pluck('id')->toArray();
        return [
            'first_name' => fake()->firstName($gender = 'male'|'female'),
            'last_name' => fake()->lastName(),
            'company_id' => fake()->randomElement($companies)
        ];
    }
}
