@extends('admin.themes.main')

@section('page-title') Attendance Device Users @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')


@if (session('message'))
    <div class="alert alert-primary">
        {{ session('message') }}
    </div>
@endif

@isset($users)

<a href="{{ route('device.user') }}" class="btn btn-success m-3">Refresh</a>
<a href="{{ route('device.user.bulk') }}" class="btn btn-success m-3">All User Upload</a>
<a href="{{ route('device.user.destroy') }}" class="btn btn-danger m-3">Destroy All User</a>

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
                        <th class="">Delete</th>
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
                                <td class="">
                                    <a href="{{ route('device.user.remove',$u['uid']) }}" class="btn btn-sm btn-danger">x</a>
                                </td>
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
            topStart:'info',
            topEnd: 'search',
            bottomStart: 'pageLength',
            bottomEnd:  {
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
          }
      });
    </script>
    <!-- Datatable -->
@endsection
