<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketsystem-Show</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shared.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/show.css') }}"/>
</head>
<body>
<div class="container">
    <div class="header">
        <span class="header-title">IT 20/1 Ticketsystem</span>
        <span class="header-logout"><a href="{{ route('login.logout') }}" class="btn btn-logout">Logout</a></span>
    </div>
    <div class="content">
        <div class="split left">
            <div class="details">
                <span>Creator<p>{{$ticket->user_created}}</p></span>
                <span>Ticket Title<p>{{ $ticket->title }}</p></span>
                <span>Ticket Priority<p>{{ $ticket->priority }}</p></span>
                <span>Ticket Description<p>{{ $ticket->content }}</p></span>
            </div>
            <button type="button" class="btn btn-save middle" onclick="deleteTicket(event)">Delete</button>
            <a href="{{ route('addComment', ['id' => $ticket->id]) }}" class="btn btn-save middle">New Comment</a>
            <a href="{{ route('edit', ['ticket' => $ticket->id]) }}" class="btn btn-save middle">Edit</a>
            <a href="{{ route('index') }}" class="btn btn-save middle">Back</a>
        </div>
        <div class="split right">
            <div style="width: 100%;">
                <div style="width: 90%; float: left;">
                    Files
                </div>
                <div class="file-right" style="width: 10%; float: right;">
                    <form method="POST" action="{{ route('file.ticketfile', ['ticketId' => $ticket->id]) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="file-upload">
                            <label for="file-input">
                                <svg style="height: 24px; stroke: red;" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="none" stroke-width="7.5"></circle>
                                    <line x1="32.5" y1="50" x2="67.5" y2="50" stroke-width="5"></line>
                                    <line x1="50" y1="32.5" x2="50" y2="67.5" stroke-width="5"></line>
                                </svg>
                                Add File
                            </label>
                            <input id="file-input" type="file" name="file" onChange="this.form.submit()">
                        </div>
                    </form>
                </div>
            </div>
            @csrf
            <div class="files">
                @if(!empty($ticket->files))
                    <table class="file-table">
                        @foreach($ticket->files as $file)
                            <tr>
                                <td style="width: 100px;"><a
                                        href="{{ route('file', ['name' => $file->path]) }}"> {{ $file->path }} </a></td>
                                <td style="width: 200px;"><a href="#" class="btn btn-save"
                                                             onclick="deleteFile(this)" src="{{ $file->id }}">Delete</a>
                                </td>
                                <td style="width: 80%"></td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>

            @if(!empty($ticket->comments[0]))
                <hr>
                <div style="width: 100%;">
                    Comments
                </div>
                <table class="comment-table">
                    @foreach($ticket->comments as $comment)
                        <tr>
                            <td class="comment-user">{{ $comment->user_created }} wrote:</td>
                            <td class="comment-content">{{ $comment->content }}</td>
                            <td class="comment-upload">
                                <form method="POST"
                                      action="{{ route('file.commentfile', ['commentId' => $comment->id]) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="file-upload">
                                        <label for="file-input">
                                            <svg style="height: 24px; stroke: red;" viewBox="0 0 100 100">
                                                <circle cx="50" cy="50" r="45" fill="none" stroke-width="7.5"></circle>
                                                <line x1="32.5" y1="50" x2="67.5" y2="50" stroke-width="5"></line>
                                                <line x1="50" y1="32.5" x2="50" y2="67.5" stroke-width="5"></line>
                                            </svg>
                                            Add File
                                        </label>
                                        <input id="file-input" type="file" name="file" onChange="this.form.submit()">
                                    </div>
                                </form>
                            </td>
                            <td class="comment-delete"><a
                                    href="{{ route('deleteComment', ['id' => $comment->id, 'ticketId' => $ticket->id]) }}"
                                    class="btn btn-save">Delete</a></td>
                        </tr>
                        @if(!empty($comment->files[0]))
                            @foreach($comment->files as $file)
                                <tr>
                                    <td></td>
                                    <td style="width: 100px;"><a
                                            href="{{ route('file', ['name' => $file->path]) }}"> {{ $file->path }} </a>
                                    </td>
                                    <td style="width: 200px;"><a href="#" class="btn btn-save"
                                                                 onclick="deleteFile(this)"
                                                                 src="{{ $file->id }}">Delete</a></td>
                                    <td style="width: 80%"></td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </table>
            @endif
        </div>
    </div>
    <div class="footer"><span class="footer-copyright">©IT20/1 (2022)</span></div>
</div>
</body>
</html>
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
