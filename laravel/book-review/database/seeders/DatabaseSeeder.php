<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Review;
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

        // Book::factory(50)->create()->each(function ($book) {
        //     Review::factory(50)->for($book)->create();
        // });

        // Book::factory(50)->create()->each(function ($book) {
        //     Review::factory(30)->good()->for($book)->create();
        //     Review::factory(20)->bad()->for($book)->create();
        //     Review::factory(10)->average()->for($book)->create();
        // });

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = rand(5, 50);

            Review::factory()->count($numReviews)->good()->for($book)->create();
        });

        Book::factory(33)->create()->each(function ($book) {
            $numReviews = rand(5, 50);

            Review::factory()->count($numReviews)->bad()->for($book)->create();
        });

        Book::factory(34)->create()->each(function ($book) {
            $numReviews = rand(5, 50);

            Review::factory()->count($numReviews)->average()->for($book)->create();
        });
    }
}
