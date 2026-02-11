@extends('layouts.app-layout', [
    'title' => 'Members',
    'breadcrumbs' => [
        [
            'title' => 'Create',
            'href' => '/members/create',
        ]
    ]
])

@section('content')
    <div class="py-4 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg bg-black">
            <div class="p-6 text-gray-100">Create New Member</div>
        </div>
            @if (isset($error))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    @if (is_array($error))
                        <ul class="list-disc ml-6 mt-2">
                            @foreach ($error as $err)
                                <li class="text-sm">{{ $err }}</li>
                            @endforeach
                        </ul>
                    @else
                        <span class="block sm:inline">{{ $error }}</span>
                    @endif
                </div>
            @endif
            @if (isset($success))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    @if (is_array($success))
                        <ul class="list-disc ml-6 mt-2">
                            @foreach ($success as $msg)
                                <li class="text-sm">{{ $msg }}</li>
                            @endforeach
                        </ul>
                    @else
                        <span class="block sm:inline">{{ $success }}</span>
                    @endif
                </div>
            @endif
    </div>
    <div class="w-full max-w-lg px-4">
    <form action="/members/store" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:(Required)</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:(Required)</label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:(10-15 digits)</label>
            <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required minlength="10" maxlength="15">
        </div>
        <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <options>
                    <option value="pending" default>Pending</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="banned">Banned</option>
                </options>
            </select>
        </div>  
        <div class="mb-4">
                <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes:(Optional)</label>
                <textarea name="notes" id="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
                <label for="identifier" class="block text-gray-700 text-sm font-bold mb-2">Identifier:(Auto-generated)</label>
                <input type="text" readonly name="identifier" id="identifier" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Member</button>
        <button class="ml-2">
            <a href="/members" class="text-blue-500 hover:underline">Back to Members List</a>
        </button>   
    </form>
    </div>
@endsection
