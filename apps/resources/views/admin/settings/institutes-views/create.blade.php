@extends('admin.themes.main')

@section('page-title') Add Shifts @endsection

@section('page-body')

    @include('admin.settings.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Add Institute
                </h5>
                <a href="{{ route('institutes.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('institutes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Institute Name</label>
                    <input  value="{{ old('name_en') }}"
                            type="text"
                            class="form-control @error('name_en') is-invalid @enderror"
                            name="name_en">
                    <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">প্রতিষ্ঠানের নাম</label>
                    <input  value="{{ old('name_bn') }}"
                            type="text"
                            class="form-control @error('name_bn') is-invalid @enderror"
                            name="name_bn">
                    <span class="text-danger"> @error('name_bn') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input  value="{{ old('address_en') }}"
                            type="text"
                            class="form-control @error('address_en') is-invalid @enderror"
                            name="address_en">
                    <span class="text-danger"> @error('address_en') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">address_bn</label>
                    <input  value="{{ old('address_bn') }}"
                            type="text"
                            class="form-control @error('address_bn') is-invalid @enderror"
                            name="address_bn">
                    <span class="text-danger"> @error('address_bn') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">eiin_number</label>
                    <input  value="{{ old('eiin_number') }}"
                            type="text"
                            class="form-control @error('eiin_number') is-invalid @enderror"
                            name="eiin_number">
                    <span class="text-danger"> @error('eiin_number') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">mobile</label>
                    <input  value="{{ old('mobile') }}"
                            type="text"
                            class="form-control @error('mobile') is-invalid @enderror"
                            name="mobile">
                    <span class="text-danger"> @error('mobile') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input  value="{{ old('email') }}"
                            type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email">
                    <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">website</label>
                    <input  value="{{ old('website') }}"
                            type="text"
                            class="form-control @error('website') is-invalid @enderror"
                            name="website">
                    <span class="text-danger"> @error('website') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">logo</label>
                    <input  value="{{ old('logo') }}"
                            type="text"
                            class="form-control @error('logo') is-invalid @enderror"
                            name="logo">
                    <span class="text-danger"> @error('logo') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">map</label>
                    <input  value="{{ old('map') }}"
                            type="text"
                            class="form-control @error('map') is-invalid @enderror"
                            name="map">
                    <span class="text-danger"> @error('map') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">display_order</label>
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

