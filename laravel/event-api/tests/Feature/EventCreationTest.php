<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_creating_an_event_adds_the_organizer_as_a_member(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/events', [
            'name' => 'Laravel Meetup',
            'start_time' => '2026-07-10 10:00:00',
            'end_time' => '2026-07-10 12:00:00',
            'description' => 'A test event',
        ]);

        $response->assertOk();

        $event = Event::latest('id')->first();

        $this->assertNotNull($event);
        $this->assertDatabaseHas('members', [
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
