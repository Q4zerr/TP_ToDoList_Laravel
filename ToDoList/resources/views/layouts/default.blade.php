@include('elements.head' )
@include('elements.header' )
  
<div id = "main" class = "d-flex justify-content-center flex-column align-items-center" style="min-height:85vh;">
    @yield('content')
</div>
   
@include('elements.footer' )