<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $submissions = $project->submissions()->paginate(10);

        return view('submissions.index', compact('project', 'submissions'));
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
    public function store(Request $request, Project $project)
    {
        $data = $request->has('data') ? $request->all('data')['data'] : [];
        $submission = $project->submissions()->firstOrNew([
            'email' => $request->input('email')
        ]);
        $submission->data = json_encode($data);
        $submission->save();

        if ($project->redirect_after_submission) {
            return redirect($project->redirect_to_after_submission);
        } else {
            $version = $project->publishedVersion()->first();
            return view('project_versions.success', compact('project', 'version'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Submission $submission)
    {
        if (Auth::user()->id !== $project->user_id) {
            return abort(403);
        }

        $submission->delete();

        return redirect()->route('projects.submissions.index', $project);
    }
}
