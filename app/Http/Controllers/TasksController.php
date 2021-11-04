<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('status', 'ASC')
            ->get();

        return view('pages.todo', ['tasks'=> $tasks]);


        //return view('pages.todo', ['tasks' => auth()->user()->tasks()->get()]);
        //return view('pages.todo', ['tasks' => Task::all()]);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $task = (new Task([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'status' => 'created'
        ]));
        $task->user()->associate(auth()->user());
        $task->save();
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
            'content' => $request->get('content')
        ]);
        return redirect()->route('tasks.edit', $task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }

    public function complete(Task $task): RedirectResponse
    {
        $task->toggleComplete();
        $task->save();
        return redirect()->back();
    }
}
