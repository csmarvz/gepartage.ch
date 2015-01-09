@extends('master')
@section('content')

         

<div class="page-header">
<h1>Nouveau message pour <strong>{{ $user->firstname }}</strong> concernant <strong>{{ $object->name }}</strong></h1>
</div>

	<div class"row">
    <div class="col-md-4">		 
			{{ Form::open(array('route' => 'messages.store'))}}
			<!--
			<div class="form-group">
			        {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Titre du message')) }}
</div>
				-->
<div class="form-group">
			        {{ Form::textarea('body', Input::old('body'), array('class' => 'form-control', 'placeholder' => 'Message')) }}
	</div>
			{{ Form::hidden('receiver_id',$user->id) }}
			{{ Form::hidden('object_id',$object->id) }}
			
		    {{ Form::submit('Envoyer', array('class' => 'btn btn-primary')) }}
			{{ Form::close()}}
			
</div>
</div>
	
	

@stop   