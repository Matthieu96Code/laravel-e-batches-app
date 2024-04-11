<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

</head>
<body>
    <main>
        <div class="text-slate-800">
            Home navigation
            <div class="p-24 px-[10%] bg-skin-background-secondary min-h-screen">
                <h1 class="font-bold text-2xl text-gray-700 py-5">Sign</h1>
                <div class="w-full grid md:grid-cols-2 gap-1 text-gray-800">
                    <div class="hidden w-full md:flex md:flex-col items-center text-center bg-skin-background-primary p-10">
                        <h1 class="font-bold text-2xl text-gray-700 py-2">e-correction</h1>
                        <p class="text-gray-600 py-2">Nous recréons vos idéologies</p>
                        <Image class="w-96" src={{ url('storage/travail-equipe.png')}} alt="" />
                    </div>
                    <div class="w-full flex flex-col justify-center bg-skin-background-primary ">
                        @yield('contents')
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>