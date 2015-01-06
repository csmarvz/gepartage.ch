@extends('master')
@section('content')
<div class"row">
	<div class="col-md-12">

		<h1>Mes avis de recherche</h1>
		@foreach(Auth::user()->ads->sortByDesc('updated_at') as $ad)
		<div class"row">
			<div class="col-md-12">
				{{ HTML::link("partage/".$ad->object->slug,$ad->object->name) }} <small><cite>le {{{ @$ad->created_at }}}</cite></small>
			</div>
		</div>
			@endforeach
		</div>
	</div>
	
	@stop   