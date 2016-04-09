<form class="container-4" action="{{ url('/product/search') }}" method="GET" novalidate>
    <input name="searchterm" type="search" id="searchterm" placeholder="Search..." />
    <button class="icon"><i class="fa fa-search"></i></button>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script type='text/javascript' src="{!! asset('js/search-form.js') !!}" ></script>
</form>

