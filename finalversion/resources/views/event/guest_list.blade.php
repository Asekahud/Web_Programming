@extends('layouts.app')
@section('content')
  @if(count($guests)>0)   
    <table><caption id="table-header"> Registered Users </caption>
         <thead>
            <th>Guest ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Student ID</th>            
         </thead>
         <tbody>
  @foreach($guests as $guest)
            <tr>
            <td>{!! $guest->id !!}</td>
            <td>{!! $guest->firstname !!}</td>            
            <td>{!! $guest->lastname !!}</td>   
            <td>{!! $guest->student_id !!}</td>               
 @endforeach  
     </tbody>          
</table>
 @else
   <p>There are no students that registered to this event yet.</p>
 @endif  
@endsection