@extends('app')

@section('content')
    
  <div>
    {!! link_to_route('posts','published') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('posts.unpublished','unpublished') !!} &nbsp;&nbsp;&nbsp; {!! link_to_route('post.create','new') !!};
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
@stop