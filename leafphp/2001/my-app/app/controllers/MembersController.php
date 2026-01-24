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
}
