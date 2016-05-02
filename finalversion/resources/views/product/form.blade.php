@extends('layouts.app')
@section('content')
@if(Session::has('message'))
   <div class="fail">
        {{ Session::get('message') }}
   </div>
@endif
<div class="form">
 <div class="tab-content"> 
    <h1>Add New Product</h1> 
 <form action="{{ url('/product/create') }}" method="POST" enctype="multipart/form-data" novalidate>
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
    @if ($errors->has('image'))                    
         <span class="img-errors">{{ $errors->first('image') }}</span>                 
     @endif
      <input type="file" name="image" required autocomplete="off"/> 
    </div><!--field-wrap--> 
    <div class="field-wrap">
      @if ($errors->has('excerpt'))                    
          <span class="exc-errors">{{ $errors->first('excerpt') }}</span>                 
       @endif
     <textarea name="excerpt" class="excerpt" placeholder="Excerpt"></textarea> 
    </div><!--field-wrap--> 
    <div class="field-wrap">
    @if ($errors->has('description'))                    
          <span class="desc-errors">{{ $errors->first('description') }}</span>                 
     @endif
     <textarea name="description" class="description" placeholder="Description"></textarea> 
    </div><!--field-wrap--> 
    <button type="submit" class="button button-block"/>Add Product</button> 
 </form>
 </div>
</div>
@endsection