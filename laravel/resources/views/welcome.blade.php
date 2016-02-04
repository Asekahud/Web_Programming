@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    {!! link_to_route('posts.published','Published') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('posts.unpublished','Unpublished') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('post.create','Create Form') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
