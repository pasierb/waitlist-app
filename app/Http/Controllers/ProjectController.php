<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectVersion;
use Illuminate\Http\Request;
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

        $project->save();

        return redirect()->route('projects.edit', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $version = $project->publishedVersion()->firstOrFail();

        return view('project_versions.show', compact('project', 'version'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Project $project)
    {
        $versionId = $request->input('version_id', null);
        if ($versionId) {
            $version = $project->versions()->where(['id' => $versionId])->firstOrFail();
        } else {
            $version = $project->maybeCreateDraftVersion();
        }
        $versions = $project->versions()->get();

        return view('projects.edit', compact('project', 'version', 'versions'));
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
