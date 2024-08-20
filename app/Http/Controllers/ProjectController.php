<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectVersion;
use App\Services\CopyWriters\CopyWriterPersona;
use App\Services\ProjectVersionSuggestionService;
use Database\Factories\ProjectVersionFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $project = new Project();
        $project->user_id = Auth::id();

        return view('projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request, ProjectVersionSuggestionService $projectVersionSuggestionService)
    {
        $project = new Project($request->validated());
        $project->user_id = Auth::id();
        $project->saveOrFail();

        if ($request->input('copy_writer_instructions')) {
            $project->versions()->delete();

            $version = $projectVersionSuggestionService->suggestVersion($request->input('copy_writer_instructions'), CopyWriterPersona::getPersona('max'));
            $version->project()->associate($project);
            $version->prompt = $request->input('copy_writer_instructions');
            $version->persona = 'max';
            $version->name = 'v' . ($project->versions()->count() + 1);
            $version->save();
        }

        return redirect()->route('projects.versions.edit', [$project, $project->versions()->first()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $version = $project->publishedVersion()->firstOrFail();

        return view('project_versions.show', compact('project', 'version'));
    }

    public function find(Request $request)
    {
        $domain = $request->input('domain');
        if ($domain) {
            $project = Project::where('custom_domain', $domain)->firstOrFail();
            return redirect()->route('project.page', $project);
        }

        return redirect()->route('root');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->updateOrFail($request->validated());
        $request->session()->flash('success', 'Project updated successfully!');

        if ($request->ajax()) {
            return response()->json($project);
        } else {
            return redirect()->route('projects.edit', $project);
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
