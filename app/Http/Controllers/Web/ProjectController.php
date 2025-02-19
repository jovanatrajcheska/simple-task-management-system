<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Project;
use App\Http\DTOs\ProjectDTO;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Project::query();

        if ($request->has('overdue')) {
            $query->where('due_date', ($request->overdue == 'true') ? '<' : '>', Carbon::now());
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('due_date', [$request->start_date, $request->end_date]);
        }

        $projects = $query->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $projectDTO = new ProjectDTO($request->all());
        $project = Project::create($projectDTO->toArray());
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function create()
    {
        return view('projects.create');
    }
}
