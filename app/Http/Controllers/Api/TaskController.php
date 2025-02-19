<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Http\DTOs\TaskDTO;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Task::query();

        if ($request->has('by_category')) {
            $query->where('category_id', $request->by_category);
        }

        if ($request->has('by_status')) {
            $query->where('status', $request->by_status);
        }
        return response()->json($query->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $taskDTO = new TaskDTO($request->all());
        $task = Task::create($taskDTO->toArray());

        return response()->json($task, 201);
    }

    public function update(Request $request, string $id)
    {
        //
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found!'], 404);
        }

        $taskDTO = new TaskDTO($request->all());
        $task->update($request->only(['status']));
        return response()->json($task, 200);
    }
}
