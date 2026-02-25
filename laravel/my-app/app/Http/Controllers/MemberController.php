<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function index()
    {
        $members = Member::all();

        return view('members.index', compact('members'));
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
