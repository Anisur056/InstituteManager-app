@extends('admin.themes.main')

@section('page-title') Shifts Management @endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Shift Management
                </h5>
                <a href="{{ route('shifts.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>Add Shifts</span>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table dashboard-table award-list">
                        <thead>
                            <tr>
                                <th>Shift Name</th>
                                <th>শিফট বাংলা</th>
                                <th>Display Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $data)
                                <tr>
                                    <td>{{$data->name_en}}</td>
                                    <td>{{$data->name_bn}}</td>
                                    <td>{{$data->display_order}}
                                    <td class="d-flex">
                                        <a href="{{ route('shifts.edit',$data->id) }}" class="btn btn-success rounded-3 mb-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form action="{{ route('shifts.destroy',$data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-3 mb-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

