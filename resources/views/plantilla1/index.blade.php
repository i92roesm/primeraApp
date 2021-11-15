<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Documento</title>
    </head>
    <body>
        <header>@yield('cabecera')</header>
        <main>
            @yield('cuerpo')
            @section('fin_cuerpo')
                <br>Muchas gracias.
            @show
        </main>
        <footer>@yield('pie')</footer>
    </body>
</html>