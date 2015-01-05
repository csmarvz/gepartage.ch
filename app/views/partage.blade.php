@extends('master')
@section('content')

         

	
	<h1>Genevois avec {{ $object->article_ind . " " . $object->name }}</h1>
	@foreach($users as $user)
				{{ $user->firstname . " " . $user->lastname }} 
	
	@endforeach

	
	
	
	

@stop   