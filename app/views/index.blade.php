@extends('layout')

@section('content')

<h1>Home Page</h1>

<ul>
    @foreach (App\Models\Category::all() as $category)
        <li>{{ link_to('/' . $category->path, $category->name) }}</li>
    @endforeach
</ul>

@stop

@section('sidebar')
@stop
