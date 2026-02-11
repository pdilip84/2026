@extends('layouts.app-layout', [
    'title' => 'Members',
    'breadcrumbs' => [
        [
            'title' => 'Members',
            'href' => '/members/show/' . $member->id,
        ]
    ]
])

@section('content')
    <div class="py-4 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg bg-black">
            <div class="p-6 text-gray-100">Member Details for {{ $member->name }}</div>
        </div>
    </div>
    <table class="table-auto w-full text-left">
       <tbody></tbody>
            <tr>
                <td class="border px-4 py-2">ID:</td>
                <td class="border px-4 py-2">{{ $member->id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Name:</td>
                <td class="border px-4 py-2">{{ $member->name }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Email:</td>
                <td class="border px-4 py-2">{{ $member->email }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Phone:</td>
                <td class="border px-4 py-2">{{ $member->phone }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Status:</td>
                <td class="border px-4 py-2">{{ $member->status }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Notes:</td>
                <td class="border px-4 py-2">{{ $member->notes }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">identifier:</td>
                <td class="border px-4 py-2">{{ $member->identifier }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Created:</td>
                <td class="border px-4 py-2">{{ $member->created_at }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Updated:</td>
                <td class="border px-4 py-2">{{ $member->updated_at }}</td>
            </tr>
        </tbody>
    </table>
    <button>
        <a href="/members" class="text-blue-500 hover:underline">Back to Members List</a>
    </button>
@endsection
