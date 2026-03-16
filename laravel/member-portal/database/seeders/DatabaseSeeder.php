<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(3)->create();

        \App\Models\Member::factory(10)->create();

        \App\Models\Book::factory(10)->create();

        \App\Models\Review::factory(20)->good()->create();
        \App\Models\Review::factory(20)->bad()->create();
        \App\Models\Review::factory(20)->average()->create();
    }
}
