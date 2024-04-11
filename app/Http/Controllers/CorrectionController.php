<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Correction;
use App\Models\Project;
use Illuminate\Http\Request;

class CorrectionController extends Controller
{
    public function index() {
        $currentUser = Auth()->user();
        $corrections = Correction::all();

        return view('client.corrections.index', compact('corrections'));
    }

    public function create(Batch $batch) {

        // $currentUser = Auth()->id();
        // $projects = Project::where('user_id', $currentUser)->get();

        return view('client.corrections.create', compact('batch'));
    }

    // public function store(Batch $batch) {

    //     return dd($batch);
    //     return dd(request());

    //     $validated = request()->validate([
    //         'name' => 'required|min:3',
    //         'batch_id' => 'required',
    //     ]);

    //     $validated([
    //         'batch_id' => $batch->id
    //     ]);

    //     $description = $dom->saveHTML();

    //     Correction::create($validated);

    //     return redirect()->route('corrections.index');
    // }

    public function store(Batch $batch) {
        
        $content = request()->content;

        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach($imageFile as $item => $image) {

            $data = $image->getAttribute('src');
 
            List($type, $data) = explode(';', $data);
            
            List(, $data) = explode(',', $data);

            $imageData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imageData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);

        }

        $content = $dom->saveHTML();

        $correction= new Correction;
        $correction->name = request()->name;
        $correction->batch_id = $batch->id;

        $correction->content = $content;

        // $correction->content = request()->content;

        $correction->save();

        // return redirect()->back();  

        // Correction::create($validated);
        // return dd($correction);

        return redirect()->route('batches.corrections.index', $batch->id);
    }

    public function show(Correction $correction) {

        return view('client.corrections.show', compact('correction'));
    }

    public function edit(Correction $correction) {

        return view('client.corrections.edit', compact('correction'));
    }

    public function update(Correction $correction) {
        $content = request()->content;

        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach($imageFile as $item => $image) {

            $data = $image->getAttribute('src');
 
            List($type, $data) = explode(';', $data);
            
            List(, $data) = explode(',', $data);

            $imageData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imageData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);

        }

        $content = $dom->saveHTML();

        $correction->name = request()->name;

        $correction->content = $content;

        $correction->update();
        return redirect()->route('batches.corrections.index', $correction->batch_id);
    }
    
    public function destroy(Correction $correction) {
        
        $correction->delete();
    
        return redirect()->route('batches.corrections.index', $correction->batch_id);
    }
}
