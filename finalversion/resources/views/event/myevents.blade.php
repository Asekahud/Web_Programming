@extends('layouts.app')
@section('content')
 @if(Session::has('message'))
     <div class="confirmation">
        {{ Session::get('message') }}
     </div>    
  @endif
 <div class="create-div">
     {!! Form::open(array('url'=>'event/createForm', 'method'=>'GET')) !!}           
     {!! Form::submit('Organise New Event', array('class'=>'create-button')) !!} 
     {!! Form::close() !!}
 </div>
@if(count($events)>0)   
    <table><caption id="table-header">Your Events</caption>
         <thead>
            <th>Event ID</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Place</th>
            <th>Guest List</th>
            <th>Change</th>
         </thead>
         <tbody>
  @foreach($events as $event)
            <tr>
            <td>{!! $event->event_id !!}</td>
            <td>{!! $event->title !!}</td>            
            <td id="table-excerpt">{!! $event->excerpt !!}</td>
            <td id="table-excerpt">{!! $event->place !!}</td>
            <td> {!! link_to_route('event.guest_list','Show',$event->event_id) !!}</td>
              <td>
                  {!! link_to_route('event.updateForm','Edit',$event->event_id) !!} |
                  {!! link_to_route('event.delete','Delete',$event->event_id)  !!}
              </td>
            </tr>
@endforeach  
     </tbody>          
</table>
 @else
 <div class="message-div">
   <p>You don't have any events organised!</p>
 </div>
 @endif
@endsection