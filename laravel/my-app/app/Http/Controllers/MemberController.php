<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Ulid;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    //
    public function index()
    {
        $members = Member::paginate(10);

        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        /* Using route model binding to automatically inject the Member model instance based on the route parameter. This eliminates the need for manual retrieval of the member using findOrFail. */

        // $member = Member::findOrFail($uid);

        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        // $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function destroy(Member $member)
    {
        // $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(MemberRequest $request)
    {
        /* Move this logic of validation to a Form Request class (e.g., MemberRequest) for better organization and reusability. */

        // $request->validate([
        //     'name' => 'required|string|max:20',
        //     'email' => 'required|email|unique:members,email|max:50',
        //     'phone' => 'required|string|max:30|unique:members,phone',
        //     'status' => 'required|in:active,inactive',
        //     'note' => 'nullable|string',
        // ]);

        // Member::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'status' => $request->status,
        //     'note' => $request->note,
        //     'ulid' => (new Ulid())->toBase32(),
        // ]);

        Member::create($request->validated() + ['ulid' => (new Ulid())->toBase32()]);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function update(MemberRequest $request, Member $member)
    {
        /* Move this logic of validation to a Form Request class (e.g., MemberRequest) for better organization and reusability. */

        // $member = Member::findOrFail($id);

        // $request->validate([
        //     'name' => 'required|string|max:20',
        //     'email' => 'required|email|unique:members,email,' . $member->id . '|max:50',
        //     'phone' => 'required|string|max:30|unique:members,phone,' . $member->id,
        //     'status' => 'required|in:active,inactive',
        //     'note' => 'nullable|string',
        // ]);

        // $member->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'status' => $request->status,
        //     'note' => $request->note,
        // ]);

        // $member = Member::findOrFail($id);
        $member->update($request->validated());

        return redirect()->route('members.show', $member->id)->with('success', 'Member updated successfully.');
    }
}
