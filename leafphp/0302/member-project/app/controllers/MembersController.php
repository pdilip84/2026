<?php

namespace App\Controllers;

use App\Models\Member;
use Illuminate\Support\Collection;

class MembersController extends Controller
{
    public function index() {}
    public function showall()
    {
        $members = Member::all();
        response()->render('pages/members/index', ['members' => $members]);
    }
    public function show($id)
    {
        $member = Member::find($id);

        // var_dump($member);
        response()->render('pages/members/show', ['member' => $member]);
    }
    public function showDeleted()
    {
        $members = Member::onlyTrashed()->get();
        response()->render('pages/members/deleted', ['members' => $members]);
    }
    public function restore($id)
    {
        $member = Member::onlyTrashed()->find($id);
        if ($member) {
            $member->restore();
            response()->render('pages/members/deleted', ['success' => 'Member restored successfully!', 'members' => Member::onlyTrashed()->get()]);
        } else {
            response()->render('pages/members/deleted', ['error' => 'Member not found.', 'members' => Member::onlyTrashed()->get()]);
        }
    }
    public function forceDelete($id)
    {
        $member = Member::onlyTrashed()->find($id);
        if ($member) {
            $member->forceDelete();
            response()->render('pages/members/deleted', ['success' => 'Member permanently deleted successfully!', 'members' => Member::onlyTrashed()->get()]);
        } else {
            response()->render('pages/members/deleted', ['error' => 'Member not found.', 'members' => Member::onlyTrashed()->get()]);
        }
    }
    public function create()
    {
        response()->render('pages/members/create');
    }
    public function store()
    {
        $validateData = request()->validate([
            'name' => 'string|max:25',
            'email' => 'email|max:50',
            'phone' => 'phone|min:10|max:15',
            'notes' => 'text|optional|max:255',
        ]);

        if (!$validateData) {
            $errors = request()->errors();
            response()->render('pages/members/create', ['error' => $errors]);
            return;
        } else {
            // Validation passed, you can proceed with storing the member
            // You can access the validated data using $validateData['field_name']

            $name = $validateData['name'];
            $email = $validateData['email'];
            $phone = $validateData['phone'];
            $status = request()->get('status');
            $notes = $validateData['notes'] ?? null; // Use null if notes is not provided
            $identifier = fake()->uuid();

            // var_dump($name, $email, $phone, $status, $notes, $identifier);
            // die();

            $member = new Member();
            $member->name = $name;
            $member->email = $email;
            $member->phone = $phone;
            $member->status = $status;
            $member->notes = $notes;
            $member->identifier = $identifier;

            try {
                $member->save();
                response()->render('pages/members/index', ['success' => 'Member created successfully!', 'members' => Member::all()]);
            } catch (\Exception $e) {
                // Handle the exception (e.g., log it, show an error message, etc.)
                if ($e->getCode() === '23000') { // Duplicate entry error code for MySQL
                    response()->render('pages/members/create', ['error' => 'A member with this email or phone is already exists.']);
                } else {
                    response()->render('pages/members/create', ['error' => 'Failed to save member: ' . $e->getMessage()]);
                    return;
                }
            }
        }
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        if ($member) {
            $member->delete();
            response()->render('pages/members/index', ['success' => 'Member deleted successfully!', 'members' => Member::all()]);
        } else {
            response()->render('pages/members/index', ['error' => 'Member not found.', 'members' => Member::all()]);
        }
    }
}
