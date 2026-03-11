<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Member Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">{{ $member->name }}</h3>
                    <p class="mt-1 text-sm text-gray-500">Email: {{ $member->email }}</p>
                    <p class="mt-1 text-sm text-gray-500">Phone: {{ $member->phone }}</p>
                    <p class="mt-1 text-sm text-gray-500">Status: {{ $member->status }}</p>
                    <p class="mt-1 text-sm text-gray-500">Note: {{ $member->note }}</p>
                    <p class="mt-1 text-sm text-gray-500">Created At: {{ $member->created_at->format('Y-m-d H:i') }}</p>
                    <p class="mt-1 text-sm text-gray-500">Updated At: {{ $member->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('members.edit', $member->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('members.index') }}" class="text-indigo-600 hover:text-indigo-900">Back to Members List</a>
                </div>
            </div>
        </div>
</x-app-layout>
