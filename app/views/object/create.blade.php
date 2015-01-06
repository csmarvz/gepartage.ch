@extends('master')
@section('content')

<div class="col-md-12">
	<h1>Ajouter un nouvel objet ou service</h1>
	
</div>
	<div class="col-md-3">
		
		{{ Form::open(array('route' => 'objects.store', 'autocomplete' => 'off'))}}
		<div class="form-group">
			{{ Form::text('name', Input::get('q'), array('class' => 'form-control', 'placeholder' => "Nom de l'objet ou du service")) }}
		</div>
		<div class="form-group">
			{{Form::label('avis','Créer un avis de recherche?')}}
		{{ Form::checkbox('avis', '1', false, array('class' => '')) }}
	</div>
		
		{{ Form::submit('Ajouter', array('class' => 'btn btn-primary')) }}
		{{ Form::close()}}
			
	</div>

	

@stop   