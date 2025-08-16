@extends('admin.themes.main')

@section('page-title') Shifts Management @endsection

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
            <div class="card-body p-0">

                @foreach ($records as $data)
                    <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                        <div class="d-flex align-items-start gap-3">
                            <img class="rounded-3 dashboard-user-img" src="{{ asset($data->profile_pic) }}" alt="">
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
                            <a target="_blank" href="{{ route('id.card.print',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2"><i class="fa fa-print me-2"></i>ID Card</a>
                            <a target="_blank" href="{{ route('admit.card.print',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2"><i class="fa fa-print me-2"></i>Admit Card</a>
                            <a target="_blank" href="{{ route('seat.sticker.print',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2"><i class="fa fa-print me-2"></i>Seat Sticker</a>
                            <a href="{{ route('students.show',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('students.edit',$data->id) }}" class="btn btn-success rounded-3 mb-2 ms-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form action="{{ route('students.destroy',$data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-3 mb-2 ms-2">
                                    <i class="fa fa-arrows"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="p-4">
                    {{-- {{ $records->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

