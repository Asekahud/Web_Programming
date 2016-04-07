@extends('layouts.app')
@section('content')
    <table class="table table-bordered table-hover"><caption id="table-header">List of All Events</caption>
         <thead>
            <th>Event ID</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Place</th>            
         </thead>
         <tbody>
 @foreach($events as $event)
            <tr>
              <td>{!! $event->event_id !!}</td>
              <td>{!! link_to_route('event.details',$event->title,$event->event_id) !!}</td>
              <td id="table-excerpt">{!!$event->excerpt!!}</td>
              <td id="table-excerpt">{!!$event->place !!}</td>              
            </tr>
 @endforeach
     
     </tbody>
          {!!$events->render()!!}
</table>
@endsection