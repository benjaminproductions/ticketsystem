@extends('layout')
@section('title')
    Erstellen
@endsection
@section('content')
    <div class="container">

        <form method="POST" action="{{ route('storeComment', ['id' => $id]) }}" enctype="multipart/form-data">
            @csrf

            <div class="row padding">
                Kommentar beschreibung <br>
                <textarea name="content" required></textarea>
            </div>

            <div class="row-cols-auto">
                <div class="center padding">
                    <button type="submit" class="btn btn-success">Speichern</button>
                </div>
            </div>
        </form>
    </div>
@endsection