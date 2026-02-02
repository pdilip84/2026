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
            <div class="p-6 text-gray-100">List of Members</div>
        </div>
    </div>
    @if(request()->flash('success'))
        <div class="py-2 px-4">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-green-100">
                <div class="p-6 text-gray-900">
                    {{ request()->flash('success') }} 
                </div>
            </div>
        </div>
    @endif  
    <div class="py-2 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white">
            <div class="p-6 text-gray-900">
                <p class="button mt-2 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    <a href="/members/add">Add New Member</a>
                </p>
            </div>
        </div>
    </div>  
    @foreach($members as $member)
        <div class="py-2 px-4">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">{{ $member->name }}</h3>
                    <p class="text-gray-600">Id: {{ $member->id }}</p>
                    <p class="text-gray-600">Joined on: {{ date('F j, Y', strtotime($member->created_at)) }} <p>                    
                    <p class="button mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        <a href="/members/show/{{ $member->id }}">View Profile</a>
                    </p>
                    <form method="POST" action="/members/{{ $member->id }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button mt-2 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this member?');">
                            Delete Profile
                        </button>
                    <p class="button mt-2 inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        <a href="/members/edit/{{ $member->id }}">Edit Profile</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
