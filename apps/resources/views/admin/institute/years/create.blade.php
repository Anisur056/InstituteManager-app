@extends('admin.themes.main')

@section('page-title') Academic Years @endsection

@section('page-body')

    @include('admin.institute.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Add Academic Year
                </h5>
                <a href="{{ route('academic-years.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('academic-years.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Academic Years (English)</label>
                    <input  value="{{ old('year_en') }}"
                            type="text"
                            class="form-control @error('year_en') is-invalid @enderror"
                            name="year_en">
                    <span class="text-danger"> @error('year_en') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">শিক্ষা বর্ষ (বাংলা)</label>
                    <input  value="{{ old('year_bn') }}"
                            type="text"
                            class="form-control @error('year_bn') is-invalid @enderror"
                            name="year_bn">
                    <span class="text-danger"> @error('year_bn') {{$message}} @enderror </span>
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

