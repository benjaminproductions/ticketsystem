@extends('layout')
@section('content')
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
                    <td class="padding" style="width: 200px">
                        <div class="center">
                            <b>Priorität</b>
                        </div>
                    </td>
                    <td class="padding" style="width: 200px">
                        <div class="center">
                            <b>Datum</b>
                        </div>
                    </td>
                    <td class="padding" style="width: 200px"></td>
                </tr>
                @foreach($tickets as $ticket)
                    <tr>
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
                            <div class="center">
                                {{ $ticket->priority }}
                            </div>
                        </td>
                        <td class="padding">
                            <div class="center">
                                {{ Illuminate\Support\Carbon::parse($ticket->created_date)->setTimezone('Europe/Berlin')->format('H:i d.m.Y') }}
                            </div>
                        </td>
                        <td class="padding center">
                            <a href="{{ $ticket->id }}" class="btn btn-success btn-sm">Anzeigen</a>
                        </td>
                    </tr>
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
