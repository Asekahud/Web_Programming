<form action="{{ url('product/test') }}" method="POST" novalidate>
 {!! csrf_field() !!}
 <div class="field-wrap">
  <input type="email" name="email_in" required autocomplete="off" placeholder="Email Address*"/> 
  </div><!--field-wrap--> 
  <div class="field-wrap"> 
   <input type="password" name="password_in" required autocomplete="off" placeholder="Password*" /> 
   </div><!--field-wrap--> 
   <button class="button button-block"/>Add Event</button>
</form> 