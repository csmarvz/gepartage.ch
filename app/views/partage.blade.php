@extends('master')
@section('content')

         

	
	<h1>Genevois avec {{ $object->article_ind . " " . $object->name }}</h1>
	@if($users->isEmpty())
	Malheureusement, aucun Genevois n'a ce que tu cherches.<br>
	{{ HTML::link('ajout',"Veux-tu créer une annonce?") }}
	@else
	@foreach($users as $user)
				{{ $user->firstname . " " . $user->lastname }} 
	
	@endforeach
	@endif
	
	
	
	

@stop   