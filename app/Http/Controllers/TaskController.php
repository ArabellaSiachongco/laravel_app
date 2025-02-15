<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // GET /tasks (Show all tasks)
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // GET /tasks/create (Show the form to create a new task)
    public function create()
    {
        return view('tasks.create');
    }

    // POST /tasks (Store a new task)
    public function store(Request $request)
    {
        $task = Task::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // GET /tasks/{id} (Show a single task)
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // GET /tasks/{id}/edit (Show the edit form)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // PUT /tasks/{id} (Update a task)
    public function update(Request $request, Task $task)
    {
        $task->update($request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // DELETE /tasks/{id} (Delete a task)
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
