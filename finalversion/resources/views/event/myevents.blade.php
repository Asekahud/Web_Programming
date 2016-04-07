@extends('layouts.app')
@section('content')
@if(count($events)>0)   
    <table><caption id="table-header">Your Events</caption>
         <thead>
            <th>Event ID</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Place</th>
            <th>Change</th>
         </thead>
         <tbody>
  @foreach($events as $event)
            <tr>
            <td>{!! $event->event_id !!}</td>
            <td>{!! $event->title !!}</td>
            <td id="table-excerpt">{!! $event->excerpt !!}</td>
            <td id="table-excerpt">{!! $event->place !!}</td> 
              <td>
                  {!! link_to_route('event.updateForm','Edit',$event->event_id) !!} |
                  {!! link_to_route('event.delete','Delete',$event->event_id)  !!}
              </td>
            </tr>
@endforeach  
     </tbody>          
</table>
 @else
   <p>You don't have any events organised!</p>
 @endif
@endsection