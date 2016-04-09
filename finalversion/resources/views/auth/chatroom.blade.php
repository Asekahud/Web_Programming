@extends('layouts.app')
@section('content')
   <div class="header"> 
      <p class="test">From: {{ $chat['sender_name'] }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To: {{ $chat['receiver_name'] }} <p> 
   </div>
   <div class="chatspace">
   
   </div> 
   <div class="message-form"> 
        {!! Form::open(array('url'=>'user/send','method'=>'POST', 'id'=>'myform')) !!}
        <input type="hidden" name="sender_id" value="{{ $chat['sender_id'] }}"/>
        <input type="hidden" name="receiver_id" value="{{ $chat['receiver_id'] }}"/> 
        <textarea class="message" name="content" placeholder="Enter your message here" name="message"></textarea>       
        {!! Form::button('Send Message', array('class'=>'send-button')) !!} 
        {!! Form::close() !!}
   </div>      
   <script type='text/javascript' src="{!! asset('/js/send-message.js') !!}" ></script>   
@endsection