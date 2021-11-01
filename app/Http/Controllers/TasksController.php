<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        return view('pages.todo', ['tasks' => Task::all()]);
    }


    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        (new Task([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            ]))->save();
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('pages.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            ]);
        return redirect()->route('tasks.edit', $task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
