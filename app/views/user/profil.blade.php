@extends('master')
@section('content')


		<h1>Mon profil</h1>

<ul class="nav nav-pills">
<li role="presentation"  class="{{ @$profil?'active':'' }}"><a href="{{ URL::to('profil')}}">Données personnelles</a></li>
  <li role="presentation" class="{{ @$objets?'active':'' }}"><a href="{{ URL::to('profil/mes_objets')}}">Mes objets</a></li>
</ul>
<br>
    
	{{ Form::model(Auth::user(), array('route' => array('users.update', Auth::user()->id), 'method' => 'put')) }}

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
<div class="row">
	@foreach(Object::all() as $object)
	<div class="col-md-3">
			
		
		<div class="form-group">
			<label>
				{{ Form::checkbox('objects_array[]', $object->id, Auth::user()->hasObject($object->id)) }} {{ $object->name }} 
				{{ Form::hidden('objects_update',true) }}
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
	
</div>
@stop   