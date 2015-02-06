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
</div>
<div class="page-header">
  <h1>La Boîte à idées<br><small>Propose-nous tes idées pour améliorer Genève Partage</small></h1>
</div>

		{{ Form::open(array('route' => 'ideas.store', 'autocomplete' => 'off'))}}
		<div class="form-group">
			{{ Form::textarea('text', Input::get('text'), array('class' => 'form-control', 'placeholder' => "")) }}
		</div>
		
		{{ Form::submit('Proposer', array('class' => 'btn btn-primary')) }}
		{{ Form::close()}}
		
		
			@if(Auth::user()->is_admin)
		@foreach(@$ideas as $idea)
		<div class="panel panel-default">
		  <div class="panel-body">
		    {{{ $idea->text }}}
		  </div>
		  <div class="panel-footer"><small>Idée proposé par {{{ $idea->user->firstname }}} le {{ $idea->created_at }}</small></div>
		</div>
		@endforeach
		
	@endif
	
	
	

@stop   