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
            ->orderBy('completed_at', 'ASC')
            ->latest()
            ->paginate(10);

        return view('pages.todo', ['tasks' => $tasks]);
    }

    public function trash()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->onlyTrashed()
            ->orderBy('completed_at', 'ASC')
            ->latest()
            ->paginate(10);

        return view('pages.trash', ['tasks' => $tasks]);
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

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return back();
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->restore();
        return back();
    }

    public function delete($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->forceDelete();
        return back();
    }

    public function complete(Task $task): RedirectResponse
    {
        $task->toggleComplete();
        $task->save();
        return back();
    }


}
