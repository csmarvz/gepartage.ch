@extends('master')
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
	<h1>Connexion</h1>
</div>
	
<div class"row">
	<div class="col-md-3">
		{{ Form::open(array('route' => 'login'))}}
		<div class="form-group">
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'email')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'mot de passe')) }}
		</div>
		{{ Form::submit('Connexion', array('class' => 'btn btn-default')) }}
		<small>
			{{ HTML::link('inscription','Nouveau ici? Inscris-toi') }}
		</small>
		{{ Form::close()}}
	</div>
</div>

@stop   