<form action="{{ url('/product/create') }}" method="POST" novalidate>
       {!! csrf_field() !!}
       <div class="top-row"> 
        <div class="field-wrap">
         @if ($errors->has('name'))                    
              <span class="errors">{{ $errors->first('name') }}</span>                 
         @endif
          <input type="text" name="name" required autocomplete="off" placeholder="Name of The Product*"/> 
        </div><!--field-wrap--> 
        <select class = "dropdown" name="school"> 
         <option value="Engineering">Engineering</option> 
         <option value="Business Studies">Business</option> 
         <option value="School of Law">Law School</option> 
         <option value="Computing Science">Computing</option> 
        </select> 
     </div> <!--top row--> 
     <div class="top-row"> 
      <div class="field-wrap">
      @if ($errors->has('price'))                    
          <span class="errors">{{ $errors->first('price') }}</span>                 
       @endif
       <input type="text" name="price" required autocomplete="off" placeholder="The price you ask*" /> 
      </div><!--field-wrap--> 
     <select class="dropdown" name="category"> 
      <option value="1">Books</option> 
      <option value="2">Others</option> 
     </select> 
    </div> 
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
     <button type="submit" class="button button-block"/>Add to Calaogue</button> 
</form> 