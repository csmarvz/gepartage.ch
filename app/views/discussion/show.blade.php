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
  <h1>{{{ @$discussion->title }}}<br><small>par {{{ @$discussion->user->firstname }}} {{{ @$discussion->user->lastname }}}</small></h1>
</div>

		
			@foreach(@$messages as $message)
			<div class="row">
				<div class="col-md-1">
					{{ $message->user->firstname }}
				</div>
				<div class="col-md-7">
			<div class="panel panel-default">
			  <div class="panel-body">
				{{ nl2br(e($message->message)) }}<br>
				<small><cite>le {{ $message->created_at }}</cite></small>
			  </div>
			</div>
		</div>
		</div>
		
			@endforeach
			<div class="row">
	<div class="col-md-8">

		{{ $messages->links() }}
		
			{{ Form::open(array('route' => 'disc_messages.store', 'autocomplete' => 'off'))}}
			<div class="form-group">
				{{ Form::hidden('discussion_id',@$discussion->id) }}
				{{ Form::textarea('message', Input::get('message'), array('class' => 'form-control', 'placeholder' => "Ton message")) }}
			</div>
		
			{{ Form::submit('Envoyer', array('class' => 'btn btn-primary')) }}
			{{ Form::close()}}
		</div>
	</div>

@stop   