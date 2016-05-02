@extends('layouts.app')
@section('content')
  @if(count($guests)>0)   
    <table><caption id="table-header"> Registered Users </caption>
         <thead>
            <th>Guest ID</th>
            <th>Firstname</th>
            <th>Lastname</th>                      
         </thead>
         <tbody>
  @foreach($guests as $guest)
            <tr>
            <td>{!! $guest->id !!}</td>
            <td>{!! $guest->firstname !!}</td>            
            <td>{!! $guest->lastname !!}</td>                          
 @endforeach  
     </tbody>          
</table>
 @else
   <div class="message-div">
    <p>There are no students that registered to this event yet.</p>
   </div>
 @endif  
@endsection