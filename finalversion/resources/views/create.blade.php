@extends('layouts.app')
@section('content')
<div class="form"> 
  <ul class="tab-group"> 
   <li class ="tab active"><a href="#addproduct">Product</a></li> 
   <li class ="tab"><a href="#addevent">Event</a></li> 
</ul> 
<div class="tab-content"> 
  <div id ="addproduct"> 
    <h1>Product Details</h1> 
      @include('product._form')
</div> <!--product--> 
<div id="addevent"> 
  <h1>Event Details</h1> 
      @include('event._form')
  </div> <!--event--> 
</div> <!--tab content--> 
</div> <!--/form-->
 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type='text/javascript' src="{!! asset('/js/registration-form.js') !!}" ></script>
@endsection