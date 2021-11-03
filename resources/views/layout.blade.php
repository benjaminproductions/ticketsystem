<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/normalize.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}"/>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #1a1e21;
                color: white;
            }
        </style>
    </head>
    <body class="antialiased">
        @yield('content')
    </body>
</html>
