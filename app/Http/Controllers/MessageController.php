<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function store(Correction $correction) {

        if(request()->type === 'text') {
            $validated = request()->validate([
                'content' => 'required',
                'type' => 'required',
            ]);
    
            Message::create([
                'content' => $validated['content'],
                'type' => $validated['type'],
                'correction_id' => $correction->id
            ]);
        
            return redirect()->route('corrections.show', $correction->id);
        }

        if(request()->type === 'img' || request()->has('image')) {
            
            /*
            $filename = '';
            $filename = request()->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . request()->content->extension();

            request()->content->move(public_path('/assets/img'), $filename);
            */


            $file = request()->file('content');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'js/uploads/image/';
            $file->move($path, $filename);



            // $imagePath = request()->file('content')->store('message', 'public');
            
            // $validated = request()->validate([
            //     'content' => 'required|image',
            //     'type' => 'required',
            // ]);

            // $validated['content'] = $imagePath;
            
            // Message::create([
            //     'content' => $validated['content'],
            //     'type' => $validated['type'],
            //     'correction_id' => $correction->id
            // ]);

            return redirect()->route('corrections.show', $correction->id)->with('filename', $filename );
        }

    }
    
    public function update(Message $message) {

        $validated = request()->validate([
            'content' => 'required',
        ]);

        $message->update($validated);

        return redirect()->route('corrections.create');
    }
    
    public function destroy(Message $message) {
        
        $message->delete();
    
        return redirect()->route('corrections.create');
    }

}
