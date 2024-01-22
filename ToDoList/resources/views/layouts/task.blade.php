@include('elements.head' )
@include('elements.header' )
  
<div id = "main" class = "d-flex justify-content-center flex-column align-items-center">
    @yield('content')
</div>
   
@include('elements.footer' )