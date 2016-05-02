@extends('layouts.app')
@section('content')
  @if(Session::has('message'))
   <div class="confirmation">
        {{ Session::get('message') }}
   </div>
  @endif
@endsection