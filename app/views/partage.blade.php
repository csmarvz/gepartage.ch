@extends('master')
@section('content')

         

	
<h1>Genevois avec {{ $object->article_ind . " " . $object->name }}</h1>
@if($users->isEmpty())
Malheureusement, aucun Genevois n'a ce que tu cherches.<br>
	
{{ Form::open(array('route' => 'ads.store', 'autocomplete' => 'off'))}}
{{ Form::hidden('object_id',$object->id) }}
<button type="submit" class="btn btn-primary">Créer un avis de recherche</button>
{{ Form::close() }}
	
	
@else
@foreach($users as $user)
{{ $user->firstname . " " . $user->lastname }} 
@endforeach
@endif
	
	
	
	

@stop   