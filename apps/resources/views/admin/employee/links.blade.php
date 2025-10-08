<div class="row  dashboard_heading mb-3">
    <div class="card fixed-tab col-12 col-md-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link"
                    href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('employee.create') ) {{ 'active' }} @endif "
                    href="{{ route('employee.create') }}">New Appoinment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if(Route::is('employee.index') ) {{ 'active' }} @endif "
                    href="{{ route('employee.index') }}">Employee List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="{{ route('attendance.sheet.employee') }}">Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if(Route::is('employee.ex') ) {{ 'active' }} @endif "
                    href="{{ route('employee.ex') }}">Ex Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-0 " href="">Appoinment Letter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-0 " href="">ID Card</a>
            </li>
        </ul>
    </div>
</div>
