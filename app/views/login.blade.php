@extends('master')
@section('content')
	
	<div class"row">
    <div class="col-md-4">
		<h1>Connexion</h1>
		 
			{{ Form::open(array('route' => 'login'))}}
			<div class="form-group">
			        {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'email')) }}
</div>
<div class="form-group">
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'mot de passe')) }}
	</div>
		    {{ Form::submit('Connexion', array('class' => 'btn btn-default')) }}
			
			{{ Form::close()}}
			
</div>
</div>
@stop   