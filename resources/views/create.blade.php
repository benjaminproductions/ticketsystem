@extends('layout')

@section('title')
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/create.css') }}"/>
@endsection

@section('content')
    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf


        <span>Ticket Title<br>
            <input class="input-text" name="title" type="text" placeholder="Title" required>
        </span>


        <span>Ticket Priority <br>
            <select name="priority" id="priority" class="input-text">

                @foreach(App\Models\Ticket::priorityList() as $priority)
                    <option value="{{ $priority }}" {{ $priority === App\Models\Ticket::DEFAULT_PRIORITY ? 'selected' : '' }}>{{ $priority }}</option>
                @endforeach

            </select>
        </span>


        <span>Ticket Description
            <br>
            <textarea name="content" placeholder="Describe Your Problem Here..." required></textarea>
        </span>

        <span>
            <button type="submit" class="btn btn-save">Save</button>
            <a href="{{ route('index') }}" class="btn btn-save">Back</a>
        </span>
    </form>
@endsection
