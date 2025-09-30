@extends('admin.themes.main')

@section('page-title') Groups Management @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

    @include('admin.institute.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Groups Management
                </h5>
                <a href="{{ route('groups.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>Add Group</span>
                </a>
            </div>
            <div class="card-body">

                <table id="shiftTable" class="table table-striped table-bordered mobileResponsiveTable">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>গ্রুপ বাংলা</th>
                        <th>Display Order</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($records as $data)
                        <tr>
                            <td data-label="Group Name: ">{{$data->name_en}}</td>
                            <td data-label="গ্রুপ বাংলা: ">{{$data->name_bn}}</td>
                            <td data-label="Display Order: " class="text-start">{{$data->display_order}}
                            <td class="d-flex">
                                <a href="{{ route('groups.edit',$data->id) }}" class="btn btn-success rounded-3 m-1">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form action="{{ route('groups.destroy',$data->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-3 m-1"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
      const table = new DataTable('#shiftTable', {
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
