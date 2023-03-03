<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <title>{{ $headTitle ?? config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://kit.fontawesome.com/be0245ce85.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <x-layouts.header/>

        <h1>{{ $visibleTitle }}</h1>

        {{ $slot }}

        <x-layouts.footer/>
    </body>

</html>
