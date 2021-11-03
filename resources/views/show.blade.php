@extends('layout')
@section('title')
    {{ $ticket->title }}
@endsection
@section('content')
    <div class="center">
        <b>Titel: </b>
    </div>
    <div class="center" style="font-size: x-large">
        {{ $ticket->title }}
    </div>
    <br>
    <div class="center">
        <b>Beschreibung:</b>
    </div>
    <div class="center">
        <div class="description">
            {{ $ticket->content }}
        </div>
    </div>

    <footer>
        <div class="center">
            <a href="{{ route('index') }}">
                <button type="button" class="btn btn-secondary">Zurück</button>
            </a>

            <a href="{{ route('delete', ['id' => $ticket->id]) }}">
                <button type="button" class="btn btn-danger">Löschen</button>
            </a>
        </div>
    </footer>
@endsection