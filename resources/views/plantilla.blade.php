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
            <div style="text-align: right">
                {{ fechaActual("d/m/Y") }}
            </div>
            @yield('contenido')
        </div>
    </body>
</html>