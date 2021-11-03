@extends('layout')
@section('title')
    Ticketsystem
@endsection
@section('content')
    <div class="center padding">
        <h1>Ticketsystem</h1>
    </div>
    <div class="center">
        @if(!$tickets->isEmpty())
            <table>
                <tr>
                    <td class="padding" style="width: 200px">
                        <div class="center">
                            <b>Ersteller</b>
                        </div>
                    </td>
                    <td class="padding" style="width: 200px">
                        <div class="center">
                            <b>Titel</b>
                        </div>
                    </td>
                    <td class="padding" style="width: 200px"></td>
                </tr>
                @foreach($tickets as $ticket)
                    <td class="padding">
                        <div class="center">
                            {{ $ticket->user_created }}
                        </div>
                    </td>
                    <td class="padding">
                        <div class="center">
                            {{ $ticket->title }}
                        </div>
                    </td>
                    <td class="padding">
                        <a href="{{ $ticket->id }}">
                            <button type="button" class="btn btn-success">Anzeigen</button>
                        </a>
                    </td>
                @endforeach
            </table>
        @endif
    </div>

    <footer>
        <div class="center">
            <a href="{{ route('create') }}" type="button" class="btn btn-success"> Neues Ticket Erstellen </a>
        </div>
    </footer>
@endsection
