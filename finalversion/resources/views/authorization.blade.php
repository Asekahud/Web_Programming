@extends('layouts.app')
@section('content')
@if(Session::has('message'))
   <div class="fail">
        {{ Session::get('message') }}
   </div>
@endif
 @include('auth._form')
@endsection