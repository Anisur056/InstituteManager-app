@extends('admin.themes.main')

@section('page-title') Shifts Management @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

    @include('admin.settings.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Institute Management
                </h5>
                <a href="{{ route('institutes.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>Add Institute</span>
                </a>
            </div>
            <div class="card-body">

                <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Institute Name</th>
                        <th>প্রতিষ্ঠান বাংলা</th>
                        <th>Address</th>
                        <th>ঠিকানা</th>
                        <th>EIIN Number</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Logo</th>
                        <th>Map Location</th>
                        <th>Display Order</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($records as $data)
                        <tr>
                            <td data-label="SL:" class="text-start">{{$data->id}}</td>
                            <td data-label="Institute Name:">{{$data->name_en}}</td>
                            <td data-label="প্রতিষ্ঠান বাংলা:">{{$data->name_bn}}</td>
                            <td data-label="Address:">{{$data->address_en}}</td>
                            <td data-label="ঠিকানা:">{{$data->address_bn}}</td>
                            <td data-label="EIIN Number:">{{$data->eiin_number}}</td>
                            <td data-label="Mobile:">{{$data->mobile}}</td>
                            <td data-label="Email:">{{$data->email}}</td>
                            <td data-label="Website:">{{$data->website}}</td>
                            <td data-label="Logo:">{{$data->logo}}</td>
                            <td data-label="Map Location:">{{$data->map}}</td>
                            <td data-label="Display Order:" class="text-start">{{$data->display_order}}</td>
                            <td class="">
                                <a href="{{ route('institutes.edit',$data->id) }}" class="btn btn-success rounded-3 m-1 w-100">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form action="{{ route('institutes.destroy',$data->id) }}" method="post">
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
