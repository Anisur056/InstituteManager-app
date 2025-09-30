@extends('admin.themes.main')

@section('page-title') Add Shifts @endsection

@section('page-body')

    @include('admin.institute.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Add Shift
                </h5>
                <a href="{{ route('shifts.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('shifts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Shift Name</label>
                    <input  value="{{ old('name_en') }}"
                            type="text"
                            class="form-control @error('name_en') is-invalid @enderror"
                            name="name_en">
                    <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">শিফটের নাম</label>
                    <input  value="{{ old('name_bn') }}"
                            type="text"
                            class="form-control @error('name_bn') is-invalid @enderror"
                            name="name_bn">
                    <span class="text-danger"> @error('name_bn') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Display Order</label>
                    <input  value="{{ old('display_order') }}"
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

