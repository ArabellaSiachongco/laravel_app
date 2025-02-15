@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title', $task->title) }}" required>

    <label>Description:</label>
    <textarea name="description">{{ old('description', $task->description) }}</textarea>

    <label>Completed:</label>
    <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>

    <button type="submit">Update Task</button>
</form>

<a href="{{ route('tasks.index') }}">Back to List</a>
@endsection
