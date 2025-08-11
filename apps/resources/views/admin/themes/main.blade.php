<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('page-title')</title>

        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/jquery-bar-rating/css-stars.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/admin/css/demo_1/style.css') }}" />
        <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" />

    </head>
    <body>
        <div class="container-scroller">

            {{-- Side Navigation Bar --}}
            @include('admin.themes.sidenav')

            <div class="container-fluid page-body-wrapper">
                {{-- Top Navbar --}}
                <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                    <div class="navbar-menu-wrapper d-flex align-items-stretch">
                        {{-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-chevron-double-left"></span>
                        </button> --}}
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email-outline"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                    <img src="assets/admin/images/faces/face1.jpg" alt="image" class="profile-pic">
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                    <img src="assets/admin/images/faces/face6.jpg" alt="image" class="profile-pic">
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                    <img src="assets/admin/images/faces/face7.jpg" alt="image" class="profile-pic">
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">

                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-toggle="offcanvas"><span class="mdi mdi-menu"></span></button>
                    </div>
                </nav>
                {{-- END Top Navbar --}}

                <div class="main-panel">
                    <div class="content-wrapper pb-0"> @yield('page-body') </div>

                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ima.sirikotiamadrasha.com 2025</span>
                        </div>
                        <div>
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Developed By: <a href="anis14109@gmail.com" target="_blank">Anisur Rahman</a></span>
                        </div>
                    </footer>
                </div>

            </div>

        </div>

        <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
        {{-- <script src="{{ asset('assets/admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/vendors/chart.js/Chart.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.resize.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.categories.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.fillbetween.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.stack.js') }}"></script> --}}
        <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
        {{-- <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script> --}}
        <script src="{{ asset('assets/admin/js/misc.js') }}"></script>
        {{-- <script src="{{ asset('assets/admin/js/settings.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/js/todolist.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script> --}}
    </body>
</html>
