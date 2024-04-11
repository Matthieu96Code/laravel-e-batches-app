<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-correction</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/layout.css')}}">
    <link rel="stylesheet" href="{{url('css/user.css')}}">
    <!-- {{-- <script src="https://cdn.tailwindcss.com"></script> --}} -->
</head>
<body>
    <div class="user-section">
        @include('layout.sidebar')
        <div class="main-content">
            @include('layout.navbar')
            @yield('content')
        </div>
    </div>
    @yield('script')
</body>
</html>