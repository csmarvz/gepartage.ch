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
	
	<div class"row">
    <div class="col-md-4">
		<h1>Masquerade</h1>
		 
			{{ Form::open(array('route' => 'masquerade'))}}
			<div class="form-group">
			        {{ Form::select('user_id', User::lists('firstname','id'),null, array('class' => 'form-control')) }}
</div>

		    {{ Form::submit('Masquerade', array('class' => 'btn btn-default')) }}
		
			{{ Form::close()}}
			
</div>
</div>
@stop   