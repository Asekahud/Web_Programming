@extends('layouts.app')
 @section('content')
<div class="form">
  <div class="tab-content"> 
  <h1>Update Product</h1> 
<form action="{{ url('/product/update') }}" method="POST" novalidate>
       {!! csrf_field() !!}
       <div class="top-row"> 
        <div class="field-wrap">
          <input type="hidden" name="id" value="{{ $product->product_id }}"/>
         @if ($errors->has('name'))                    
              <span class="errors">{{ $errors->first('name') }}</span>                 
         @endif
          <input type="text" name="name" value="{{ $product->name}}" required autocomplete="off" placeholder="Name of The Product*"/> 
        </div><!--field-wrap--> 
        <select class = "dropdown" name="school" value="{{ $product->school }}"> 
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
       <input type="text" name="price" value="{{ $product->price }}" required autocomplete="off" placeholder="The price you ask*" /> 
      </div><!--field-wrap--> 
     <select class="dropdown" name="category" value="{{ $product->category_id}}"> 
      <option value="1">Books</option> 
      <option value="2">Others</option> 
     </select> 
    </div> 
    <div class="field-wrap">
      @if ($errors->has('excerpt'))                    
          <span class="errors">{{ $errors->first('excerpt') }}</span>                 
       @endif
     <textarea name="excerpt" class="excerpt" placeholder="Excerpt">{{ $product->excerpt }}</textarea> 
    </div><!--field-wrap--> 
    <div class="field-wrap">
     @if ($errors->has('description'))                    
          <span class="errors">{{ $errors->first('description') }}</span>                 
     @endif
     <textarea name="description" class="description" placeholder="Description">{{ $product->description }}</textarea> 
    </div><!--field-wrap--> 
     <button type="submit" class="button button-block"/>Update</button> 
</form>
  </div>
</div>
@endsection