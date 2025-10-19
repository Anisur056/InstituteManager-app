@extends('admin.themes.main')

@section('page-title') Notices @endsection

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
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Notices
                </h5>
                <a href="{{ route('notices.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>Add Notice</span>
                </a>
            </div>
            <div class="card-body">

                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Notice Images</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Enable Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($notices as $data)
                    <tr>
                            <td data-label="ID:">{{$data->id}}</td>
                            <td data-label="Notice Images:">
                                <img src="{{ asset("assets/$data->image") }}" width="100px">
                            </td>
                            <td data-label="Title:">{{$data->title}}</td>
                            <td data-label="Date:">{{$data->date}}</td>
                            <td data-label="Enable Status:">{{$data->enable_status}}</td>
                            <td class="">
                                <a href="{{ route('notices.show',$data->id) }}" class="btn btn-success rounded-3 m-1 w-100">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('notices.edit',$data->id) }}" class="btn btn-warning rounded-3 m-1 w-100">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form action="{{ route('notices.destroy',$data->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-3 m-1 w-100"><i class="fa fa-trash"></i></button>
                                </form>
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
