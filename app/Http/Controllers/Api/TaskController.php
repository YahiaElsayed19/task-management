<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {

        $filters = $request->only(['search', 'priorty', 'status']);
        return response()->json([
            'data' => Auth()
                ->user()
                ->tasks()
                ->filter($filters)
                ->orderByRaw("FIELD(priorty, 'high', 'medium', 'low')")
                ->paginate(20)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request) {
        $newTask = Auth()->user()->tasks()->create([...$request->validated()]);
        return response()->json(
            [
                'message' => 'task created successfully!',
                'task' => $newTask
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {
        Gate::authorize('view', $task);
        // $taskWithoutUser = $task->makeHidden('user');
        return response()->json(
            ['task' => $task->makeHidden('user')],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task) {
        Gate::authorize('update', $task);

        $task->update([...$request->validated()]);
        return response()->json(
            [
                'message' => 'task updated successfully!',
                'task' => $task->fresh()
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) {
        Gate::authorize('delete', $task);

        $task->delete();
        return response()->json(
            ['message' => 'task deelted successfully!'],
            200
        );
    }
}
