@extends('admin.themes.main')

@section('page-title') Attendance Device Log @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

<a href="{{ route('device.sync') }}" class="btn btn-primary m-3">Sync</a>
<a href="{{ route('device.log') }}" class="btn btn-primary m-3">Refresh</a>
<div class="card shadow-lg p-4 w-100" style="max-width: 96rem;">
    <h1 class="text-center text-dark mb-4">Attendance Device Log</h1>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-sm" id="dataTable">
            <thead class="bg-light">
                <tr>
                    <th class="">uid</th>
                    <th class="">id</th>
                    <th class="">state</th>
                    <th class="">timestamp</th>
                    <th class="">type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendance_logs as $log)
                    <tr>
                        <td class="">{{ $log['uid'] }}</td>
                        <td class="">{{ $log['id'] }}</td>
                        <td class="">{{ $log['state'] }}</td>
                        <td class="">{{ $log['timestamp'] }}</td>
                        <td class="">{{ $log['type'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
    <!-- Datatable -->
    <script >
      const table = new DataTable('#dataTable', {
          lengthMenu: [
              [-1, 10, 25, 50],
              ['All',10, 25, 50]
          ],
          order: [],
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
