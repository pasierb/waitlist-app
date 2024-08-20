<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectVersionRequest;
use App\Http\Requests\UpdateProjectVersionRequest;
use App\Models\Project;
use App\Models\ProjectVersion;
use App\Services\CopyWriters\CopyWriterPersona;
use App\Services\ProjectVersionSuggestionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Pennant\Feature;

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
    public function store(StoreProjectVersionRequest $request, Project $project, ProjectVersionSuggestionService $projectVersionSuggestionService)
    {
        if (Feature::inactive('ai-assistant')) {
            return response()->isForbidden();
        }


        $sourceVersion = $project->versions()->where('id', $request->input('source_version_id'))->first();
        if (!Auth::user()->isGod() && Auth::user()->hasExhausedAiCredits()) {
            return response()->redirectTo(route('projects.versions.edit', [$project, $sourceVersion]))
                ->with('error', 'You have exhausted your AI credits for this month');
        }

        $personaKey = $request->input('persona');

        $persona = CopyWriterPersona::getPersona($personaKey);
        $version = $projectVersionSuggestionService->suggestVersion($request->input('description'), $persona);
        $version->project()->associate($project);
        $version->prompt = $request->input('description');
        $version->persona = $personaKey;

        if ($sourceVersion) {
            $version->success_editor_data = $sourceVersion->success_editor_data;
        }

        $version->save();

        return response()->redirectTo(route('projects.versions.edit', [$project, $version]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, ProjectVersion $version)
    {
        return view('project_versions.show', compact('project', 'version'));
    }

    public function preview(Project $project, ProjectVersion $version)
    {
        return view('project_versions.show', compact('project', 'version'));
    }

    public function successPreview(Project $project, ProjectVersion $version)
    {
        return view('project_versions.success', compact('project', 'version'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, ProjectVersion $version)
    {
        return view('project_versions.edit', compact('project', 'version'));
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

    public function publish(Project $project, ProjectVersion $version, Request $request)
    {
        $version->publish();
        $newDraftVersion = $project->versions()->latest()->first();

        $request->session()->flash('success', 'Version ' . $version->name . ' published successfully');
        return redirect()->route('projects.versions.edit', [$project, $newDraftVersion]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectVersion $projectVersion)
    {
        //
    }
}
