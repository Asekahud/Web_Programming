<!DOCTYPE html> 
<html lang="en">
<head> 
    <title>Laravel</title>    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{!! asset('/css/Style.css') !!}" rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet" type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="_token" content="{!! csrf_token() !!}"/>
</head>
<body>
 <div id="main-navigation-container" class="clearfix"> 
   <div id="main-navigation"> 
    <ul class="navigation-menu"> 
      <li><a href="{{ url('/') }}">Home</a></li> 
      <li><a href="{{ url('/products') }}">Products</a></li> 
      <li><a href="{{ url('/events') }}">Events</a></li> 
      <li><a href="">About</a></li>
      @if (Auth::guest())
      <li id="userlogo"><a href="{{ url('/auth') }}">Guest</a>
      @else
      <li id="userlogo"><a href="{{ url('/') }}">{{ Auth::user()->firstname }} </a>
        <ul class="navigation-sub-menu"> 
           <li><a href="{{ url('/addnew') }}">Add New</a>         
           <li><a href="{{ url('/myproducts') }}">My Stuff</a></li>
           <li><a href="{{ url('/myevents') }}">My Events</a></li>
           <li><a href="{{ url('/mychats') }}">My Events</a></li>
           <li><a href="{{ url('/logout') }}">Log Out</a> 
        </ul>
     </li>
     @endif
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
  <script type="text/javascript"> 
      $.ajaxSetup({ 
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') } 
      }); 
</script>
</body>
</html>

             
