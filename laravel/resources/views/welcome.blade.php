@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    {!! link_to_route('post.create','Create Form') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('posts.unpublished','unpublished')!!} &nbsp;&nbsp;&nbsp; {!! link_to_route('posts.published','published') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
