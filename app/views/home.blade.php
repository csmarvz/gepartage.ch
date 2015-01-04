@extends('master')
@section('content')

         


	<h1>Genève Partage</h1>
	<p>Partagez entre genevois tout plein de choses!</p>
	
	<div class="row">
		<div class="col-md-6">
			{{ link_to('annonce','Créer une nouvelle annonce', $attributes = array('class' => 'btn btn-default'), $secure = null) }}
		</div>
	</div>
	
	<div class="row">
	
	@foreach(Category::whereNull('parent_id')->get() as $category)

	
		<div class="col-md-4">
			{{ HTML::image($category->image_path) }}
		</div>
	
	
	@endforeach
	</div>
	
	
	

@stop   