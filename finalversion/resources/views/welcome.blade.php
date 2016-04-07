@extends('layouts.app')
@section('content')
  <form action="{{ url('/product/test') }}" method="POST" enctype="multipart/form-data">
    <input type="file" name="image"/>    
    <button type="submit" class="button button-block"/>Add Product</button> 
  </form>
@endsection