@extends('master')
@section('content')

         

<div class="container text-center">
	<h1>Genève Partage</h1>
	<p>Partagez entre genevois tout plein de choses!</p>
</div>
	
	<h2>Genevois avec {{ $object->article_ind . " " . $object->name }}</h2>
	@foreach($users as $user)
				{{ $user->firstname . " " . $user->lastname }} 
	
	@endforeach

	
	
	
	

@stop   