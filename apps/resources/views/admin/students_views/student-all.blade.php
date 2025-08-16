@extends('admin.themes.main')

@section('page-title') Shifts Management @endsection

@section('page-body')

    {{-- <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Students Management
                </h5>
                <a href="{{ route('students.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>Add Students</span>
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
    </div> --}}

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Students Management
                </h5>
                <a href="{{ route('students.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>Add Students</span>
                </a>
            </div>
            <div class="card-body p-0">


                @foreach ($records as $data)
                    {{-- <tr>
                        <td>{{$data->name_en}}</td>
                        <td>{{$data->name_bn}}</td>

                        <td class="d-flex">
                            <a href="{{ route('shifts.edit',$data->id) }}" class="btn btn-success rounded-3 mb-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form action="{{ route('shifts.destroy',$data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-3 mb-2"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr> --}}


                    <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                        <div class="d-flex align-items-start gap-3">
                            <img class="rounded-3 dashboard-user-img" src="{{$data->profile_pic}}" alt="">
                            <div>
                                <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                    {{$data->name_en}}
                                </p>
                                <p class="mb-2 lh-1 fs-14 fw-normal">

                                </p>
                                <p class="mb-0 lh-1 fs-14 fw-medium">
                                    {{$data->name_bn}}
                                </p>
                                <p class="mb-0 lh-1 fs-12 fw-medium">
                                    {{$data->institute_name}}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <a href="{{ route('shifts.show',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('shifts.edit',$data->id) }}" class="btn btn-success rounded-3 mb-2 ms-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form action="{{ route('shifts.destroy',$data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-3 mb-2 ms-2"><i class="fa fa-arrows" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>




                @endforeach




                <div class="py-3">
                            <div class="mt-3 mb-3">
            {{ $records->links('pagination::bootstrap-5') }}
        </div>
                </div>
            </div>
        </div>
    </div>

@endsection

