@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Tasks</h1>

        <!-- Create New Task Button -->
        <div class="mb-4">
            <a href="{{ route('tasks.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Create New Task
            </a>
        </div>

        <!-- Tasks List -->
        @foreach ($tasks as $task)
            <div class="p-4 mb-4 bg-gray-100 border border-gray-300 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-700">{{ $task->title }}</h2>
                <p class="text-gray-600">{{ $task->description }}</p>
                <p class="text-sm {{ $task->is_completed ? 'text-green-600' : 'text-red-600' }}">
                    Status: {{ $task->is_completed ? 'Completed' : 'Pending' }}
                </p>

                <div class="mt-2 flex space-x-3">
                    <a href="{{ route('tasks.show', $task) }}"
                        class="text-blue-600 hover:underline">
                        View
                    </a>
                    <a href="{{ route('tasks.edit', $task) }}"
                        class="text-yellow-600 hover:underline">
                        Edit
                    </a>

                    <!-- Delete Form -->
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                        class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
