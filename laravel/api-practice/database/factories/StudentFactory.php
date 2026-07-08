<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'grade' => fake()->randomElement(['A', 'B', 'C']),
            // look for a random school id from the schools table
            'school_id' => School::inRandomOrder()->first()->id,
        ];
    }
}
