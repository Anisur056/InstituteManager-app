@extends('admin.themes.main')

@section('page-title') Attendance Device Users @endsection

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

@isset($users)
    <div class="card shadow-lg p-4 w-100" style="max-width: 96rem;">
        <h1 class="text-center text-dark mb-4">Attendance Device Users</h1>

        <div class="table-responsive">
            <table class="table table-bordered text-center table-sm" id="dataTable">
                <thead class="bg-light">
                    <tr>
                        <th class="">uid</th>
                        <th class="">userid</th>
                        <th class="">name</th>
                        <th class="">role</th>
                        <th class="">password</th>
                        <th class="">cardno</th>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($users as $u)
                            <tr>
                                <td class="">{{ $u['uid'] }}</td>
                                <td class="">{{ $u['userid'] }}</td>
                                <td class="">{{ $u['name'] }}</td>
                                <td class="">{{ $u['role'] }}</td>
                                <td class="">{{ $u['password'] }}</td>
                                <td class="">{{ $u['cardno'] }}</td>
                            </tr>
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endisset

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
