@extends('admin.themes.main')

@section('page-title') Monthly Attendance Sheet @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

    @include('admin.settings.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Academic Years
                </h5>
                <a href="{{ route('academic-years.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>Add Years</span>
                </a>
            </div>
            <div class="card-body">

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

            </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- Datatable -->
    <script >
      const table = new DataTable('#DataTable', {
          lengthMenu: [
              [-1, 10, 25, 50],
              ['All',10, 25, 50]
          ],
          order: [[0, 'asc']],
          scrollX: true,
          layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf',
                {
                    text: 'JSON',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        DataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
                    }
                },
                {
                  extend: 'print',
                  exportOptions: {
                    columns: ':visible'
                  },
                  autoPrint: false
                },
                {
                    extend: 'colvis',
                    collectionLayout: 'fixed columns',
                    popoverTitle: 'Column visibility control',
                    postfixButtons: ['colvisRestore']
                },
                ]
            },
            topEnd: 'search',
            bottomStart: 'pageLength',
            bottomEnd: 'info'
          }
      });
    </script>
    <!-- Datatable -->
@endsection
