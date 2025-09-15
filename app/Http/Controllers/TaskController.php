<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all())
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function show(Task $task)
    {
        return response()->json($task)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function store(Request $request)
    {
        $request->validate([
            'strategy' => 'required|string',
            'task' => 'required|string',
            'owner' => 'required|string',
            'start' => 'required|date',
            'due' => 'required|date',
            'status' => 'required|in:Not Started,In Progress,Blocked,Done',
            'progress' => 'required|integer|min:0|max:100',
            'kpi' => 'required|string',
            'target' => 'required|string',
            'notes' => 'nullable|string',
            'cycle_id' => 'required|exists:cycles,id',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'strategy' => 'sometimes|required|string',
            'task' => 'sometimes|required|string',
            'owner' => 'sometimes|required|string',
            'start' => 'sometimes|required|date',
            'due' => 'sometimes|required|date',
            'status' => 'sometimes|required|in:Not Started,In Progress,Blocked,Done',
            'progress' => 'sometimes|required|integer|min:0|max:100',
            'kpi' => 'sometimes|required|string',
            'target' => 'sometimes|required|string',
            'notes' => 'nullable|string',
            'cycle_id' => 'sometimes|required|exists:cycles,id',
        ]);

        $task->update($request->all());
        return response()->json($task)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
