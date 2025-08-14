<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="IMA-Institute Management Application">
    <meta name="author" content="IMA">
    <title>@yield('page-title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/logo/favicon.png') }}">

    <!-- Main Style -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <!-- Sidebar Menu -->
    <link href="{{ asset('assets/admin/css/metisMenu.css') }}" rel="stylesheet">

    <!-- Fonts- (Text & Icons) - online -->
    <link href="https://hrm.bdtask-demoserver.com/backend/assets/dist/css/barlow-font.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="fixed sidebar-mini ">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <div class="wrapper">
        <!-- Sidebar  -->
        @include('admin.themes.sidenav')

        <!-- Page Content  -->
        <div class="content-wrapper">
            <div class="main-content">
                <!--Navbar-->
                <nav class="navbar-custom-menu navbar navbar-expand-xl m-0 flex-row-reverse ">
                    <div class="sidebar-toggle-icon" id="sidebarCollapse">sidebar toggle<span></span></div>
                    <!--/.sidebar toggle icon-->
                    <!-- Collapse -->

                    <div class="navbar-icon">
                        <ul class="navbar-nav flex-row gap-3 align-items-center">

                            <li class="nav-item dropdown user-menu">
                                <a class="dropdown-toggle admin-btn me-2 me-sm-3 me-xl-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="admin-img me-1 me-sm-2" src="{{ asset(Auth::user()->profile_pic) }}" alt="Profile picture" />
                                </a>
                                <div class="dropdown-menu new-dropdown shadow">

                                    <div class="user-header">
                                        <div class="img-user">
                                            <img src="{{ asset(Auth::user()->profile_pic) }}" alt="Profile picture" />
                                        </div>
                                        <!-- img-user -->
                                        <h6>{{Auth::user()->full_name}}</h6>
                                        <span>{{Auth::user()->email}}</span>
                                        <span>{{Auth::user()->role}}</span>
                                    </div>
                                    <!-- user-header -->
                                    <div class="mb-3 text-center">
                                        <a href="https://hrm.bdtask-demoserver.com/dashboard/profile" class="color_1 fs-16">Manage your account</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <a href="{{ route('logout') }}" class="bg-smoke text-black rounded-3 px-3 py-2">Sign out</a>
                                        <button class="btn bg-smoke text-danger rounded-3 px-3 py-2">Close</button>
                                    </div>
                                </div>
                                <!--/.dropdown-menu -->
                            </li>
                        </ul>
                        <!--/.navbar nav-->
                    </div>
                </nav>
                <!--/.navbar-->
                <div class="body-content">

                    @yield('page-body')

                </div>
                <!--/.body content-->
            </div>

            <!--/.main content-->
            <footer class="footer-content d-print-none">
                <div class="footer-text d-flex align-items-center justify-content-between">
                    <div class="copy">© 2025 IMA, All Rights Reserved.</div>
                    <div class="credit">Developed by: <a href="mailto:anis14109@gmail.com" class="text-primary">Anisur Rahman</a></div>
                </div>
            </footer>
            <!--/.footer content-->

        </div>
        <!--/.wrapper-->
    </div>

    <script defer src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script defer src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('assets/admin/js/metisMenu.min.js') }}"></script>
    <script defer src="{{ asset('assets/admin/js/sidebar.js') }}"></script>
</body>

</html>
