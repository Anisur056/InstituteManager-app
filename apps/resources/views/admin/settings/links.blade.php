<div class="row  dashboard_heading mb-3">
    <div class="card fixed-tab col-12 col-md-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link @if(Route::is('institutes.index') ) {{ 'active' }} @endif "
                    href="{{ route('institutes.index') }}">Institute List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('academic-years.index') ) {{ 'active' }} @endif "
                href="{{ route('academic-years.index') }}">Academic Year</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('class.index') ) {{ 'active' }} @endif "
                href="{{ route('class.index') }}">Class Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('shifts.index') ) {{ 'active' }} @endif "
                href="{{ route('shifts.index') }}">Shift Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('sections.index') ) {{ 'active' }} @endif "
                href="{{ route('sections.index') }}">Section Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('exam-terms.index') ) {{ 'active' }} @endif "
                href="{{ route('exam-terms.index') }}">Exam Terms</a>
            </li>
        </ul>
    </div>
</div>





