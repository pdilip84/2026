@extends('layouts.app-layout', [
    'title' => 'Create a new Member ',
    'breadcrumbs' => [
        [
            'title' => 'Add Member ',
            'href' => '/members/add/{{ $member->id }}',
        ]
    ]
])
@section('content')
    <div class="py-4 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg bg-black">
            <div class="p-6 text-gray-100">Create a new Member </div>
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
                <form method="POST" action="/members">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection