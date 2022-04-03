@extends('layout')

@section('title')
    Edit
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/create.css') }}"/>
@endsection

@section('content')
    <form method="POST" action="{{ route('storeEditedTicket', ['ticket' => $ticket->id]) }}"
          enctype="multipart/form-data">
        @csrf
        <span>Ticket Title <br><input class="input-text" name="title" type="text" placeholder="Title"
                                      value="{{ $ticket->title }}" required></span>
        <span>Ticket Priority <br><select name="priority" id="priority" class="input-text">
                    <option value="Urgent" {{ $ticket->priority == "Urgent" ? 'selected' : '' }}>Urgent</option>
                    <option value="High" {{ $ticket->priority == "High" ? 'selected' : '' }}>High</option>
                    <option value="Normal" {{ $ticket->priority == "Normal" ? 'selected' : '' }}>Normal</option>
                    <option value="Low" {{ $ticket->priority == "Low" ? 'selected' : '' }}>Low</option>
            </select></span>
        <span>Ticket Description<br><textarea name="content" placeholder="Describe Your Problem Here..."
                                              required>{{ $ticket->content }}</textarea></span>
        <span>
                <button type="submit" class="btn btn-save">Save</button>
                @if($comments)
                <button type="button" class="btn btn-save" onclick="deleteComments(event)">
                            Delete All Comments
                        </button>
            @endif
                <a href="{{ route('index') }}" class="btn btn-save">Back</a>
            </span>
    </form>
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
