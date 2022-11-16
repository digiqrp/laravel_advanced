@extends('template')

@section('content')
    <form action="{{ action('web\TeamController@store') }}" method="POST">
        @csrf
        @inputTextBox('title')
        </br>
        <button type="submit" class="btn btn-primary">create</button>
    </form>
    <p>Team {{ $points }}</p>
@endsection
