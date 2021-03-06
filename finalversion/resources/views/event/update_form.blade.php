@extends('layouts.app')
 @section('content')
@if(Session::has('message'))
  <div class="fail">
    {{ Session::get('message') }}
  </div>    
@endif
<div class="form">
  <div class="tab-content"> 
  <h1>Update Event</h1> 
<form action="{{ url('/event/update') }}" method="POST" novalidate>
       {!! csrf_field() !!}
       <div class="top-row"> 
        <div class="field-wrap">
        <input type="hidden" name="id" value="{{ $event->event_id }}"/>
         @if ($errors->has('title'))                    
              <span class="errors">{{ $errors->first('title') }}</span>                 
         @endif
          <input type="text" name="title" value="{{ $event->title }}" required autocomplete="off" placeholder="Title of The Event*"/> 
        </div><!--field-wrap-->
        <div class="field-wrap">
         @if ($errors->has('space_remained'))                    
              <span class="errors">{{ $errors->first('space_remained') }}</span>                 
         @endif
          <input type="text" name="space_remained" value="{{ $event->space_remained }}" required autocomplete="off" placeholder="Number of Places*"/> 
        </div><!--field-wrap-->         
     </div> <!--top row--> 
     
      <div class="field-wrap">
      @if ($errors->has('place'))                    
          <span class="errors">{{ $errors->first('place') }}</span>                 
       @endif
       <input type="text" name="place" value="{{ $event->place }}" required autocomplete="off" placeholder="Where it is gonna be?*" /> 
      </div><!--field-wrap-->      
 
    <div class="field-wrap">
      @if ($errors->has('excerpt'))                    
          <span class="exc-errors">{{ $errors->first('excerpt') }}</span>                 
       @endif
     <textarea name="excerpt" class="excerpt" placeholder="Excerpt">{{ $event->excerpt }}</textarea> 
    </div><!--field-wrap--> 
    <div class="field-wrap">
    @if ($errors->has('description'))                    
          <span class="desc-errors">{{ $errors->first('description') }}</span>                 
     @endif
     <textarea name="description" class="description" placeholder="Description">{{ $event->description }}</textarea> 
    </div><!--field-wrap--> 
     <button type="submit" class="button button-block"/>Update Event</button> 
</form> 
  </div>
</div>
@endsection