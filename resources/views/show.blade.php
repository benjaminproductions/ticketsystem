@extends('layout')
@section('title')
    {{ $ticket->title }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="center">
                    <b>Ersteller:</b>
                </div>
                <div class="center title_font">
                    {{ $ticket->user_created }}
                </div>
            </div>
            <div class="col-4">
                <div class="center">
                    <b>Titel:</b>
                </div>
                <div class="center title_font">
                    {{ $ticket->title }}
                </div>
            </div>
            <div class="col-4">
                <div class="center">
                    <b>Priorität:</b>
                </div>
                <div class="center title_font">
                    {{ $ticket->priority }}
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="center">
            <b>Dateien</b>
        </div>

        @if(!empty($ticket->files))
            <div class="center">
                @foreach($ticket->files as $file)
                    <a href="{{ route('file', ['name' => $file->path]) }}" class="padding"> {{ $file->path }} </a>
                    <a href="#" class="btn btn-sm btn-danger"
                       onclick="deleteFile(this)" src="{{ $file->id }}">🗑️</a>
                @endforeach
            </div>
        @endif

        <div class="center">
            <form method="POST" action="{{ route('file.ticketfile', ['ticketId' => $ticket->id]) }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" onChange="this.form.submit()">
            </form>
        </div>
    </div>

    <hr>

    <div class="center padding">
        <b>Beschreibung:</b>
    </div>
    <div class="center">
        <div class="description">
            {{ $ticket->content }}
        </div>
    </div>

    @if(!empty($ticket->comments[0]))
        <hr>

        <div class="container">
            <div class="center">
                <b>Kommentare</b>
            </div>
            @foreach($ticket->comments as $comment)
                <div class="row" style="margin: 5px;">
                    <div class="center">
                        <div class="comment-border">
                            <div class="container center">
                                <div class="col-3">
                                    <b>{{ $comment->user_created }}</b> schreibt:
                                </div>
                                <div class="col">
                                    {{ $comment->content }}
                                </div>
                                <br>
                                <a href="{{ route('deleteComment', ['id' => $comment->id, 'ticketId' => $ticket->id]) }}"
                                   class="btn btn-danger btn-sm">Löschen</a>
                            </div>

                            @if(!empty($comment->files[0]))
                                <div class="padding">
                                    @foreach($comment->files as $file)
                                        <a href="{{ route('file', ['name' => $file->path]) }}">
                                            {{ $file->path }}
                                        </a>

                                        <a href="#" class="btn btn-sm btn-danger"
                                           onclick="deleteFile(this)" src="{{ $file->id }}">🗑️</a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="padding">
                                <form method="POST"
                                      action="{{ route('file.commentfile', ['commentId' => $comment->id]) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" onChange="this.form.submit()">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


    <footer>
        <div class="center">
            <a href="{{ route('index') }}" type="button" class="btn btn-secondary">
                Zurück
            </a>
            <a href="{{ route('edit', ['ticket' => $ticket->id]) }}" type="button" class="btn btn-primary">
                Bearbeiten
            </a>
            <a href="{{ route('addComment', ['id' => $ticket->id]) }}" type="button" class="btn btn-success">
                Neuer Kommentar
            </a>
            <button type="button" class="btn btn-danger" onclick="deleteTicket(event)">
                Löschen
            </button>
        </div>
    </footer>
@endsection
@section('javascript')
    <script>
        function deleteTicket() {
            if (confirm("Willst du dieses Ticket wirklich löschen?")) {
                $.get("{{ route('delete', ['ticketId' => $ticket->id]) }}", function () {
                    window.location.href = "{{ route('index') }}"
                })
            }
        }

        function deleteFile(el) {
            if (confirm("Willst du diese Datei wirklich löschen?")) {
                let attachmentId = $(el).attr('src');
                $.get("file/" + attachmentId + "/delete", function () {
                    window.location.href = "{{ route('show', ['ticket' => $ticket->id]) }}"
                })
            }
        }
    </script>
@endsection