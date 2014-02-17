@extends('layout')

@section('content')

<h1>{{{ $category->name }}}</h1>
<ul>
    @foreach($faqs as $faq)
        <li>{{ link_to( '/' . $faq->path, $faq->name) }}</li>
    @endforeach
</ul>
@stop

@section('sidebar')
@stop
