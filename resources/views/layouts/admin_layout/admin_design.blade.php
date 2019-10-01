<!DOCTYPE html>
<html lang="en">
<body>

<!--Header-part-->


    @include('layouts.admin_layout.admin_header')

<!--close-Header-part-->


<!--sidebar-menu-->
  @include('layouts.admin_layout.admin_sidebar')
<!--sidebar-menu-->

<!--main-container-part-->
@yield('content')


<!--end-main-container-part-->

<!--Footer-part-->
  @include('layouts.admin_layout.admin_footer')
<!--end-Footer-part-->
</body>
</html>
