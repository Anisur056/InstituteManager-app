@extends('admin.themes.main')

@section('page-title') Students @endsection

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

    <div class="row dashboard_heading mb-3">
        <div class="card fixed-tab col-12 col-md-12">
            <p class="fs-5 m-0 text-center border-bottom">Class List</p>
            <ul class="nav nav-tabs">
                @foreach ($classes as $class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('class', $class->name_en) }}">{{ $class->name_en }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold text-success">
                    Students  | <span class="ms-2 ">{{ $records->count() }} Records </span>
                </h5>
                <a href="{{ route('students.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>New Admission</span>
                </a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                    <thead>
                        <tr>
                            <th>Pic</th>
                            <th>Information</th>
                            <th>RFID Card</th>
                            <th>Contact <br>(Call)</th>
                            <th>Contact <br>(Whatsapp)</th>
                            <th>Profile</th>
                            <th>Edit</th>
                            <th>Send <br> SMS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $data)
                            <tr>
                            <td data-label="Pic: ">
                                <img class="rounded-3" width="100px" src="{{ asset( "assets/$data->profile_pic" ) }}">
                            </td>
                            <td data-label="Information:- " >
                                {{$data->name}}<br>
                                {{$data->name_bn}} <br>
                                Designation: {{$data->role}} <br>
                                Class: {{$data->class}} <br>
                                Roll: {{$data->roll}} <br>
                                @if ($data->sms_status === 'on')
                                    <span class="badge bg-success text-bg-success">SMS On</span>
                                @else
                                    <span class="badge bg-danger text-bg-danger">SMS Off</span>
                                @endif
                            </td>
                            <td data-label="RFID Card: " class="text-start">
                                {{$data->rfid_card}}
                            </td>
                            <td data-label="Contact (Call): ">
                                <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="tel:{{$data->contact_sms}}">
                                    {{$data->contact_sms}}
                                </a>
                            </td>
                            <td data-label="Contact (Whatsapp): ">
                                <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="https://wa.me/+88{{$data->contact_whatsapp}}">
                                    {{$data->contact_whatsapp}}
                                </a>
                            </td>
                            <td data-label="Profile: ">
                                <a class="btn btn-primary mb-1" href="{{ route('students.show',$data->id) }}">
                                    <i class="fa fa-user me-1"></i>
                                </a>
                            </td>
                            <td data-label="Update: ">
                                <a class="btn btn-warning mb-1" href="{{ route('students.edit',$data->id) }}">
                                    <i class="fa fa-pencil-square-o  me-1"></i>
                                </a>
                            </td>
                            <td data-label="Send SMS: ">
                                <a class="btn btn-success mb-1" href="{{ route('sms.create',$data->id) }}" target=”_blank”>
                                    <i class="fa fa-comments me-1"></i>
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

