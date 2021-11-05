@extends('layout')
@section('title')
    {{ $ticket->title }}
@endsection
@section('content')
    <div class="center">
        <b>Titel:</b>
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

    @if(!empty($comments))
        <br>
        <div class="container">
            <div class="center">
                <b>Kommentare</b>
            </div>
            @foreach($comments as $comment)
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3">
                        <b>{{ $comment['author'] }}</b> schreibt:
                    </div>
                    <div class="col">
                        {{ $comment['content'] }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif


    <footer>
        <div class="center">
            <a href="{{ route('index') }}" type="button" class="btn btn-secondary">Zurück</a>
            <a href="{{ route('edit', ['ticket' => $ticket->id]) }}" type="button"
               class="btn btn-primary">Bearbeiten</a>
            <a href="{{ route('addComment', ['id' => $ticket->id]) }}" type="button" class="btn btn-success">Neuer
                Kommentar</a>
            <button type="button" class="btn btn-danger" onclick="deleteTicket(event)">Löschen</button>
        </div>
    </footer>
@endsection
@section('javascript')
    <script>
        function deleteTicket() {
            if (confirm("Willst du dieses Ticket wirklich löschen?")) {
                $.get("{{ route('delete', ['id' => $ticket->id]) }}", function () {
                    window.location.href = "{{ route('index') }}"
                })
            }
        }
    </script>
@endsection