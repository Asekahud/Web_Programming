@extends('layouts.app')

@section('content')
        <div class="container">
    <h1>Posts</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                   <div>
                       {!! link_to_route('posts.published','Published') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('posts.unpublished','Unpublished') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('post.create','Create Form') !!};
                   </div>
                     @foreach ($posts as $post)
                      <article>
                       <h2>{!!$post->title !!}</h2>
                        <p>
                          {!! $post->excerpt !!}
                        </p>
                         <p>
                          published: {{ $post->published_at }}
                        </p>
                       </article>
                      @endforeach              
            </div>
        </div>
    </div>
</div
  
@stop