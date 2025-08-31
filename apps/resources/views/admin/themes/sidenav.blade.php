<nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand w-100">
            <img class="sidebar-logo sidebar_brand_icon w-100" src="{{ asset('assets/admin/img/logo/logo.png') }}" alt="Logo">
            {{-- <img class="collapsed-logo" src="https://hrm.bdtask-demoserver.com/storage/application/1716900212sidebar-collapsed-logo.png" alt="Logo"> --}}
        </a>
    </div>
    <!--/.sidebar header-->
    <div class="sidebar-body">
        <div class="search sidebar-form">
            <div class="search__inner sidebar-search">
                <input id="search" type="text" class="form-control search__text" placeholder="Menu Search..." autocomplete="off">
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="mm-active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Employee Panel --}}
                <li class="">
                    <a class="has-arrow material-ripple" href="#">
                        <i class="fa fa-user"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="nav-second-level ">
                        <li class="">
                            <a class="dropdown-item" href="">Add Employee</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Employee List</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Ex Employee</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Class Teacher</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Appointment Letter</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">ID Card</a>
                        </li>
                    </ul>
                </li>

                {{-- Student Panel --}}
                <li class="">
                    <a class="has-arrow material-ripple" href="#">
                        <i class="fa fa-users"></i>
                        <span> Students</span>
                    </a>
                    <ul class="nav-second-level ">
                        <li class="">
                            <a class="dropdown-item" href="">New Admission</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('students.index') }}">Student List</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Ex Student</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Take Fees</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">ID Card</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Seat Sticker</a>
                        </li>
                    </ul>
                </li>

                {{-- Attendance Panel --}}
                <li class="">
                    <a class="has-arrow material-ripple" href="#">
                        <i class="fa fa-hand-paper-o"></i>
                        <span> Attendance</span>
                    </a>
                    <ul class="nav-second-level ">
                        <span class="ms-5">Employees</span>
                        <li class="">
                            <a class="dropdown-item" href="">Take Attendance</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Attendance List</a>
                        </li>

                        <span class="ms-5">Students</span>
                        <li class="">
                            <a class="dropdown-item" href="">Take Attendance</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Take Attendance</a>
                        </li>

                    </ul>
                </li>

                {{-- Examination Panel --}}
                <li class="">
                    <a class="has-arrow material-ripple" href="#">
                        <i class="fa fa-graduation-cap"></i>
                        <span> Examination</span>
                    </a>
                    <ul class="nav-second-level ">
                        <li class="">
                            <a class="dropdown-item" href="">Attendance Sheet</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="">Result Publish</a>
                        </li>
                    </ul>
                </li>

                {{-- Weside Panel --}}
                <li class="">
                    <a class="has-arrow material-ripple" href="#">
                        <i class="fa fa-globe"></i>
                        <span> Website Settings</span>
                    </a>
                    <ul class="nav-second-level ">
                        <li class="">
                            <a class="dropdown-item" href="">Notice</a>
                        </li>
                    </ul>
                </li>

                {{-- Settings Panel --}}
                <li class="">
                    <a class="has-arrow material-ripple" href="#">
                        <i class="fa fa-cogs"></i>
                        <span> Settings</span>
                    </a>
                    <ul class="nav-second-level ">
                        <li class="">
                            <a class="dropdown-item" href="{{ route('institutes.index') }}">Institute Management</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('academic-years.index') }}">Academic Year</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('class.index') }}">Class Management</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('shifts.index') }}">Shift Management</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('sections.index') }}">Section Management</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('groups.index') }}">Group Management</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('exam-terms.index') }}">Exam Terms</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
    <!-- sidebar-body -->
</nav>
