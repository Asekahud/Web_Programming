@extends('layouts.app')

@section('content')
  {!! Form::open(['route' => 'post.search', 'method' => 'get']) !!}
  {!! Form::text('search',null,['class'=>'search_bar']) !!}
  {!! Form::select('category', ($categories),null,['class'=>'form_control']) !!}
  {!! Form::submit('Search',['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}
@stop