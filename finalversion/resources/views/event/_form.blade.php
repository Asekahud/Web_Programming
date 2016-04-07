<form action="{{ url('/event/create') }}" method="POST" novalidate>
       {!! csrf_field() !!}
       <div class="top-row"> 
        <div class="field-wrap">
         @if ($errors->has('title'))                    
              <span class="errors">{{ $errors->first('title') }}</span>                 
         @endif
          <input type="text" name="title" required autocomplete="off" placeholder="Title of The Event*"/> 
        </div><!--field-wrap-->
        <div class="field-wrap">
         @if ($errors->has('space_remained'))                    
              <span class="errors">{{ $errors->first('space_remained') }}</span>                 
         @endif
          <input type="text" name="space_remained" required autocomplete="off" placeholder="Number of Places*"/> 
        </div><!--field-wrap-->         
     </div> <!--top row--> 
     
      <div class="field-wrap">
      @if ($errors->has('place'))                    
          <span class="errors">{{ $errors->first('place') }}</span>                 
       @endif
       <input type="text" name="place" required autocomplete="off" placeholder="Where it is gonna be?*" /> 
      </div><!--field-wrap-->      
 
    <div class="field-wrap">
      @if ($errors->has('excerpt'))                    
          <span class="errors">{{ $errors->first('excerpt') }}</span>                 
       @endif
     <textarea name="excerpt" placeholder="Excerpt"></textarea> 
    </div><!--field-wrap--> 
    <div class="field-wrap">
    @if ($errors->has('description'))                    
          <span class="errors">{{ $errors->first('description') }}</span>                 
     @endif
     <textarea name="description" class="description" placeholder="Description"></textarea> 
    </div><!--field-wrap--> 
     <button type="submit" class="button button-block"/>Add Event</button> 
</form> 