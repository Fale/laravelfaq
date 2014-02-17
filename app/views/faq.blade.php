@extends('layout')

@section('content')
    {{ $content }}
@stop

@section('sidebar')
    {{ print_r($sidebar) }}
@stop
