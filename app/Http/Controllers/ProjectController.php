<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index() {

        $projects = Project::all();

        return view('worker.projects.index', compact('projects'));
    }

    public function create() {

        $users = User::where('role', 0)->get();

        return view('worker.projects.create', compact('users'));
    }

    public function store() {

        $validated = request()->validate([
            'name' => 'required|min:3',
            'user_id' => 'required',
            'batches' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Project::create($validated);

        return redirect()->route('projects.index');
    }

    public function show(Project $project) {

        return view('worker.projects.show', compact('project'));
    }

    public function edit(Project $project) {

        $users = User::all();

        return view('worker.projects.edit', compact('project', 'users'));
    }

    public function update(Project $project) {

        $validated = request()->validate([
            'name' => 'required|min:3',
            'user_id' => 'required',
            'batches' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index');
    }
    
    public function destroy(Project $project) {
        
        $project->delete();
    
        return redirect()->route('projects.index');
    }
}
