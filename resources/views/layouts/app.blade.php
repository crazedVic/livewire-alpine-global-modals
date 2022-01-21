<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html{background-color:black;font-size:28px;color:#e2e8f0;font-family: 'Teko', sans-serif;}
        </style>
        <livewire:styles />
        <link href='/css/app.css' rel="stylesheet">

    </head>
    <body class="antialiased">
    {{ $slot }}
    <livewire:modal />
    <livewire:scripts />
    </body>
</html>
