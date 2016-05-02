@extends('layouts.app')

@section('content')
<section>
 <div id="product-image">
  <p> <img src="{{ route('product.image',['filename'=>$product->product_id]) }}" class="product-photo"></p>  
</div>
<div id="product-info">
  <p><b>Name: </b> {{ $product->name}}</p>
  <p><b>School: </b> {{ $product->school}}</p>
  <p><b>Price: </b> {{ $product->price}}</p>
  <p><b>Category: </b> {{ $product->category_name}}</p>
  <p><b>Owner: </b> {{ $product->firstname }} {{ $product->lastname }}</p>
  <p><b>Contact Info: </b> {{ $product->email }}</p>
  <p><b>Link To Similar Product: </b> <a href="{{ $product->link }}">Click This</a></p>
  <p><b>Description: </b> {{ $product->description }}</p>
  @if (Auth::check())
  <form action="{{ url('/user/chatroom') }}" method="POST" class="book-button">
     <input type="hidden" name="from_id" value="{{ Auth::user()->id }}"/>
     <input type="hidden" name="to_id" value="{{ $product->user_id }}"/>
     <input type="submit" value="Chat with the owner"/>
  </form>
  @endif
</div>
</section> 
@endsection