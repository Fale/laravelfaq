@extends('layout')

@section('content')

<h1>{{{ $category->name }}}</h1>
<ul>
@foreach($faqs as $faq)
    {{ print_r($faq) }}
    <li>{{{ $faq->name }}}</li>
@endforeach
</ul>
@stop

@section('sidebar')
@stop
