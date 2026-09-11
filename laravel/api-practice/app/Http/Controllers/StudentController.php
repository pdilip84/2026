<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;


// to use policy in the controller, you need to import the AuthorizesRequests trait and use it in your controller class. This trait provides the authorize method that allows you to check if the authenticated user is authorized to perform a given action on a model.


class StudentController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return StudentResource::collection(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // use policy to authorize the user to update the student record
        $this->authorize('update', $student);

        // suggest me the steps to update the student record in the database using the request data
        // 1. Validate the incoming request data to ensure it meets the required criteria.
        // 2. Retrieve the student record from the database using the provided student ID.
        // 3. Update the student record with the validated data from the request.
        // 4. Save the updated student record back to the database.
        $student = Student::findOrFail($student->id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
        ]);
        $student->update($validatedData);
        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
