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

    <div class="col-12 ">

        <div class="card h-100 rounded-15 mb-3">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold text-success">
                    Filter Records
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('students.index') }}" method="GET">
                    <div class="row">
                        <div class=" col-sm-6 col-12">
                            <label for="class" class="col-form-label">Class:</label>
                            <select name="class" class="form-control select2" >
                                <option value="">Select</option>
                                @foreach ($classes as $info)
                                    {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                    <option value="{{ $info->name_en }}" {{ (request('class') == $info->name_en) ? 'selected' : '' }}>
                                        {{ $info->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-sm-6 col-12">
                            <button type="submit" class="btn btn-success mt-4">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if ($users->isNotEmpty())
            <div class="card h-100 rounded-15">
                <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                    <h5 class="m-0 fs-18 fw-semi-bold text-success">
                        Students  | <span class="ms-2 ">{{ $users->count() }} Records </span>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                        <thead>
                            <tr>
                                <th>Pic</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>Father Name</th>
                                <th>RFID</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                <td data-label="Pic: ">
                                    <img class="rounded-3" width="64px" src="{{ optional($data)->profile_pic ? asset('assets/' . optional($data)->profile_pic) : 'assets/admin/img/users/user.png' }}">
                                </td>
                                <td data-label="নাম" >
                                    {{$data->name_bn}} <br>
                                </td>
                                <td data-label="Roll" >
                                    {{$data->roll}} <br>
                                </td>
                                <td data-label="Class" >
                                    {{$data->class}} <br>
                                </td>
                                <td data-label="Father Name" >
                                    {{$data->father_name_bn}} <br>
                                </td>
                                <td data-label="RFID" >
                                    {{$data->rfid_card}} <br>
                                </td>
                                <td data-label="Contact (Call): ">
                                    {{-- SMS Contact --}}
                                    @if ($data->contact_sms)
                                        <a class="text-decoration-none text-primary text-center font-weight-bold d-block">
                                            {{$data->contact_sms}} <i class="fa fa-comments me-1"></i>
                                        </a>
                                    @else
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block"><i class="fa fa-comments me-1"></i> N/A</a>
                                    @endif

                                    {{-- SMS Status --}}
                                    @if ($data->sms_status === 'on')
                                        <center><span class="badge bg-success text-bg-success">SMS On</span></center>
                                    @else
                                        <center><span class="badge bg-danger text-bg-danger">SMS Off</span></center>
                                    @endif

                                    {{-- Father Mobile Contact --}}
                                    @if ($data->father_contact)
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block" target="_blank" href="tel:{{$data->father_contact}}">
                                            {{$data->father_contact}} (f) <i class="fa fa-phone" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block">(F) <i class="fa fa-phone" aria-hidden="true"></i> N/A</a>
                                    @endif

                                    {{-- Father Whatsapp Contact --}}
                                    @if ($data->father_contact)
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block" target="_blank" href="https://wa.me/88{{ str_replace('-', '', $data->father_contact) }}">
                                            {{$data->father_contact}} (f) <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block">(F) <i class="fa fa-whatsapp" aria-hidden="true"></i> N/A</a>
                                    @endif

                                    {{-- Mother Mobile Contact --}}
                                    @if ($data->mother_contact)
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block" target="_blank" href="tel:{{$data->mother_contact}}">
                                            {{$data->mother_contact}} (M) <i class="fa fa-phone" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block">(M) <i class="fa fa-phone" aria-hidden="true"></i> N/A</a>
                                    @endif

                                    {{-- Mother Whatsapp Contact --}}
                                    @if ($data->mother_contact)
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block" target="_blank" href="https://wa.me/88{{ str_replace('-', '', $data->mother_contact) }}">
                                            {{$data->mother_contact}} (M) <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a class="text-decoration-none text-success text-center font-weight-bold d-block">(M) <i class="fa fa-whatsapp" aria-hidden="true"></i> N/A</a>
                                    @endif
                                </td>
                                <td data-label="Actions: ">
                                    <a class="btn btn-primary mb-1" href="{{ route('students.show',$data->id) }}">
                                        <i class="fa fa-user me-1"></i>
                                    </a>
                                    <a class="btn btn-warning mb-1" href="{{ route('students.edit',$data->id) }}">
                                        <i class="fa fa-pencil-square-o  me-1"></i>
                                    </a>
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
        @else
            <div class="card h-100 rounded-15">
                <div class="card-body">
                    No users found. Please Filter Form List
                </div>
            </div>
        @endif
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

