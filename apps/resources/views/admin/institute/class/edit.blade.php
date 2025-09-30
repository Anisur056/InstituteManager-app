@extends('admin.themes.main')

@section('page-title') Update Class @endsection

@section('page-body')

    @include('admin.institute.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Update Class
                </h5>
                <a href="{{ route('class.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('class.update',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Class Name</label>
                        <input  value="{{ $data->name_en }}"
                                type="text"
                                class="form-control @error('name_en') is-invalid @enderror"
                                name="name_en">
                        <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">শ্রেনীর নাম</label>
                        <input  value="{{ $data->name_bn }}"
                                type="text"
                                class="form-control @error('name_bn') is-invalid @enderror"
                                name="name_bn">
                        <span class="text-danger"> @error('name_bn') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input  value="{{ $data->display_order }}"
                                type="number"
                                class="form-control @error('display_order') is-invalid @enderror"
                                name="display_order">
                        <span class="text-danger"> @error('display_order') {{$message}} @enderror </span>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

