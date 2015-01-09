@extends('master')
@section('content')

         

<div class="container text-center">
	@if(Session::get('success'))
	<div class="alert alert-success" role="alert">
	  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	  {{ Session::get('success') }}
	</div>
	@endif
	@if(Session::get('errors'))
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  {{ Session::get('errors')->first() }}
	</div>
	@endif
	
	<h1>Genève Partage</h1>
	<p>Partager entre genevois des objets et des services!</p>
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
	        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmer le mot de passe')) }}
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
			{{ Form::text('q', Input::old('q'), array('class' => 'form-control', 'placeholder' => "Tape ici ce que tu cherches")) }}
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
		
		<div class="row">
			<div class="col-md-3"></div>
			
		<div class="col-md-6">
			<h4>		Les derniers avis de recherche
</h4>
			<ul class="list-group">
		@foreach(Ad::all()->sortByDesc('updated_at') as $ad)
		
		

				<li class="list-group-item">
					<span class="badge"><a href="{{ URL::to('message/'. $ad->object->id.'/'. $ad->user->id) }}"><span style="color:white" class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></span>
					<p class="h5"><strong>{{HTML::link("partage/".$ad->object->slug,$ad->object->name)}}</strong>
						par {{ $ad->user->firstname }} {{ $ad->user->lastname }}
						<small>{{ $ad->created_at }}</small> </p>
				</li>
		
		
		
		
		
		
		@endforeach
			</ul>
		</div>
</div>

@endif

	
	
	
	

@stop   