<h1>Monthly Attendance Sheet</h1>

<form action="{{ route('attendance-sheet') }}" method="GET">
    <label for="month">Month:</label>
    <div class="col-md-4 input-group text-left" style="display:flex;">
        <select class="form-control" name="month" required="">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>

        <select class="form-control" name="year" required="">
        <option value="">--Year--</option>
        <option value="2024">2024</option><option value="2025" selected="">2025</option> 
        </select>
        </div>
    <button type="submit">Select</button>
</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            @php
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            @endphp
            @for ($day = 1; $day <= $daysInMonth; $day++)
                <th>{{ $day }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $data)
            <tr>
                <td> Users..</td>
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    <td>
                        {{-- @php
                            $date = "{$year}-{$month}-" . sprintf('%02d', $day);
                            $attendanceStatus = $userAttendance->firstWhere('date', $date);
                        @endphp
                        {{ $attendanceStatus ? $attendanceStatus->status : 'N/A' }} --}}
                    </td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>