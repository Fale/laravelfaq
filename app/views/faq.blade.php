@extends('layout')

@section('content')
    {{ $content }}
@stop

@section('sidebar')
    <ul>
        @foreach($sidebar as $s)
            <li>{{ link_to('/' . $s, $s) }}</li>
        @endforeach
    </ul>
@stop
