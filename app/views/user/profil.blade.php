@extends('master')
@section('content')

	@if(Session::get('success'))
	<div class="alert alert-success" role="alert">
	  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	  {{ Session::get('success') }}
	</div>
	@endif
	@if(Session::get('error'))
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  {{ Session::get('error') }}
	</div>
	@endif
	
		<h1>Mon profil</h1>

<ul class="nav nav-pills">
<li role="presentation"  class="{{ @$profil?'active':'' }}"><a href="{{ URL::to('profil')}}">Mes données personnelles</a></li>
  <li role="presentation" class="{{ @$objets?'active':'' }}"><a href="{{ URL::to('profil/mes_objets')}}">Mes objets</a></li>
  <li role="presentation" class="{{ @$avis?'active':'' }}"><a href="{{ URL::to('profil/mes_avis')}}">Mes avis de recherche</a></li>
</ul>
<br>
    
	{{ Form::model(Auth::user(), array('route' => array('users.update', Auth::user()->id), 'method' => 'put', 'autocomplete' => 'off')) }}



@if(@$avis)
		@foreach(Auth::user()->ads->sortByDesc('updated_at') as $ad)
		<div class"row">
			<div class="col-md-12">
				{{ HTML::link("partage/".$ad->object->slug,$ad->object->name) }} <small><cite>le {{{ @$ad->created_at }}}</cite></small>
			</div>
		</div>
			@endforeach
@else

@if(@$profil)
<div class="row">	
	<div class="col-md-3">
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
			{{ Form::text('address', Input::old('address'), array('class' => 'form-control', 'placeholder' => 'Rue et n°')) }}
		</div>
		<div class="form-group">
			{{ Form::text('zip', Input::old('zip'), array('class' => 'form-control', 'placeholder' => 'NPA')) }}
		</div>
		{{ Form::hidden('objects_update',false) }}
		
	</div>
</div>
@elseif(@$objets)
{{ Form::hidden('objects_update',true) }}

<div class="row">
	@foreach(Object::all() as $object)
	<div class="col-md-3">
			
		
		<div class="form-group">
			<label>
				{{ Form::checkbox('objects_array[]', $object->id, Auth::user()->hasObject($object->id)) }} {{ $object->name }} 
				
			</label>
		</div>
	</div>
	@endforeach
</div>

@endif
		
		
	
	
	<div class"row">
			
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
	</div>
	@endif
	
</div>
@stop   