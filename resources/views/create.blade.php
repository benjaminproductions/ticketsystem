@extends('layout')
@section('title')
    Ticketsystem Create
@endsection
@section('content')
    <div class="container">

        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col padding">
                    <div class="center">
                        Name des Erstellers
                    </div>
                    <div class="center">
                        <input class="input-text" name="name" type="text">
                    </div>
                </div>

                <div class="col padding">
                    <div class="center">
                        Titel
                    </div>
                    <div class="center">
                        <input class="input-text" name="title" type="text">
                    </div>
                </div>
            </div>

            <div class="row padding">
                Inhalt <br>
                <textarea name="content"></textarea>
            </div>

            <div class="row-cols-auto">
                <div class="center padding">
                    <button type="submit" class="btn btn-success">Speichern</button>
                </div>
            </div>
        </form>
    </div>
@endsection