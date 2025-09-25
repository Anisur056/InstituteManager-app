@extends('admin.themes.main')

@section('page-title') Students Management @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection


@section('page-body')

    @include('admin.students.links')

    <div class="row dashboard_heading mb-3">
        <div class="card fixed-tab col-12 col-md-12">
            <p class="fs-5 m-0 text-center border-bottom">Class List</p>
            <ul class="nav nav-tabs">
                @foreach ($class_list as $class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('class',$class->name_en) }}">{{ $class->name_en }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Students Records | <span class="ms-3 text-success">{{ $records->count() }} Records </span>
                </h5>
                <a href="{{ route('students.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>New Admission</span>
                </a>
            </div>
            <div class="card-body">

                <table id="studentTable" class="table table-striped table-bordered mobileResponsiveTable">
                <thead>
                    <tr>
                    <th>Pic</th>
                    <th>Roll</th>
                    <th>RFID Card</th>
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
                        <td data-label="RFID Card: " class="text-start">{{$data->rfid_card}}</td>
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

                            <form action="{{ route('students.destroy',$data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-3 m-1"><i class="fa fa-trash" aria-hidden="true"></i>Move</button>
                            </form>
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

