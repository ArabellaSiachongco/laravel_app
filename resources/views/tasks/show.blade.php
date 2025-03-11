@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $task->title }}</h1>
        <p class="text-gray-600 mb-4">{{ $task->description }}</p>

        <p class="text-sm {{ $task->is_completed ? 'text-green-600' : 'text-red-600' }}">
            Status: {{ $task->is_completed ? 'Completed' : 'Pending' }}
        </p>

        <div class="mt-4 flex space-x-4">
            <a href="{{ route('tasks.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                &larr; Back
            </a>
            <a href="{{ route('tasks.edit', $task) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Task
            </a>
        </div>
    </div>
@endsection
