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

@if(!empty(Auth::user()))
    <div class="padding">
        Eingelogt als: <b>{{ Auth::user()->name }}</b> <a href="{{ route('login.logout') }}" class="btn btn-danger btn-sm">Logout</a>
    </div>
@else
    <div class="padding">
        Einlogdaten: <br>
        Benutzername: <b>Mitarbeiter</b> oder <b>Kunde</b> <br>
        Passwort: <b>Feuerwehr</b>
    </div>
@endif

<div class="center padding">
    <h1>Ticketsystem</h1>
</div>

@yield('content')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@yield('javascript')
</html>
