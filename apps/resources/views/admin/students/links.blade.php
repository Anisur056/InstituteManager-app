<style>
.fixed-tab .nav-scroll-wrapper{
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; /* smooth scrolling on iOS */
}
.fixed-tab .nav-tabs{
    min-width: max-content; /* prevent items from wrapping/squeezing */
}
.fixed-tab .nav-link{
    white-space: nowrap; /* keep single-line labels */
}
/* optional: nicer thin horizontal scrollbar */
.fixed-tab .nav-scroll-wrapper::-webkit-scrollbar{ height:8px; }
.fixed-tab .nav-scroll-wrapper::-webkit-scrollbar-thumb{ background: rgba(0,0,0,.15); border-radius:4px; }
</style>

<div class="row dashboard_heading mb-3">
    <div class="card fixed-tab col-12 col-md-12">
        <div class="nav-scroll-wrapper">
            <ul class="nav nav-tabs d-flex flex-row flex-nowrap">
                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::is('students.create')) active @endif"
                        href="{{ route('students.create') }}">New Admission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::is('students.index')) active @endif"
                        href="{{ route('students.index') }}">Student List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::is('online.admission.index')) active @endif"
                        href="{{ route('online.admission.index') }}">Online Admission List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Ex Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Take Fees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">ID Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::is('index.admit.card')) active @endif"
                        href="{{ route('index.admit.card') }}">Admit Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Seat Sticker</a>
                </li>
            </ul>
        </div>
    </div>
</div>
