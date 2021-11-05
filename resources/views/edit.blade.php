@extends('layout')
@section('title')
    Bearbeiten
@endsection
@section('content')
    <div class="container">

        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col padding">
                    <div class="center">
                        Titel
                    </div>
                    <div class="center">
                        <input class="input-text" name="title" type="text" value="{{ $ticket->title }}" required>
                    </div>
                </div>

                <div class="col padding">
                    <div class="center">
                        Name des Erstellers
                    </div>
                    <div class="center">
                        <input class="input-text" name="name" type="text" value="{{ $ticket->user_created }}">
                    </div>
                </div>
            </div>

            <div class="row padding">
                Beschreibung <br>
                <textarea name="content" required>{{ $ticket->content }}</textarea>
            </div>

            <div class="row-cols-auto">
                <div class="center padding">
                    <button type="submit" class="btn btn-success">Speichern</button>

                    @if($comments)
                        <button type="button" class="btn btn-danger" onclick="deleteComments(event)">Alle Kommentare Löschen</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script>
        function deleteComments() {
            if (confirm("Willst du alle Kommentare wirklich löschen?")) {
                $.get("{{ route('deleteComments', ['id' => $ticket->id]) }}", function () {
                    window.location.href = "{{ route('show', ['ticket' => $ticket->id]) }}"
                })
            }
        }
    </script>
@endsection