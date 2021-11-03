@extends('layout')
@section('title')
    {{ $ticket->title }}
@endsection
@section('content')
    <div class="center">
        <h5 class="padding">{{ $ticket->title }}</h5>
    </div>

    <div class="center padding">
        <b>Beschreibung:</b>
        {{ $ticket->content }}
    </div>

    <footer>
        <div class="center">
            <a href="{{ route('delete', ['id' => $ticket->id]) }}">

                <button type="button" class="btn btn-danger">Löschen</button>
            </a>
        </div>
    </footer>
@endsection