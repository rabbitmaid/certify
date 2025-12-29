<?php

namespace Database\Factories;

use App\Services\MatriculeService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intern>
 */
class InternFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricule' => MatriculeService::generate(),
            'phone_number' => fake()->phoneNumber(),
            'school' => fake()->company(),
            'diploma' => fake()->randomElement(['HND', 'Degree', 'Masters', 'PhD']),
            'department' => fake()->randomElement(['Software Engineering', 'Computer Networking', 'Database Administrator', 'System Administration']),
            'duration' => fake()->randomElement([1, 2, 3, 4]),
            'start_date' => fake()->dateTimeThisYear(),
            'end_date' => fake()->dateTimeThisYear()
        ];
    }
}
