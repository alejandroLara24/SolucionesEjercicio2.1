<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <title>
        @yield('titulo')
        </title>
    </head>
    <body>
        <div class="container">
            @include('partials.nav')
            @yield('contenido')
        </div>
    </body>
</html>