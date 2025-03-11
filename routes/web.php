<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Models\Task;
use App\Http\Controllers\TaskController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class, 'index']);


Route::get('/greet', [GreetController::class, 'index']);

Route::get('/test-tasks', function () {
    return Task::all();
});

Route::resource('tasks', TaskController::class);

Route::get('/add-test-task', function () {
    $task = Task::create([
        'title' => 'Test Task',
        'description' => 'This task was added via a route.',
        'is_completed' => false
    ]);

    return "Task Created: " . $task->id;
});