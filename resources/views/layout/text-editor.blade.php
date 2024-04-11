<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-correction</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/layout.css')}}">
    <link rel="stylesheet" href="{{url('css/user.css')}}">    
</head>
<body>
    <div class="user-section">
        @include('layout.sidebar')
        <div class="main-content">
            @include('layout.navbar')
            @yield('content')
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#description').summernote();
        // });
        $('#description').summernote({
            placeholder: 'Tapez votre correction ici...',
            tabsize:2,
            height:300
        });
    </script>
</body>
</html>