@extends('master')
@section('content')


<h1>Recherche : {{ $search }}</h1>
<br>
@foreach($objects as $object)
{{HTML::link("partage/$object->slug",$object->name)}}<br>
@endforeach
	

@stop   