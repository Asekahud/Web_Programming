@extends('layouts.app')

@section('content')
@if (Auth::guest())
        You not registered bitch          
    @else
        You registered bitch
    @endif
@endsection