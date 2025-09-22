@extends('admin.themes.main')

@section('page-title') Upload Attendance Logs @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')


<div class="card shadow-lg p-4 w-100" style="max-width: 96rem;">
    <h1 class="text-center text-dark mb-4">Monthly Attendance Sheet</h1>
    <h2 class="text-center text-secondary mb-4">{{ $month }}</h2>

    <!-- Filter Form -->
    <form class="mb-4" action="{{ url('/attendance/sheet') }}" method="GET">
        <div class="row g-3 align-items-center justify-content-center">
            <div class="col-md-auto">
                <label for="year" class="col-form-label">Year:</label>
                <select class="form-select" id="year" name="year">
                    @php $currentYear = date('Y'); @endphp
                    @for ($y = $currentYear - 5; $y <= $currentYear + 5; $y++)
                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-auto">
                <label for="month" class="col-form-label">Month:</label>
                <select class="form-select" id="month" name="month">
                    @foreach (range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $m == $currentMonth ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-auto">
                <label for="class" class="col-form-label">Class:</label>
                <select class="form-select" name="class">
                    @foreach ($tbl_classe as $c)
                        <option value="{{ $c->name_en }}" {{ $c->name_en == $class ? 'selected' : '' }}>{{ $c->name_en }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>

    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ url('/attendance/sheet?year=' . $prevMonthYear . '&month=' . $prevMonth . '&class=' . $class) }}" class="btn btn-outline-secondary">Previous Month</a>
        <a href="{{ url('/attendance/sheet?year=' . $nextMonthYear . '&month=' . $nextMonth . '&class=' . $class) }}" class="btn btn-outline-secondary">Next Month</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-sm">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="sticky-col">User</th>
                    <th scope="col" class="py-3 text-success">P</th>
                    <th scope="col" class="py-3 text-danger">A</th>
                    <th scope="col" class="py-3 text-warning">L</th>
                    <!-- Dynamically generate day headers for the month -->
                    @for ($i = 1; $i <= $daysInMonth; $i++)
                        <th scope="col" class="py-3">{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each user to display their attendance records -->
                @foreach ($attendanceData as $userAttendance)
                    <tr>
                        <td class="text-start fw-bold sticky-col">
                            {{ $userAttendance['user_name'] }}
                        </td>
                        <!-- Display the calculated totals -->
                        <td class="text-success">{{ $userAttendance['total_present'] }}</td>
                        <td class="text-danger">{{ $userAttendance['total_absent'] }}</td>
                        <td class="text-warning">{{ $userAttendance['total_leave'] }}</td>

                        @foreach ($userAttendance['records'] as $status)
                            @php
                                $colorClass = '';
                                $txt = '';
                                switch ($status) {
                                    case '4':
                                        $colorClass = 'bg-success text-white';
                                        $txt = 'P';
                                        break;
                                    case 'N':
                                        $colorClass = 'bg-danger text-black';
                                        $txt = 'A';
                                        break;
                                    case 'leave':
                                        $colorClass = 'bg-warning text-dark';
                                        break;
                                    default:
                                        $colorClass = 'bg-secondary text-white';
                                        break;
                                }
                            @endphp
                            <td class="{{ $colorClass }}">
                                <!-- Use the first letter of the status for a compact view -->
                                {{ $txt }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="mt-4 text-center text-muted">
        P = Present, A = Absent, L = Leave, N = Not Recorded
    </p>
</div>

@endsection

@section('js')

@endsection
