@extends('layout')
@section('title')
    Ticketsystem Index
@endsection
@section('content')
    @if(!empty($tickets))
        @foreach($tickets as $ticket)
            {{ $ticket->name }}
            {{ $ticket->user_created }}
        @endforeach
    @endif
    @if(empty($tickets))
        <h3> Keine Tickets Vorhanden </h3>
    @endif

    <a href="{{ route('create') }}" type="button" class="btn btn-success"> Neues Ticket Erstellen </a>
@endsection
