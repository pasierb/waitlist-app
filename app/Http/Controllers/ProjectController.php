<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user()->projects()->paginate(10);

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project($request->validated());
        $project->user_id = Auth::id();
        $project->color_theme = 'lofi';
        $project->block_editor_data = json_encode(['blocks' => [
            ['type' => 'header', 'data' => ['text' => $project->name, 'level' => 1]],
            ['type' => 'paragraph', 'data' => ['text' => 'This is a new project.']],
            ['type' => 'email-input', 'data' => ['button' => 'Sign up!', 'placeholder' => 'Enter your email']],
        ]]);

        $project->save();

        return redirect()->route('projects.edit', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        if ($request->ajax()) {
            return response()->json($project);
        } else {
            return redirect()->route('projects.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->deleteOrFail();

        return redirect()->route('projects.index');
    }
}
