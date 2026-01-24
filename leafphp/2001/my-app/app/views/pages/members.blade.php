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
    @foreach($members as $member)
        <div class="py-2 px-4">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">{{ $member->name }}</h3>  
                    <p class="text-gray-600">Joined on: {{ date('F j, Y', strtotime($member->created_at)) }}</p>                              
                </div>
            </div>
        </div>
    @endforeach
@endsection
