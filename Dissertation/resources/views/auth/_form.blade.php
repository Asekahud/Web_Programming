<div class="form">
    <ul class="tab-group">
      <li class ="tab active"><a href="#signup">Sign Up</a></li>
      <li class ="tab"><a href="#login">Log In</a></li>
    </ul>
        
    <div class="tab-content">
     <div id ="signup">
       <h1>Sign Up for Free</h1>
        <form action="{{ url('/register') }}" method="POST">
         {!! csrf_field() !!}
         <div class="top-row">
            <div class="field-wrap">
                <label>First Name<span class="req">*</span></label>
                <input type="text" name="firstname" required autocomplete="off" />
            </div><!--field-wrap-->
            
            <div class="field-wrap">
                <label>Last Name<span class="req">*</span></label>
                <input type="text" name="lastname" required autocomplete="off" />
            </div><!--field-wrap-->
            
         </div> <!--top row-->
        <div class="top-row">
         <div class="field-wrap">
                <label>Student ID<span class="req">*</span></label>
                <input type="text" name="student_id" required autocomplete="off" />
         </div><!--field-wrap-->
         
         <div class="field-wrap">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" required autocomplete="off" />
         </div><!--field-wrap-->
           </div>  
        <div class="field-wrap">
                <label>Set A Password <span class="req">*</span></label>
                <input type="password" name="password" required autocomplete="off" />
         </div><!--field-wrap-->
         <div class="field-wrap">
                <label>Confirm Password <span class="req">*</span></label>
                <input type="password" name="password_confirmation" required autocomplete="off" />
         </div><!--field-wrap-->  
         <button type="submit" class="button button-block"/>Register</button>            
        </form>             
     </div> <!--signup-->
     <div id="login">
        <h1>Welcome Back</h1>
        <form action="{{ url('/login') }} method="POST"">
        {!! csrf_field() !!}
        
         <div class="field-wrap">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" required autocomplete="off" />
         </div><!--field-wrap-->
         
         <div class="field-wrap">
                <label>Password <span class="req">*</span></label>
                <input type="password" name="password" required autocomplete="off" />
         </div><!--field-wrap-->
         
         <p class="forgot"><a href="{{ url('/password/reset') }}">Forgot Password?</a></p>
         
         <button class="button button-block"/>Log In</button>  
        </form>
     </div> <!--login-->
    </div> <!--tab content-->     
</div> <!--/form-->

 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type='text/javascript' src="{!! asset('/js/registration-form.js') !!}" ></script>
