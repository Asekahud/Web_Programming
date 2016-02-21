<!DOCTYPE html> 
<html lang="en">
<head> 

    <title>Laravel</title>   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{!! asset('/css/Style.css') !!}" rel='stylesheet' type='text/css'>
</head>
<body>
 <div id="main-navigation-container" class="clearfix"> 
   <div id="main-navigation"> 
    <ul class="navigation-menu"> 
      <li><a href="{{ url('/') }}">Home</a></li> 
      <li><a href="">Products</a> 
      <!-- <ul class="navigation-sub-menu"> 
        <li><a href="">Books</a></li>         
        <li><a href="">Other</a></li> 
       </ul> 
      </li> -->
      <li><a href="">Events</a> 
      <!-- <ul class="navigation-sub-menu"> 
        <li><a href="">Sub Menu Item 1</a></li> 
        <li><a href="">Sub Menu Item 2</a></li> 
        <li><a href="">Sub Menu Item 3</a></li> 
        </ul> -->
      </li> 
      <li><a href="">About</a> 
      <!-- <ul class="navigation-sub-menu"> 
        <li><a href="">Sub Menu Item 1</a></li> 
        <li><a href="">Sub Menu Item 2</a></li> 
        <li><a href="">Sub Menu Item 3</a></li> 
       </ul> -->
      </li> 
      <li><a href="">User</a> 
      <!-- <ul class="navigation-sub-menu"> 
        <li><a href="">Sub Menu Item 1</a></li> 
        <li><a href="">Sub Menu Item 2</a></li> 
        <li><a href="">Sub Menu Item 3</a></li> 
       </ul> -->
      </li> 
    </ul> 
   </div><!--main-navigation -->
 </div><!--ain-navigation-container-->
 <div id="box-container">
     @yield('content')  
 </div> 
</body>
</html>

             
