<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>IMA </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/demo_1/style.css') }}" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" />
    
  </head>
  <body>
    <div class="container-scroller">

      <!-- Nav Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile border-bottom">
              <div class="nav-link flex-column">
                <div class="nav-profile-image">
                  <img src="{{Auth::user()->profile_pic}}" alt="profile" />
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                  <p class="font-weight-semibold mb-1 mt-2 text-center">{{Auth::user()->full_name}}</p>
                  <p class="text-secondary icon-sm text-center">{{Auth::user()->role}}</p>
                  <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">
                    <i class="mdi mdi-logout-variant"></i>
                    Logout
                  </a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            {{-- Employee Panel --}}
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="false">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Employees</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="employee">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Add Employee</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Employee List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Ex Employee</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Class Teacher</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Appointment Letter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">ID Card</a>
                  </li>
                </ul>
              </div>
            </li>

            {{-- Student Panel --}}
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#student" aria-expanded="false">
                <i class="mdi mdi-account-network menu-icon"></i>
                <span class="menu-title">Students</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="student">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Student Admission</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Student List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Ex Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Take Fees</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">ID Card</a>
                  </li>
                </ul>
              </div>
            </li>

            {{-- Attendance Panel --}}
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#attendance" aria-expanded="false">
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                <span class="menu-title">Attendance</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="attendance">
                <ul class="nav flex-column sub-menu">

                  <span class="pl-1 text-gray">Employees</span>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Take Attendance</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Attendance List</a>
                  </li>

                  <span class="pl-1 text-gray">Students</span>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Take Attendance</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Attendance List</a>
                  </li>

                </ul>
              </div>
            </li>

            {{-- Examination Panel --}}
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#examination" aria-expanded="false">
                <i class="mdi mdi-school menu-icon"></i>
                <span class="menu-title">Examination</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="examination">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Download Admit Card</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Seat Sticker</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Attendance Sheet</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Result Publish</a>
                  </li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>
      <!-- END Nav Sidebar -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
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
            <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper pb-0">


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ima.sirikotiamadrasha.com 2025</span>
            </div>
            <div>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Developed By: <a href="anis14109@gmail.com" target="_blank">Anisur Rahman</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('') }}assets/admin/vendors/js/vendor.bundle.base.js"></script>
    
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.stack.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/admin/js/misc.js') }}"></script>
    <script src="{{ asset('assets/admin/js/settings.js') }}"></script>
    <script src="{{ asset('assets/admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>