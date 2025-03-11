@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Task</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Title Input -->
            <div>
                <label class="block text-gray-700 font-medium">Title:</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Description Input -->
            <div>
                <label class="block text-gray-700 font-medium">Description:</label>
                <textarea name="description" rows="3"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">{{ old('description', $task->description) }}</textarea>
            </div>

            <!-- Completed Checkbox -->
            <div class="flex items-center">
                <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}
                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-300">
                <label class="ml-2 text-gray-700">Completed</label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-600 text-black px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Update Task
            </button>
        </form>

        <!-- Back to List -->
        <div class="mt-4">
            <a href="{{ route('tasks.index') }}"
                class="text-blue-600 hover:underline">
                &larr; Back to List
            </a>
        </div>
    </div>
@endsection
