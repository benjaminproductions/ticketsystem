@extends('layout')

@section('title')
    Index
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/index.css') }}"/>
@endsection

@section('header')
    <span class="header-new"><a href="{{ route('create') }}" type="button" class="btn btn-create"> Neues Ticket Erstellen </a></span>
@endsection

@section('content')
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
@endsection