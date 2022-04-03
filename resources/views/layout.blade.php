<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketsystem - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shared.css') }}"/>
    @yield('head')
</head>
<body>
<div class="container">
    <div class="header">
        <span class="header-title">IT 20/1 Ticketsystem</span>

        @yield('header')
        <span class="header-logout"><a href="{{ route('login.logout') }}" class="btn btn-logout">Logout</a></span>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer"><span class="footer-copyright">©IT20/1 (2022)</span></div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@yield('javascript')
</html>