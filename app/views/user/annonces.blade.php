@extends('master')
@section('content')
	<div class"row">
		<div class="col-md-12">

	<h1>Mes annonces</h1>
	@foreach(Auth::user()->ads->sortByDesc('updated_at') as $ad)
		<div class"row">
			<div class="col-md-12">
				<h2>{{{ $ad->title }}}</h2><cite>Catégorie {{{ @$ad->category->name }}}
			</div
		</div>
	@endforeach
	</div
</div>
@stop   