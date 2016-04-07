@extends('layouts.app')

@section('content')
<section>
 <div id="product-image">

</div>
<div id="product-info">
  <p><b>Title: </b> {{ $event->title}}</p>
  <p><b>Place: </b> {{ $event->place}}</p>
  <p><b>Space Remained: </b> {{ $event->space_remained}}</p>
  <p><b>Organsier: </b> {{ $event->firstname }} {{ $event->lastname }} {{ $event->student_id}}</p>
  <p><b>Description: </b> {{ $event->description }}</p> 
</div>
</section>
 
@endsection