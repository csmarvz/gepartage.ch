@extends('master')
@section('content')

<div class="col-md-12">
	<h1>Ajouter un nouvel objet ou service</h1>
	
</div>
	<div class="col-md-3">
		
		{{ Form::open(array('route' => 'objects.store', 'autocomplete' => 'off'))}}
		<div class="form-group">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => "Nom de l'objet ou du service")) }}
		</div>
		{{ Form::submit('Ajouter', array('class' => 'btn btn-primary')) }}
		{{ Form::close()}}
			
	</div>

	

@stop   