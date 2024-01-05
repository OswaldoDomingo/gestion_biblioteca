<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel con Vue</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <!-- Aqui se monta  app por eso es importante que sea id=app-->
        <div id="app">
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
