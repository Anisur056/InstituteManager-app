<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Attendance Sheet</title>
<!-- Bootstrap 5 CSS CDN -->
<link href="https://www.google.com/search?q=https://cdn.jsdelivr.net/npm/bootstrap%405.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
/* Add some custom styling for the table borders /
table, th, td {
border-collapse: collapse;
border: 1px solid #dee2e6;
}
/ Sticky column for the user's name */
.sticky-col {
position: sticky;
left: 0;
background-color: #fff;
z-index: 10;
}
</style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100 p-4">

<div class="card shadow-lg p-4 w-100" style="max-width: 96rem;">
    <h1 class="text-center text-dark mb-4">Monthly Attendance Sheet</h1>
    <h2 class="text-center text-secondary mb-4">{{ $month }}</h2>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-sm">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="sticky-col">ID</th>
                    <th scope="col" class="sticky-col">User</th>
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
                            {{ $userAttendance['id'] }}
                        </td>
                        <td class="text-start fw-bold sticky-col">
                            {{ $userAttendance['user_name'] }}
                        </td>
                        @foreach ($userAttendance['records'] as $status)
                            @php
                                $colorClass = '';
                                switch ($status) {
                                    case '4':
                                        $colorClass = 'bg-success text-white';
                                        $text = 'P';
                                        break;
                                    case 'N':
                                        $colorClass = 'bg-danger text-white';
                                        $text = 'N/A';
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
                                {{-- {{ substr(strtoupper($status), 0, 1) }} --}}
                                {{ $text }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="mt-4 text-center text-muted">
        P = Present, A = Absent, L = Leave, N/A = Not Recorded
    </p>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
