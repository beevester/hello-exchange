<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="mx-auto mt-10 w-2/3 rounded shadow-lg p-6 bg-gradient-to-r from-indigo-50 to-indigo-100" id="app">
            <main-page></main-page>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
