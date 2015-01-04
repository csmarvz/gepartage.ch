@extends('master')
@section('content')
	<div class"row">
		<div class="col-md-12">

	<h1>{{{ $ad->title }}}</h1>
	<cite>Catégorie {{{ @$ad->category->name }}}</cite>
	<br>
	{{{ $ad->description }}}
	
	</div
</div>
	<div class"row">
    
		
</div>
@stop   