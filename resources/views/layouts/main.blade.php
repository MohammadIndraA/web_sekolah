<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MA AL-HIKMAH | @yield('title' ?? '')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('eduhome/img/logo.png') }}">
    <!-- App css -->
    <link href="{{ asset('design-sistem/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('design-sistem/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('design-sistem/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="dark-style">
    {{-- toast --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Datatables css -->
    <link href="{{ asset('design-sistem/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('design-sistem/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- datepicker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Quill css -->
    <link href="{{ asset('design-sistem/assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('design-sistem/assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    @yield('style')

</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('eduhome/img/logo/MAPK AL-HIKMAH.png') }}" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('eduhome/img/logo.png') }}" alt="" height="16">
                </span>
            </a>
            {{-- <h2>MA AL-HIKMAH</h2> --}}
            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('eduhome/img/logo/MAPK AL-HIKMAH.png') }}" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('eduhome/img/logo.png') }}" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                @include('layouts.sidebar')

                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                @include('layouts.header')
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            @include('layouts.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- bundle -->
    <script src="{{ asset('design-sistem/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('design-sistem/assets/js/app.min.js') }}"></script>
    <!-- Datatables js -->
    <script src="{{ asset('design-sistem/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('design-sistem/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('design-sistem/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('design-sistem/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    {{-- custom js --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Datatable Init js -->
    <script src="{{ asset('design-sistem/assets/js/pages/demo.datatable-init.js') }}"></script>
    {{-- datepicker --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- quill js -->
    <script src="{{ asset('design-sistem/assets/js/vendor/quill.min.js') }}"></script>
    <!-- quill Init js-->
    <script src="{{ asset('design-sistem/assets/js/pages/demo.quilljs.js') }}"></script>
    @yield('script')

</body>

</html>
