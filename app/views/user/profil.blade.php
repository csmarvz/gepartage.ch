@extends('master')

@section('head')

		{{ HTML::script('assets/js/bootstrap-toggle.min.js') }}

        {{ HTML::style('assets/css/bootstrap-toggle.min.css') }}
@stop

@section('content')

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
	
<div class="page-header">
	<h1>Mon profil</h1>
</div>

<ul class="nav nav-pills">
	<li role="presentation"  class="{{ @$profil?'active':'' }}"><a href="{{ URL::to('profil')}}">Mes données personnelles</a></li>
	<li role="presentation" class="{{ @$objets?'active':'' }}"><a href="{{ URL::to('profil/mes_objets')}}">Mes objets</a></li>
	<li role="presentation" class="{{ @$avis?'active':'' }}"><a href="{{ URL::to('profil/mes_avis')}}">Mes avis de recherche</a></li>
</ul>
<br>
   



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
    
{{ Form::model(Auth::user(), array('route' => array('users.update', Auth::user()->id), 'method' => 'put', 'autocomplete' => 'off')) }}
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
<div class"row">
			
	{{ Form::submit('Enregistrer', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</div>
@elseif(@$objets)

<div class="well">
	L'objet que tu souhaites partager n'est pas dans la liste? Ajoute-le ici !
	
	{{ Form::open(array('route' => 'user_add_object', 'autocomplete' => 'off', 'class'=>'form form-inline')) }}
	<div class="form-group">
		{{ Form::text('name',null,['class' => 'form-control'])  }}
	</div>
	 
	<button type="submit" class="btn btn-primary">Ajouter</button>
	{{ Form::close() }}
	



    
{{ Form::model(Auth::user(), array('route' => array('users.update', Auth::user()->id), 'method' => 'put', 'autocomplete' => 'off')) }}
	
{{ Form::hidden('objects_update',true) }}
<div class="row">
	
	
	@foreach(Auth::user()->objects->filter(function($object){return $object->is_custom;}) as $object)
		
		
	<div class="col-md-3">
	
	
		<div class="form-group">
			<strong>
				 {{ Form::checkbox('objects_array[]', $object->id, Auth::user()->hasObject($object->id),array('data-toggle' => 'toggle', 'data-on' => $object->name, 'data-off' => $object->name, 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'data-width' => '100%')) }}
					 
				<!-- {{ Form::checkbox('objects_array[]', $object->id, Auth::user()->hasObject($object->id)) }} {{ $object->name }}
					-->
			</strong>
			
		</div>
	</div>
	@endforeach
	
</div>
</div>

	<div class="row">
	</div>
	
	@foreach(Object::where('is_custom','=',0)->get() as $object)
	<div class="col-md-3">
			
		
		<div class="form-group">
			{{ Form::checkbox('objects_array[]', $object->id, Auth::user()->hasObject($object->id),array('data-toggle' => 'toggle', 'data-on' => $object->name, 'data-off' => $object->name, 'data-onstyle' => 'success', 'data-width' => '100%')) }}
			<!--
			{{ Form::checkbox('objects_array[]', $object->id, Auth::user()->hasObject($object->id)) }} {{ $object->name }} 
			-->
				
		</div>
	</div>
	@endforeach
	

			
			
	<div class="row">
	</div>
	<div class="col-md-3">
			
	{{ Form::submit('Enregistrer', array('class' => 'btn btn-primary')) }}
</div>
	{{ Form::close() }}
	
	@endif
		
		
	
	
	
	@endif
	
</div>

<script>
</script>
@stop   