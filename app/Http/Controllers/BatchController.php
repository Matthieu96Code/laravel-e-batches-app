<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Project;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    
    
    public function index() {
        $currentUser = Auth()->user();
        $batches = Batch::all();

        return view('client.batches.index', compact('batches'));
    }

    public function create() {

        $currentUser = Auth()->id();
        $projects = Project::where('user_id', $currentUser)->get();

        return view('client.batches.create', compact('projects'));
    }

    public function store() {

        $validated = request()->validate([
            'name' => 'required|min:3',
            'project_id' => 'required',
        ]);

        Batch::create($validated);

        return redirect()->route('batches.index');
    }

    public function show(Batch $batch) {

        return view('client.batches.show', compact('batch'));
    }

    public function edit(Batch $batch) {

        $currentUser = Auth()->id();
        $projects = Project::where('user_id', $currentUser)->get();

        return view('client.batches.edit', compact('batch', 'projects'));
    }

    public function update(Batch $batch) {

        $validated = request()->validate([
            'name' => 'required|min:3',
            'project_id' => 'required',
        ]);

        $batch->update($validated);

        return redirect()->route('batches.index');
    }
    
    public function destroy(Batch $batch) {
        
        $batch->delete();
    
        return redirect()->route('batches.index');
    }
}
