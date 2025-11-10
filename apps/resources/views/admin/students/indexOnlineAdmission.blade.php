@extends('admin.themes.main')

@section('page-title') Online Admission List @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection


@section('page-body')

    @include('admin.students.links')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold text-success">
                    Online Admission | Total Records: {{ $records->count() }}
                </h5>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pic</th>
                            <th>Registration</th>
                            <th>Name</th>
                            <th>Division</th>
                            <th>Class</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Applied</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $data)
                            <tr>
                                <td data-label="#: ">
                                    {{ $data->id }}
                                </td>
                                <td data-label="Pic: ">
                                    <img class="rounded-3" width="50px" src="{{ optional($data)->profile_pic ? asset('assets/' . optional($data)->profile_pic) : 'assets\admin\img\users\user.png' }}">
                                </td>
                                <td data-label="Registration: " >
                                    {{$data->registration_id}}
                                </td>
                                <td data-label="Name: " >
                                    {{$data->name}}
                                </td>
                                <td data-label="Division: " >
                                    {{$data->division}}
                                </td>
                                <td data-label="Class: " >
                                    {{$data->class}}
                                </td>
                                <td data-label="Mobile: " >
                                    <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="tel:{{$data->contact_sms}}">
                                    {{$data->contact_sms}}
                                    </a>
                                </td>
                                <td data-label="Status: " >

                                    <span class="badge bg-warning text-dark">{{$data->status}}</span>
                                </td>
                                <td data-label="Apply Date: " >
                                    {{$data->created_at}}
                                </td>
                                <td data-label="Action: " >
                                    <a target="_blank" href="" class="btn btn-outline-success btn-rounded m-1">
                                        <i class="fa fa-print"></i>
								    </a>
                                    <a target="_blank" href="" class="btn btn-outline-success btn-rounded m-1">
                                        <i class="fa fa-file-pdf-o"></i>
								    </a>
                                    <a href="{{ route('online.admission.approved', ['reg' => $data->registration_id]) }}" class="btn btn-success btn-rounded m-1">
                                        <i class="fa fa-check"></i>
								    </a>
                                    <a target="_blank" href="" class="btn btn-danger btn-rounded m-1">
                                        <i class="fa fa-times"></i>
								    </a>
                                </td>

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

