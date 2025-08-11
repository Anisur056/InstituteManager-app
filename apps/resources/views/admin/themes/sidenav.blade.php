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
