<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketsystem @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}"/>
</head>
<body>

<div class="center padding">
    <h1>Ticketsystem</h1>
</div>

@yield('content')
</body>
</html>
