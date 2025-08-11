@extends('admin.themes.main')

@section('page-title') Shifts Management @endsection

@section('page-body')

    <div class="card p-3">
        <span>Shifts Management</span>
    </div>

    <a href="{{ route('shifts.create') }}" class="btn btn-primary my-3">Add Shifts</a>

    <div class="card">
        <div class="card-body p-1">

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Shift Name</th>
                            <th>শিফট বাংলা</th>
                            <th>Display Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->shift_name_en}}</td>
                                <td>{{$data->shift_name_bn}}</td>
                                <td>{{$data->display_order}}
                                <td class="d-flex">
                                    <a href="{{ route('shifts.edit',$data->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-lead-pencil"></i></a>
                                    <form action="{{ route('shifts.destroy',$data->id) }}" method="post"> 
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-forever"></i></button>
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

