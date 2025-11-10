@extends('admin.themes.main')

@section('page-title') Students @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" /><!-- /Select2 -->
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

    <!-- Filter Form -->
    <div class="card mb-3 rounded-15">
        <div class="card-body">
            <form action="{{ route('students.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="institute_name" class="col-form-label">Institute Name:</label>

                        <select name="institute_name" class="form-control select2" onchange="this.form.submit()">
                            <option value="null">Select</option>
                            @foreach ($instituteInfo as $info)
                                {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                <option value="{{ $info->name_en }}" {{ (request('institute_name') == $info->name_en) ? 'selected' : '' }}>
                                    {{ $info->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto">
                        <label for="month" class="col-form-label">Month:</label>
                        <select class="form-select" id="month" name="month">
                            {{-- @foreach (range(1, 12) as $m)
                                <option value="{{ $m }}" {{ $m == $currentMonth ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="col-md-auto">
                        <label for="class" class="col-form-label">Class:</label>
                        <select class="form-select" name="class" onchange="this.form.submit()">
                            {{-- @foreach ($tbl_classe as $c)
                                <option value="{{ $c->name_en }}" {{ $c->name_en == $class ? 'selected' : '' }}>{{ $c->name_en }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </form>
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
                                <img class="rounded-3" width="100px" src="{{ optional($data)->profile_pic ? asset('assets/' . optional($data)->profile_pic) : 'assets\admin\img\users\user.png' }}">



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

    <!-- Select2 -->
    <script src="{{ asset('assets/admin/js/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <!-- /Select2 -->
@endsection

