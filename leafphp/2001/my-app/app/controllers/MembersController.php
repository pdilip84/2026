<?php

namespace App\Controllers;

use App\Models\Member;

class MembersController extends Controller
{
    public function index()
    {
        response()->render('member');
    }
    public function show()
    {
        $members = Member::all();
        response()->json($members);
    }
    public function display()
    {
        $members = Member::all();
        response()->render('pages/members', ['members' => $members]);
    }
    public function displayOne($id)
    {
        $member = Member::find($id);
        $member = collect([$member]);   // Wrap in collection for view compatibility
        response()->render('pages/members', ['members' => $member]);
    }
    public function delete($id)
    {
        $member = Member::find($id);
        if ($member) {
            $member->delete();
            // response()->json(['message' => 'Member deleted successfully.']);
            response()
            ->withFlash('success', 'Member deleted successfully.')
            ->redirect('/members');
        } else {
            // response()->json(['message' => 'Member not found.'], 404);
            response()
            ->withFlash('error', 'Member not found.')
            ->redirect('/members');
        }
    }
    public function edit($id)
    {
        $member = Member::find($id);
        response()->render('pages/members-edit', ['member' => $member]);
    }
    public function update($id)
    {
        $member = Member::find($id);
        if ($member) {
            $member->name = request()->get('name');
            $member->save();
            response()
             ->withFlash('success', 'Member updated successfully.')
             ->redirect('/members');
        } else {
            response()
            ->withFlash('error', 'Member not found.')
            ->redirect('/members');
        }
    }
    public function store()
    {
        $name = request()->get('name');
        $member = new Member();
        $member->name = $name;
        $member->save();
        response()
            ->withFlash('success', 'Member created successfully.')
            ->redirect('/members');
    }
}
