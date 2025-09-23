@extends('admin.themes.main')

@section('page-title') Attendance Device Info @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

@if (isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif

<div class="card shadow-lg p-4 w-100" style="max-width: 96rem;">
    <h1 class="text-center text-dark mb-4">Attendance Device Info</h1>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-sm" id="dataTable">
            <thead class="bg-light">
                <tr>
                    <th class="">id</th>
                    <th class="">name</th>
                    <th class="">ip</th>
                    <th class="">port</th>
                    <th class="">serialNumber</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($device as $i)
                    <tr>
                        <td class="">{{ $i['id'] }}</td>
                        <td class="">{{ $i['name'] }}</td>
                        <td class="">{{ $i['ip'] }}</td>
                        <td class="">{{ $i['port'] }}</td>
                        <td class="">{{ $i['serialNumber'] }}</td>
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
