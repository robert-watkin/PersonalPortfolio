<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return a view for the create form
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data. Github website, live_site website link are optional
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'technologies' => 'required',
            'github' => 'nullable|url',
            'live_site' => 'nullable|url'
        ]);

        // Create empty project model
        $project = new Project();

        // Set the project model properties
        $project->title = $request->title;
        $project->short_description = $request->short_description;
        $project->description = $request->description;
        $project->technologies = $request->technologies;
        $project->github = $request->github;
        $project->live_site = $request->live_site;

        // Save the project model
        $project->save();

        // Redirect to the project show page
        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        $project = Project::find($project->id);
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // load the project, check it exists and redirect if not
        $project = Project::find($project->id);
        if (!$project) {
            return redirect()->route('projects.index');
        }

        // return a view for the edit form
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // load the project, check it exists and redirect if not
        $project = Project::find($project->id);

        if (!$project) {
            return redirect()->route('projects.index');
        }

        // Validate the data. Github website, live_site website link are optional
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'technologies' => 'required',
            'github' => 'nullable|url',
            'live_site' => 'nullable|url'
        ]);

        // Set the project model properties
        $project->title = $request->title;
        $project->short_description = $request->short_description;
        $project->description = $request->description;
        $project->technologies = $request->technologies;
        $project->github = $request->github;
        $project->live_site = $request->live_site;

        // Save the project model
        $project->save();

        // Redirect to the project show page
        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
