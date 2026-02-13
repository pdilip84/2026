@extends('layouts.app-layout', [
'title' => 'Members',
'breadcrumbs' => [
[
'title' => 'Members',
'href' => '/members',
]
]
])

@section('content')
<div class="py-4 px-4">
    <div class="overflow-hidden shadow-sm sm:rounded-lg bg-black">
        <div class="p-6 text-gray-100">List of all members</div>
    </div>
</div>
@if (isset($error))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ $error }}</span>
</div>
@endif
@if (isset($success))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $success }}</span>
</div>
@endif
<button class="mb-4">
    <a href="/members/create" class="text-blue-500 hover:underline">Create New Member</a>
</button>
<table class="table-auto w-full text-left">
    <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">By</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
            <td class="border px-4 py-2">{{ $member->id }}</td>
            <td class="border px-4 py-2">{{ $member->name }}</td>
            <td class="border px-4 py-2">{{ $member->email }}</td>
            <td class="border px-4 py-2">{{ $member->phone }}</td>
            <td class="border px-4 py-2">{{ $member->user_id }}</td>
            <td class="border px-4 py-2">
                <a href="/members/show/{{ $member->id }}" class="text-blue-500 hover:underline">View</a>
            </td>
            <td class="border px-4 py-2">
                <form action="/members/delete/{{ $member->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </td>
            <td class="border px-4 py-2">
                <a href="/members/edit/{{ $member->id }}" class="text-yellow-500 hover:underline">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<button class="mt-4">
    <a href="/members/deleted" class="text-blue-500 hover:underline">Deleted Members List</a>
</button>
@endsection