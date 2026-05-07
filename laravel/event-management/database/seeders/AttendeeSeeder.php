<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attendee;
use App\Models\Event;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Attendee::factory(10)->create();

        // for each event, i want to create 10 attendees with random users
        $events = Event::all();
        foreach ($events as $event) {
            Attendee::factory(20)->create([
                'event_id' => $event->id,
            ]);
        }
    }
}
