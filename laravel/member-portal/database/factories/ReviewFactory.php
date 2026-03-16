<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            /* create book_id, between 1 and 10 */
            'book_id' => $this->faker->numberBetween(1, 10),
            'reviewer_name' => $this->faker->name,
            'review_text' => $this->faker->paragraph,
        ];
    }
    public function good()
    {
        return $this->state(function (array $attributes) {
            return [
                'reviewer_name' => $this->faker->name,
                'review_text' => 'This book was fantastic! Highly recommended.',
            ];
        });
    }
    public function bad()
    {
        return $this->state(function (array $attributes) {
            return [
                'reviewer_name' => $this->faker->name,
                'review_text' => 'This book was terrible. Do not waste your time.',
            ];
        });
    }
    public function average()
    {
        return $this->state(function (array $attributes) {
            return [
                'reviewer_name' => $this->faker->name,
                'review_text' => 'This book was okay. Not great, but not bad either.',
            ];
        });
    }
}
