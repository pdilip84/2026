<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_update_route_exists_at_custom_update_path(): void
    {
        $user = User::factory()->create();
        $school = School::factory()->create();
        $student = Student::factory()->create([
            'school_id' => $school->id,
        ]);

        $response = $this->actingAs($user, 'sanctum')
            ->putJson('/api/students/update/' . $student->id, [
                'name' => 'Updated Name',
                'grade' => 'A',
                'school_id' => $school->id,
            ]);

        $response->assertStatus(200)
            ->assertJsonPath('data.name', 'Updated Name')
            ->assertJsonPath('data.grade', 'A');
    }
}
