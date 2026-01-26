<?php

namespace App\Controllers;
use App\Models\Member;

class MembersController extends Controller
{
    public function index()
    {
        response()->render('member');
    }
    public function show(){
        $members = Member::all();
        response()->json($members);
    }
    public function display(){
        $members = Member::all();
        response()->render('pages/members', ['members' => $members]);
    }
    public function displayOne($id){
        $member = Member::find($id);
        $member = collect([$member]);   // Wrap in collection for view compatibility
        response()->render('pages/members', ['members' => $member]);
    }
    public function delete($id){
        $member = Member::find($id);
        if($member){
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
}
