<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use App\Http\DTOs\TaskDTO;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $projects = Project::all();
        $categories = Category::all();

        $query = Task::query();

        if ($request->filled('by_category')) {
            $query->where('category_id', $request->by_category);
        }

        if ($request->has('by_status')) {
            $query->where('status', $request->by_status);
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $taskDTO =  new TaskDTO($request->all());
        $task = Task::create($taskDTO->toArray());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $task = Task::findOrFail($id);
        $projects = Project::all();
        $categories = Category::all();

        return view('tasks.edit', compact('task', 'projects', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $task = Task::findOrFail($id);

        $task->status = !$task->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');
    }

    public function create()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('tasks.create', compact('projects', 'categories'));
    }
}
