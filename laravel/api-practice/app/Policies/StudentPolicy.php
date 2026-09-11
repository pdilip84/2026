<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;

class StudentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Student $student)
    {
        // Check if the user is authorized to update the student
        return $user->id === $student->id; // Assuming there's a user_id field in the students table

    }
}
