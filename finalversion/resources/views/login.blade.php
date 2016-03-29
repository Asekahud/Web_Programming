@extends('layouts.app')

@section('content')
@if (Auth::guest())
        You not logged in bitch          
    @else
        You logged in bitch
    @endif
@endsection