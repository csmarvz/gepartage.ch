@extends('master')
@section('content')

	<div class="page-header">
		<h1>Messages</h1>
		
</div>




<ul class="nav nav-pills">

  <li role="presentation" class="{{ @$inbox?'active':'' }}">
	  <a href="{{ URL::to('messages/reception') }}">
		  Messages reçus
	  </a>
  </li>
  <li role="presentation" class="{{ @$outbox?'active':'' }}">
	  <a href="{{ URL::to('messages/envoi') }}">
		  Messages envoyés
	  </a>
  </li>
  <!--
  <li role="presentation" class="{{ @$new?'active':'' }}">
	  <a href="{{ URL::to('messages/nouveau') }}">
		  + Écrire un message
	  </a>
  </li>
	  -->

</ul>
<br>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

@if(@$inbox)
	@foreach(Auth::user()->messagesReceived->sortByDesc('created_at') as $m)
  <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading{{ $m->id }}">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $m->id }}" aria-expanded="false" aria-controls="collapse{{ $m->id }}">
	Message envoyé par
	<strong>{{ $m->sender->firstname }} {{ $m->sender->lastname }}</strong>  concernant <strong>{{ $m->object->name }}</strong>
	envoyé le {{ $m->created_at }} 
        </a>
      </h4>
    </div>
    <div id="collapse{{ $m->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $m->id }}">
      <div class="panel-body">
        {{ $m->body}}
      </div>
	  <div class="panel-footer">{{ HTML::link("message/".$m->object->id."/".$m->sender->id,'Répondre') }}</div>
	  
    </div>
  </div>
@endforeach

@elseif(@$outbox)
	@foreach(Auth::user()->messagesSent->sortByDesc('created_at') as $m)

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading{{ $m->id }}">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $m->id }}" aria-expanded="false" aria-controls="collapse{{ $m->id }}">
	Message pour
	<strong>{{ $m->receiver->firstname }} {{ $m->receiver->lastname }}</strong>  concernant <strong>{{ $m->object->name }}</strong>
	envoyé le {{ $m->created_at }}
        </a>
      </h4>
    </div>
    <div id="collapse{{ $m->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $m->id }}">
      <div class="panel-body">
        {{ $m->body}}
      </div>
	  <div class="panel-footer">{{ HTML::link("message/".$m->object->id."/".$m->receiver->id,'Écrire un nouveau message') }}</div>
    </div>
  </div>

	
	
	
 
@endforeach

@endif
</div>

@stop   