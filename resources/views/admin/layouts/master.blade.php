<!doctype html>
<html lang="en">

@include('admin.layouts.head')

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('admin.layouts.header')

            @include('admin.layouts.leftbar')

            @yield('content')

        </div>
        <!-- END layout-wrapper -->

        @include('admin.layouts.footer_js')
    </body>

</html>