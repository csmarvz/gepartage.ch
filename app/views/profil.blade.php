@extends('master')
@section('content')
	<div class"row">
		<div class="col-md-12">

	<h1>Mon profil</h1>
</div>
</div>
	<div class"row">
    
		
		{{ Form::model(Auth::user(), array('route' => array('users.update', Auth::user()->id), 'method' => 'put')) }}
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
		        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe')) }}
		    </div>
			<div class="form-group">
		        {{ Form::text('address', Input::old('address'), array('class' => 'form-control', 'placeholder' => 'Adresse complète')) }}
		    </div>
		</div>
		
		<div class="col-md-9">
			<p>J'ai ces types d'objets à prêter</p>
		@foreach(Category::all() as $category)
		<div class="form-group">
			<label>
		{{ Form::checkbox('categories_array[]', $category->id, Auth::user()->hasCategory($category->id)) }} {{ $category->name }} 
	</label>
	</div>
		@endforeach
	    
		
		
	
	</div>
	<div class"row">
		<div class="col-md-3">
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
		</div>
	</div>
	
</div>
@stop   