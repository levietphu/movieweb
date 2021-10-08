<!DOCTYPE html>
<html lang="en" class="dark-sidebar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{url('public/backend')}}/images/favicon-32x32.png" type="image/png" />
    @include('backend.layout.css')
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('backend.layout.sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('backend.layout.header')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-title-box d-flex align-items-center justify-content-between" style="padding-top: 30px">
                    <h4 class="mb-0 font-size-18">@yield('text')</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('text1')</a></li>
                            <li class="breadcrumb-item active">@yield('text')</li>
                        </ol>
                    </div>
                </div>
            @yield('content')
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        @include('backend.layout.footer')
        <!-- end footer -->
    </div>

    <!-- JavaScript -->
    @include('backend.layout.js')

</body>

</html>
