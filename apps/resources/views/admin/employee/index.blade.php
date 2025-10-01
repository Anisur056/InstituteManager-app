@extends('admin.themes.main')

@section('page-title') Employees @endsection

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
                    Employees  | <span class="ms-2 ">{{ $employees->count() }} Records </span>
                </h5>
                <a href="{{ route('employee.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>New Appoinment</span>
                </a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                    <thead>
                        <tr>
                            <th>Pic</th>
                            <th>Name <br>বাংলা</th>
                            <th>Designation</th>
                            <th>RFID Card</th>
                            <th>Contact <br>(Call)</th>
                            <th>Contact <br>(Whatsapp)</th>
                            <th>Profile</th>
                            <th>Edit</th>
                            <th>Send <br> SMS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $data)
                            <tr>
                            <td data-label="Pic: ">
                                <img class="rounded-3" width="100px" src="{{ asset( "assets/admin/$data->profile_pic" ) }}">
                            </td>
                            <td data-label="Name/ বাংলা " >
                                {{$data->name}}<br>
                                {{$data->name_bn}}
                            </td>
                            <td data-label="Designation: " class="text-start">
                                {{$data->role}}
                            </td>
                            <td data-label="RFID Card: " class="text-start">
                                {{$data->rfid_card}}
                            </td>
                            <td data-label="Contact (Call) ">
                                <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="tel:{{$data->contact_sms}}">
                                    {{$data->contact_sms}}
                                </a>
                            </td>
                            <td data-label="Contact (Whatsapp) ">
                                <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="https://wa.me/+88{{$data->contact_sms}}">
                                    {{$data->contact_sms}}
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
                                <a class="btn btn-success mb-1" href="{{ route('sms.create',$data->id) }}">
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

