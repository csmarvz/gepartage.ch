@extends('master')
@section('content')


<h1>Recherche : {{ Input::get('q') }}</h1>
<br>
@if($objects->isEmpty())
Malheureusement, ce que tu cherches n'existe pas encore dans la base de données de Genève Partage.
{{ link_to('ajout?q='.Input::get('q') ,"Veux-tu l'ajouter?", array('class' => '')) }}

@else
@foreach($objects as $object)
{{HTML::link("partage/$object->slug",$object->name)}}<br>
@endforeach
@endif
	

@stop   