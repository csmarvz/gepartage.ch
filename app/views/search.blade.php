@extends('master')
@section('content')


<div class="row">
	<div class="col-md-6">
		<h1>Résultat de ta recherche</h1>
		{{ Form::open(array('route' => 'objects.search', 'method' => 'get')) }}
		<div class="form-group">
			{{ Form::text('q', Input::get('q'), array('class' => 'form-control', 'placeholder' => "Tape ici ce que tu cherches")) }}
			<!-- >
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
				-->
		</div>
		{{ Form::close() }}
	</div>
</div>

@if($objects->isEmpty())
Malheureusement, ce que tu cherches n'existe pas encore dans la base de données de Genève Partage.
{{ link_to('ajout?q='.Input::get('q') ,"Veux-tu l'ajouter?", array('class' => '')) }}

@else
@foreach($objects as $object)
{{HTML::link("partage/$object->slug",$object->name)}}<br>
@endforeach
@endif
	

@stop   