@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Title Input -->
            <div>
                <label class="block text-gray-700 font-medium">Title:</label>
                <input type="text" name="title" required 
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Description Input -->
            <div>
                <label class="block text-gray-700 font-medium">Description:</label>
                <textarea name="description" rows="3"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Save Task
            </button>
        </form>
    </div>
@endsection
