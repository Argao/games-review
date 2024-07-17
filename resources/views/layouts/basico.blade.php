<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/basico.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <title>@yield('titulo')</title>

</head>
<body>

    <header>
        @include('layouts._partials.topo')
    </header>
    <main id="corpo">
        @yield('conteudo')
    </main>
    <footer>
        @include('layouts._partials.footer')
    </footer>
    <script src="{{asset('js/view.js')}}"></script>
</body>
</html>
