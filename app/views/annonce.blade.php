@extends('master')
@section('content')
	
	<div class"row">
    <div class="col-md-4">
		<h1>Nouvelle annonce</h1>
	    {{ Form::open(array('route' => 'ads.store')) }}
                <div class='form-group'>
		{{ Form::label('category_id', 'Catégorie') }}
		{{ Form::select('category_id', Category::lists('name','id'), null, ['class'=>'form-control']) }}
	</div>
    <div class="form-group">
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Titre')) }}
    </div>
	<div class="form-group">
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control', 'placeholder' => 'Description')) }}
    </div>
	
    
    {{ Form::submit('Créer', array('class' => 'btn btn-default')) }}
    {{ Form::close() }}
</div>
</div>
@stop   