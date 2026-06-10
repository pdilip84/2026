<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // pick random user id from users table or create one if none exist
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            // pick random event id from events table or create one if none exist
            'event_id' => \App\Models\Event::inRandomOrder()->first()->id ?? \App\Models\Event::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
