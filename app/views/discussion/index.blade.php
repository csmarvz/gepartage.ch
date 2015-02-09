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
  <h1>Forum<br><small>Discute librement des sujets qui te tiennent à coeur</small></h1>
</div>
<div class="row">
<div class="col-md-6">
		{{ Form::open(array('route' => 'discussions.store', 'autocomplete' => 'off'))}}
		<div class="form-group">
			{{ Form::text('title', Input::get('title'), array('class' => 'form-control', 'placeholder' => "Le titre de ta discussion")) }}
		</div>
		
		{{ Form::submit('Créer une nouvelle discussion', array('class' => 'btn btn-primary')) }}
		{{ Form::close()}}
	</div>
</div>
		
			
		@foreach(@$discussions as $discussion)
		<div class="panel panel-default">
		  <div class="panel-body">
			{{ HTML::link("forum/$discussion->id",$discussion->title) }}
		  </div>
		  <div class="panel-footer"><small>Dernier message de xx posté le xx</small></div>
		</div>
		@endforeach
		{{ $discussions->links() }}
	

@stop   