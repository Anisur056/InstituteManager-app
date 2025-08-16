@extends('admin.themes.main')

@section('page-title') Admit Card Generator @endsection

@section('page-body')
    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Admit Card Generator
                </h5>
                <a href=""
                {{-- {{ route('students.create') }} --}}
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>Download All</span>
                </a>
            </div>
            <div class="card-body p-0">
                @foreach ($records as $data)

                    <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                        <div class="d-flex align-items-start gap-3">
                            <span>{{$data->id}}</span>
                            <img class="rounded-3 dashboard-user-img" src="{{$data->profile_pic}}" alt="">
                            <div>
                                <p class="mb-1 lh-1 fs-18 fw-semi-bold text-color-1">
                                    {{$data->name_en}}
                                </p>
                                <span>{{$data->class}}</span>
                                <p class="mb-1 lh-1 fs-14 fw-medium">
                                    {{$data->name_bn}}
                                </p>
                                <p class="mb-0 lh-1 fs-12 fw-medium">
                                    {{$data->institute_name}}
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <a target="_blank" href="{{ route('admit.card.print',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2">
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </a>
                            <a target="_blank" href="{{ route('shifts.edit',$data->id) }}" class="btn btn-primary rounded-3 mb-2 ms-2">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>




                @endforeach
                <div class="p-4">
                    {{ $records->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

@endsection

