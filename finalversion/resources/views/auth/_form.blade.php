<div class="form">
    <ul class="tab-group">
      <li class ="tab active"><a href="#signup">Sign Up</a></li>
      <li class ="tab"><a href="#login">Log In</a></li>
    </ul>        
    <div class="tab-content">
     <div id ="signup">
       <h1>Sign Up for Free</h1>
        <form action="{{ url('/register') }}" method="POST" novalidate>
         {!! csrf_field() !!}
                        
        <div class="field-wrap">
                  @if ($errors->has('firstname'))                    
                    <span class="errors">{{ $errors->first('firstname') }}</span>                 
                  @endif                                
                <input type="text" name="firstname" required autocomplete="off" placeholder="First Name*"/>
        </div><!--field-wrap-->
        
        <div class="field-wrap">
               @if ($errors->has('lastname'))                    
                  <span class="errors">{{ $errors->first('lastname') }}</span>            
                @endif              
                <input type="text" name="lastname" required autocomplete="off" placeholder="Last Name*"/>
        </div><!--field-wrap-->
                       
        <div class="field-wrap">
             @if ($errors->has('email'))                    
                <span class="errors">{{ $errors->first('email') }}</span>           
             @endif               
                <input type="email" name="email" required autocomplete="off" placeholder="Email Address*" />
         </div><!--field-wrap-->
                   
        <div class="field-wrap">
         @if ($errors->has('password'))                    
            <span class="errors">{{ $errors->first('password') }}</span>       
          @endif                
                <input type="password" name="password" required autocomplete="off" placeholder="Set A Password*"/>
         </div><!--field-wrap-->        
         <div class="field-wrap">
          @if ($errors->has('password_confirmation'))                    
            <span class="errors">{{ $errors->first('password_confirmation') }}</span>              
          @endif               
                <input type="password" name="password_confirmation" required autocomplete="off" placeholder="Confirm Password*" />
         </div><!--field-wrap-->  
         <button type="submit" class="button button-block"/>Register</button>            
        </form>             
     </div> <!--signup-->
     <div id="login">
        <h1>Welcome Back</h1>
        <form action="{{ url('/login') }}" method="POST" novalidate>
        {!! csrf_field() !!}
        
         <div class="field-wrap">
         @if ($errors->has('email_in'))                    
                <span class="errors">{{ $errors->first('email_in') }}</span>           
         @endif 
                <input type="email" name="email_in" required autocomplete="off" placeholder="Email Address*"/>
         </div><!--field-wrap-->
         
         <div class="field-wrap">       
                <input type="password" name="password_in" required autocomplete="off" placeholder="Password*" />
         </div><!--field-wrap-->       
         
         <button class="button button-block"/>Log In</button>  
        </form>
     </div> <!--login-->
    </div> <!--tab content-->     
</div> <!--/form-->

 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type='text/javascript' src="{!! asset('/js/registration-form.js') !!}" ></script>
