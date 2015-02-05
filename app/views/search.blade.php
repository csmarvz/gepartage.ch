@extends('master')
@section('content')

	<div class="page-header">
		<h1>Résultat de ta recherche</h1>
		
</div>

<div class="row">
	<div class="col-md-6">
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
Malheureusement, <strong>{{{ Input::get('q') }}}</strong> n'existe pas encore dans la base de données de Genève Partage :(
<br><strong>Veux-tu l'ajouter?</strong>
<br><br>
		{{ Form::open(array('route' => 'suggestions.store', 'autocomplete' => 'off'))}}
		{{ Form::hidden('name',Input::get('q'))  }}
		{{ Form::submit('Oui !', array('class' => 'btn btn-primary')) }}
		{{ Form::close()}}
<!-- A REMPLACER PAR SUGGESTION
{{ link_to('ajout?q='.Input::get('q') ,"Veux-tu l'ajouter?", array('class' => '')) }}
-->
@else
@foreach($objects as $object)
{{HTML::link("partage/$object->slug",$object->name)}}<br>
@endforeach
@endif
	

@stop   