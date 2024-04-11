<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-correction</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/auth.css')}}">
</head>
<body>
    <div class="auth-section">

        <div class="auth-container">
            <div class="auth-layout">
                <div class="auth-presentation">
                    <h2 class="auth-title main-title">e-correction</h2>
                
                    <p class="auth-text main-text">Nous recréons vos idéologies</p>
                
                </div>
                <img src="{{ url('image/travail-equipe.png') }}" alt="">
            </div>
            
            @yield('content')
            
        </div>
    </div>
</body>
</html>