@extends('layouts.app')
@section('content')
@if(Session::has('error'))
   <div class="fail">
        {{ Session::get('error') }}
   </div>
  @elseif(Session::has('confirmation'))
   <div class="confirmation">
        {{ Session::get('confirmation') }}
   </div>
  @endif
<section>
 <div id="product-image">
   <p> <img src="{{ route('event.image',['filename'=>$event->event_id]) }}" class="product-photo"></p>
</div>
<div id="product-info">
  <p><b>Title: </b> {{ $event->title}}</p>
  <p><b>Place: </b> {{ $event->place}}</p>
  <p><b>Space Remained: </b> {{ $event->space_remained}}</p>
  <p><b>Organsier: </b> {{ $event->firstname }} {{ $event->lastname }} </p>
  <p><b>Description: </b> {{ $event->description }}</p>
  @if (Auth::check())
  <form action="{{ url('/event/book') }}" method="POST" class="book-button">
     <input type="hidden" name="event_id" value="{{ $event->event_id }}"/>
     <input type="hidden" name="owner_id" value="{{ $event->id }}"/>
     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
     <input type="submit" value="Book Place"/>
  </form>
  @endif
</div>
</section>
 
@endsection