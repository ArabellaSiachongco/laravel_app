@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->is_completed ? 'Completed' : 'Pending' }}</p>
    <a href="{{ route('tasks.index') }}">Back</a>
    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
@endsection
