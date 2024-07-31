<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectVersionRequest;
use App\Http\Requests\UpdateProjectVersionRequest;
use App\Models\Project;
use App\Models\ProjectVersion;

class ProjectVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectVersionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, ProjectVersion $version)
    {
        return view('project_versions.show', compact('project', 'version'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectVersion $projectVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectVersionRequest $request, Project $project, ProjectVersion $version)
    {
        if ($version->published) {
            return response()->json(['message' => 'Cannot update published version'], 403);
        }

        $version->update($request->validated());

        return response()->json($version);
    }

    public function publish(Project $project, ProjectVersion $version)
    {
        $version->publish();

        return redirect()->route('projects.edit', [$project]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectVersion $projectVersion)
    {
        //
    }
}
