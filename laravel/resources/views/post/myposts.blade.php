@extends('layouts.app')

@section('content')
      <table class="table table-bordered table-hover">
         <thead>
            <th>Post ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Excerpt</th>
            <th>Content</th>
            <th>Published At</th>
         </thead>
         <tbody>
         @foreach ($posts as $post)
            <tr>
              <td>{!!$post->id !!}</td>
              <td>{!!$post->title !!}</td>
              <td>{!!$post->slug!!}</td>
              <td>{!!$post->excerpt !!}</td>
              <td>{!!$post->content !!}</td>
              <td>{!!$post->published_at !!}</td>
              <td>
                  {!! link_to_route('post.edit','Edit') !!} |
                  {!! link_to_route('posts.delete','Delete') !!}
              </td>
            </tr>
         @endforeach
         </tbody>
   </table>
@stop