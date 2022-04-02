<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketsystem</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/index.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shared.css') }}"/>
</head>
<body>
<div class="container">
    <div class="header">
        <span class="header-title">IT 20/1 Ticketsystem</span>
        <span class="header-new"><a href="{{ route('create') }}" type="button" class="btn btn-create"> Neues Ticket Erstellen </a></span>
        <span class="header-logout"><a href="{{ route('login.logout') }}" class="btn btn-logout">Logout</a></span>
    </div>
    <div class="content">
        @if(!$tickets->isEmpty())
            <table class="ticket-table">
                <tr class="table-header">
                    <td>Creator</td>
                    <td>Title</td>
                    <td>Priority</td>
                    <td>Timestamp</td>
                    <td></td>
                </tr>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->user_created }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->priority }}</td>
                        <td>{{ Illuminate\Support\Carbon::parse($ticket->created_date)->setTimezone('Europe/Berlin')->format('d.m.Y H:i') }}</td>
                        <td><a href="{{ $ticket->id }}" class="btn btn-show">Show</a></td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
    <div class="footer"><span class="footer-copyright">©IT20/1 (2022)</span></div>
</div>

</body>
</html>
