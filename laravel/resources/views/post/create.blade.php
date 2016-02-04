@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Create</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                {!! link_to_route('posts.published','Published') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('posts.unpublished','Unpublished') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('post.create','Create Form') !!}
                      {!! Form::open(['route' => 'post.store']) !!}
                         @include('post._form')
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>  
@stop