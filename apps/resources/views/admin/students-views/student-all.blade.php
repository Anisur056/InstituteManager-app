@extends('admin.themes.main')

@section('page-title') Students Management @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />



    <!-- Datatable -->
@endsection


@section('page-body')

    <div class="row  dashboard_heading mb-3">
        <div class="card fixed-tab col-12 col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.create') }}">New Admission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('students.index') }}">Student List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-0 " href="">Ex Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-0 " href="">Take Fees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-0 " href="">ID Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-0 " href="">Seat Sticker</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row  dashboard_heading mb-3">
        <div class="card fixed-tab col-12 col-md-12">
            <span class="pt-2 fs-5">Class List</span>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class','play') }}">Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class','nursery') }}">Nursery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class','one') }}">One</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class','two') }}">Two</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class','three') }}">Three</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('class','four') }}">Four</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Students Records
                </h5>
            </div>
            <div class="card-body p-3">

                <table id="studentTable" class="table table-sm table-striped table-bordered mobileResponsiveTable">
                <thead>
                    <tr>
                    <th>Pic</th>
                    <th>Roll</th>
                    <th>Class</th>
                    <th>Name</th>
                    <th>নাম</th>
                    <th>Institute Name</th>
                    <th>Father Contact</th>
                    <th>Mother Contact</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($records as $data)
                        <tr>
                        <td data-label="Pic: ">
                            <img class="rounded-3" style="width: 100px;" src="{{ asset($data->profile_pic) }}">
                        </td>
                        <td data-label="Roll: " class="text-start">{{$data->roll}}</td>
                        <td data-label="Class: ">{{$data->class}}</td>
                        <td data-label="Name: " >{{$data->name_en}}</td>
                        <td data-label="নাম: " >{{$data->name_bn}}</td>
                        <td data-label="Institute Name: ">{{$data->institute_name}}</td>
                        <td data-label="Father Contact: ">
                            <a class="text-decoration-none text-success font-weight-bold" href="tel:{{$data->father_contact}}">
                                {{$data->father_contact}}
                            </a>
                        </td>
                        <td data-label="Father Contact: ">
                            <a class="text-decoration-none text-success font-weight-bold" href="tel:{{$data->mother_contact}}">
                                {{$data->mother_contact}}
                            </a>
                        </td>
                        <td data-label="Action: ">
                            <a class="btn btn-success mb-1" href="{{ route('students.show',$data->id) }}">
                                <i class="fa fa-user me-1"></i>
                                Profile
                            </a>
                            <a class="btn btn-warning mb-1" href="{{ route('students.edit',$data->id) }}">
                                <i class="fa fa-pencil-square-o  me-1"></i>
                                Update
                            </a>
                            <a class="btn btn-danger mb-1" href="{{ route('students.destroy',$data->id) }}">
                                <i class="fa fa-exchange me-1"></i>
                                Move
                            </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>

                </table>

                <div class="p-4">
                    {{-- {{ $records->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- Datatable -->
    <script >
      const table = new DataTable('#studentTable', {
          lengthMenu: [
              [-1, 10, 25, 50],
              ['All',10, 25, 50]
          ],
          order: [[0, 'asc']],
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

