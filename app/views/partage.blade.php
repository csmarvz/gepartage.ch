@extends('master')
@section('content')

         

	<div class="page-header">
<h1>Genevois avec {{ $object->article_ind }} <strong> {{ Str::lower($object->name) }} </strong></h1>
</div>
@if($users->isEmpty())
Malheureusement, aucun Genevois n'a ce que tu cherches.<br>
	
{{ Form::open(array('route' => 'ads.store', 'autocomplete' => 'off'))}}
{{ Form::hidden('object_id',$object->id) }}
<button type="submit" class="btn btn-primary">Créer un avis de recherche</button>
{{ Form::close() }}
	
	
@else
<div class="row">
<div class="col-md-4 col-xs-12">
	<ul class="list-group">

		@foreach($users as $user)
		<li class="list-group-item">
			<span class="badge"><a href="{{ URL::to("message/$object->id/$user->id") }}"><span style="color:white" class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></span>
			<p class="h5">
			{{ $user->firstname . " " . $user->lastname }}</p>
		</li>
		@endforeach
	</ul>
</div>
</div>

@endif
	
	
	
	

@stop   