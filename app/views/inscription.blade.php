@extends('master')
@section('content')
	
	<div class"row">
    <div class="col-md-4">
		<h1>Inscription</h1>
	    {{ Form::open(array('route' => 'users.store')) }}
    <div class="form-group">
        {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-control', 'placeholder' => 'Prénom')) }}
    </div>
	<div class="form-group">
        {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-control', 'placeholder' => 'Nom de famille')) }}
    </div>
	<div class="form-group">
        {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control', 'placeholder' => 'Téléphone')) }}
    </div>
	<div class="form-group">
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Adresse email')) }}
    </div>
	<div class="form-group">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe')) }}
    </div>
	<div class="form-group">
        {{ Form::text('address', Input::old('address'), array('class' => 'form-control', 'placeholder' => 'Rue et n°')) }}
    </div>
	<div class="form-group">
        {{ Form::text('zip', Input::old('zip'), array('class' => 'form-control', 'placeholder' => 'NPA')) }}
    </div>
    
    {{ Form::submit('Enregistrer', array('class' => 'btn btn-default')) }}
		<small>
		{{ HTML::link('connexion','Déjà inscrit? Connecte-toi') }}
	</small>
    {{ Form::close() }}
</div>
</div>
@stop   