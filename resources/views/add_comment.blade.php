@extends('layout')

@section('title')
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/create.css') }}"/>
@endsection

@section('content')
    <form method="POST" action="{{ route('storeComment', ['id' => $id]) }}" enctype="multipart/form-data">
        @csrf
        <span>Comment<br><textarea name="content" placeholder="What Do You Want To Say?" required></textarea></span>
        <span>
                <button type="submit" class="btn btn-save">Save</button>
                <a href="{{ route('index') }}" class="btn btn-save">Back</a>
            </span>
    </form>
@endsection