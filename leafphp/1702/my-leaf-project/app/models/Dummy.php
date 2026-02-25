<?php

namespace App\Models;

class Dummy extends Model
{
    // The Dummy model is a simple representation of a database table defined in dummy.yml
    // It extends the base Model class provided by Leaf, which handles database interactions
    public static function __seeder()
    {
        // This method can be used to define custom seeding logic for the Dummy model
        // For example, you could use Faker to generate random data for testing
        return [
            'name' => fake()->name(),
            'identifier' => fake()->uuid(),
            'user_id' => fake()->numberBetween(1, 10), // Assuming you have User records with IDs 1-10  
            'verified_at' => fake()->optional()->dateTime(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
