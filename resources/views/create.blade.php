@extends('layout')
@section('title')
    Ticketsystem Create
@endsection
@section('content')
    <div class=""
    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">

        <input name="name" type="text">

        <br>

        <input name="title" type="text">

        <br>

        <textarea name="content"></textarea>

        <br>

        <button type="submit" class="btn btn-success">Speichern</button>
    </form>
@endsection