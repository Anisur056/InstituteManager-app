<div class="row  dashboard_heading mb-3">
    <div class="card fixed-tab col-12 col-md-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link"
                    href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('students.create') ) {{ 'active' }} @endif "
                    href="{{ route('students.create') }}">New Admission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if(Route::is('students.index') ) {{ 'active' }} @endif "
                    href="{{ route('students.index') }}">Student List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="{{ route('attendance.sheet.student') }}">Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-0 " href="">Ex Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-0 " href="">Take Fees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-0 " href="">ID Card</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mt-0 " href="">Seat Sticker</a>
            </li>
        </ul>
    </div>
</div>
