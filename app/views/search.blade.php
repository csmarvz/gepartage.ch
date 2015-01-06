@extends('master')
@section('content')


<h1>Recherche : {{ Input::get('q') }}</h1>
<br>
@if($objects->isEmpty())
Malheureusement, ce que tu cherches n'existe pas encore dans la base de données de Genève Partage.<br>
{{ HTML::link('ajout',"Veux-tu l'ajouter?") }}
@else
@foreach($objects as $object)
{{HTML::link("partage/$object->slug",$object->name)}}<br>
@endforeach
@endif
	

@stop   