@extends('admin.themes.main')

@section('page-title') SMS Logs @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection


@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold text-success">
                    SMS Logs  | <span class="ms-2 ">{{ $smsLogs->count() }} Records </span>
                </h5>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Send To</th>
                            <th>Send SMS</th>
                            <th>Send Time</th>
                            <th>Response Code</th>
                            <th>message ID</th>
                            <th>Success Message</th>
                            <th>Error Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smsLogs as $data)
                            <tr>
                                <td data-label="ID " > {{$data->id}} </td>
                                <td data-label="Send To " > {{$data->send_to}} </td>
                                <td data-label="Send SMS " > {{$data->send_sms}} </td>
                                <td data-label="Send Time " > {{$data->timestamps}} </td>
                                <td data-label="Response Code " > {{$data->response_code}} </td>
                                <td data-label="message ID " > {{$data->message_id}} </td>
                                <td data-label="Success Message " > {{$data->success_message}} </td>
                                <td data-label="Error Message " > {{$data->error_message}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $smsLogs->links('pagination::bootstrap-5') }}
            </div>
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

