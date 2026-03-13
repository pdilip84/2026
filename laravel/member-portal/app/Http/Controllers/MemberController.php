<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function show()
    {
        // $members = Member::all();
        /* Get all members that belong to the authenticated user and pass them to the view */
        // $members = Member::where('user_id', Auth::id())->get();
        $members = Auth::user()->member;
        return view('members.index', ['members' => $members]);
    }
}
