@extends('layouts.app')
@section('content')
 @if(count($chats)>0) 
   <div class="my-chats">
     <h1>My Chats</h1>
       @foreach($chats as $chat)
       <form action="{{ url('/user/chatroom') }}" method="POST" class="book-button">
         <input type="hidden" name="from_id" value="{{ Auth::user()->id }}"/>
         <input type="hidden" name="to_id" value="{{ $chat['to_id'] }}"/>
         <input type="submit" value="{{ $chat['to_name'] }}"/>
       </form>
       @endforeach
   </div>
  @else
   <div class="message-div">
     <p>You don't have any opened chats!</p>
   </div>
  @endif
@endsection