<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title>

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script type="text/javascript" src="/js/app.js"></script>
</head>

<body class="d-flex flex-column h-100">
<header>
    @include('partials.nav')
</header>

<main role="main" class="flex-shrink-0 pt-5">
    <div class="text-right bg-info pt-2 pr-3">
        {{ fechaActual('d/m/Y') }}
    </div>

    <div class="container">
        @yield('contenido')
    </div>
</main>

@include('partials.pie')
</body>
</html>
