<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {

        $filters = $request->only(['search', 'priorty', 'status']);
        return view('app', [
            'tasks' => Auth()
                ->user()
                ->tasks()
                ->filter($filters)
                ->orderByRaw("FIELD(priorty, 'high', 'medium', 'low')")
                ->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request) {
        $newTask = Auth()->user()->tasks()->create([...$request->validated()]);
        return redirect()->route('task.show', $newTask)->with('success', 'New task successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {
        Gate::authorize('view', $task);
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) {
        Gate::authorize('update', $task);

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task) {
        Gate::authorize('update', $task);

        $task = $task->update([...$request->validated()]);
        return redirect()->route('task.show', $task)->with('success', 'New task updated created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) {
        Gate::authorize('delete', $task);

        $task->delete();
        return redirect()->route('task.index')->with('success', 'New task deleted created!');
    }
}
