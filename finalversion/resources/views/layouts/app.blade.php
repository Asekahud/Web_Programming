<!DOCTYPE html> 
<html lang="en">
<head> 
    <title>Laravel</title>   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{!! asset('/css/Style.css') !!}" rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet" type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">    
</head>
<body>
 <div id="main-navigation-container" class="clearfix"> 
   <div id="main-navigation"> 
    <ul class="navigation-menu"> 
      <li><a href="{{ url('/') }}">Home</a></li> 
      <li><a href="{{ url('/products') }}">Products</a> 
       <!--<ul class="navigation-sub-menu"> 
        <li><a href="">Books</a></li>         
        <li><a href="">Other</a></li> 
       </ul> -->
      </li> 
      <li><a href="">Events</a></li> 
      <li><a href="">About</a></li>
      <li id="userlogo"><a href="{{ url('/auth') }}">Guest</a>
        <ul class="navigation-sub-menu"> 
           <li><a href="{{ url('/addnew') }}">Add New</a>         
           <li><a href="">My Products</a></li>
           <li><a href="">My Events</a></li>
           <li><a href="">My Profile</a></li>
        </ul>
    </li>
      </li>
    </ul>    
   </div><!--main-navigation -->
   <div class="searchform">
      @include('layouts.search_box')
   </div>
 </div><!--main-navigation-container-->
 <div id="box-container">
     @yield('content')     
 </div>
</body>
</html>

             
