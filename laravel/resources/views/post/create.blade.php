@extends('layouts.app')

@section('content')
 {!! Form::open(['route' => 'post.store']) !!}
    @include('post._form')
 {!! Form::close() !!}
@stop