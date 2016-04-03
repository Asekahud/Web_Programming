@extends('layouts.app')

@section('content')
<section>
 <div id="product-image">

</div>
<div id="product-info">
  <p><b>Name: </b> {{ $product->name}}</p>
  <p><b>School: </b> {{ $product->school}}</p>
  <p><b>Price: </b> {{ $product->price}}</p>
  <p><b>Category: </b> {{ $product->category_name}}</p>
  <p><b>Owner: </b> {{ $product->firstname }} {{ $product->lastname }} {{ $product->student_id}}</p>
  <p><b>Contact Info: </b> {{ $product->email}}</p>
  <p><b>Description: </b> {{ $product->description}}</p> 
</div>
</section>
 
@endsection