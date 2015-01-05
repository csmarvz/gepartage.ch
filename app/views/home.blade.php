@extends('master')
@section('content')

         

<div class="container text-center">
	<h1>Genève Partage</h1>
	<p>Partagez entre genevois tout plein de choses!</p>
</div>
	

@if(Auth::guest())
<div class"row">
	<div class="col-md-3"></div>
	
	
	
	
	<div class="col-md-3">
		<h4>Première fois? Inscris-toi</h4>
		
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
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
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
    
		{{ Form::submit("S'inscrire", array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
	
	<div class="col-md-3">
		<h4>Déjà inscrit? Connecte-toi</h4>
		{{ Form::open(array('route' => 'login'))}}
		<div class="form-group">
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe')) }}
		</div>
		{{ Form::submit('Se connecter', array('class' => 'btn btn-primary')) }}
			
		{{ Form::close()}}
			
	</div>
</div>

@else
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		{{ Form::open(array('route' => 'objects.search', 'method' => 'get')) }}
		<div class="form-group">
			{{ Form::text('objet', Input::old('objet'), array('class' => 'form-control', 'placeholder' => "J'ai besoin d'un ...")) }}
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

@endif

	
	
	
	

@stop   