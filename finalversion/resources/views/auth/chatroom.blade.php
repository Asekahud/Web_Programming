@extends('layouts.app')
@section('content')
   <div class="header"> 
      <p class="test">From: {{ $chat['sender_name'] }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To: {{ $chat['receiver_name'] }} <p> 
   </div>
   <div class="chatspace">
   @if(count($messages)>0) 
       @foreach($messages as $message) 
         @if ( $message->from_id == $chat['sender_id'])
            Me: {{$message->content}} <br>
         @else
            {{ $chat['receiver_name'] }}: {{$message->content}} <br>
         @endif
       @endforeach   
   @else    
   @endif
   </div> 
   <div class="message-form"> 
        {!! Form::open() !!}
        <input type="hidden" name="sender_id" value="{{ $chat['sender_id'] }}"/>
        <input type="hidden" name="receiver_id" value="{{ $chat['receiver_id'] }}"/> 
        <textarea class="message" name="content" placeholder="Enter your message here" name="message"></textarea>       
        {!! Form::button('Send Message', array('class'=>'send-button')) !!} 
        {!! Form::close() !!}
   </div>      
   
   <script type='text/javascript' src="{!! asset('/js/display-message.js') !!}" ></script> 
@endsection