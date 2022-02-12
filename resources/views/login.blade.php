@extends('layout')
@section('title')
    Bearbeiten
@endsection
@section('content')
    <div class="container">

        @if(!empty(Auth::user()))
            <script>window.location = "/tcp";</script>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if(!empty($success))
            <div class="alert alert-info success-block">
                <strong>{{ $success }}</strong>
            </div>
        @endif

        <form method="POST" action="{{ route('login.checkLogin') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col padding">
                    <div class="center">
                        Username
                    </div>
                    <div class="center">
                        <input class="input-text" name="name" type="text" required>
                    </div>
                </div>

                <div class="col padding">
                    <div class="center">
                        Passwort
                    </div>
                    <div class="center">
                        <input class="input-text" name="password" type="text">
                    </div>
                </div>
            </div>

            <div class="row-cols-auto">
                <div class="center padding">
                    <button type="submit" class="btn btn-success">Einloggen</button>
                </div>
            </div>
        </form>
    </div>
@endsection