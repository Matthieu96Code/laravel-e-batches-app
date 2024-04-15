@extends('layout.user-layout')

@section('content')
    <h1>Detail du la correction</h1>

    <h2>{{ $correction->name }}</h2>
    <p> Le contenu de votre correction : </p>
    {!!$correction->content!!}
    {{-- <p>Le total des correction assigné est : {{ $batch->project->batches }}</p> --}}
    <form action="{{ route('corrections.destroy', $correction->id) }}" method='POST'>
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>

    @foreach ($correction->messages as $message)

        @if ($correction->batch->project->user->id === Auth::id() && $message->type === "text")   
            <div>
                <p>{{$message->content}}</p>        
            </div>
        @endif

        {{-- @if ($correction->batch->project->user->id === Auth::id() && $message->type === "img")   
            <div>
                <img src="{{ asset(session('filename'))  }}" alt="{{ session('filename') }}"/>        
            </div>
        @endif --}}

        {{-- Modal form --}}

        <div class="main-modal modal-container file-modal invisible" id="join-file-modal">
            <div class="modal-content">
                <form enctype="multipart/form-data" action="{{ route('corrections.messages.store', $correction->id) }}" method="post">
                    @csrf
                    <input hidden type="text" name="type" value="img">
                    <input type="file" name="content">
                    <button class="main-btn send-img" type="submit">image</button>
                </form>
                <button class="main-btn send-doc" type="button">document</button>
            </div>
        </div>

        
    @endforeach

    
    @if (session()->has('filename'))
    {{-- @if (true) --}}
        <div class="main-modal img-modal" id="send-img-modal">
            <button class="close-btn" type="button">X</button>
            <div>
                <button class="draw-line-btn" type="button">ligne</button>
                <button class="done" type="button">Done</button>
            </div>
            <div>
                <p class="filename">{{session('filename')}}</p>
                <canvas id="edit-image-canvas" width="1000" height="600"></canvas>
            </div>
            <div>
                <form action="{{ url('') }}" method='POST'>
                    @csrf
                    <button class="send-btn" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    @endif

    <form action="{{ route('corrections.messages.store', $correction->id) }}" method='POST'>
        @csrf
        <input class="main-input" type="text" name="content">
        <input hidden="true" type="text" name="type" value="text">
        <button class="main-btn" type="submit"><span class="main-icon add-icon"><x-iconsax-two-archive-add /></span></button>
        <button class="main-btn join-file" type="button">file</button>
    </form>
    
    @include('shared.draw-line')
    
@endsection

{{-- 
@section('script')
    <script>

        const allBody = document.querySelector('body');

        const fileModal = document.querySelector('#join-file-modal');

        const joinFile = document.querySelector('.join-file');
        joinFile.addEventListener('click', (e) => {
            fileModal.classList.toggle('invisible');
            // delModal.classList.add('visible');
        });
        
        // const imgModal = document.querySelector('#send-img-modal');

        // const sendImg = document.querySelector('.send-img');
        // sendImg.addEventListener('click', (e) => {
        //     imgModal.classList.toggle('invisible');
        //     // delModal.classList.add('visible');
        // });

        document.querySelector('.close-btn')
        .addEventListener('click', (e) => {
            imgModal.classList.add('invisible');
        });

        var filename = document.querySelector('.filename');
        var path = 'js/uploads/image/';
        var totalPath = path + filename.textContent

        let canvas = new fabric.Canvas('edit-image-canvas');
        fabric.Image.fromURL('../js/uploads/image/1712995062.jpg', function(img) {
            canvas.add(img);
        });

        // Function to load image asynchronously
        
        /*function loadImage(url) {
            return new Promise((resolve, reject) => {
                fabric.Image.fromURL(url, function(img) {
                    resolve(img);
                }, null, { crossOrigin: 'anonymous' }, reject);
            });
        }

        // Usage
        let canvas = new fabric.Canvas('edit-image-canvas');

        // Load image asynchronously
        loadImage('../js/uploads/image/1712995062.jpg')
            .then(img => {

                img.scaleToWidth(canvas.width);
                img.scaleToHeight(canvas.height);

                // Add the image to the center of the canvas
                img.left = (canvas.width - img.width) / 2;
                img.top = (canvas.height - img.height) / 2;

                // Add the image to the canvas
                canvas.add(img);
                console.log('correctly load')
            })
            .catch(error => {
                console.error('Failed to load image:', error);
            });

        // Check if the canvas element exists
        if (!canvas) {
            console.error("Canvas element not found");
        }*/

    </script>
@endsection --}}