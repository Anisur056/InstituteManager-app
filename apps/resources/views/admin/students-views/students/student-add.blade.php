@extends('admin.themes.main')

@section('page-title') Add Shifts @endsection

@section('page-body')

    <div class="card p-3 mb-3">
        <span>Add Shifts</span>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Students Name</label>
                    <input  value="{{ old('name_en') }}"
                            type="text"
                            class="form-control @error('name_en') is-invalid @enderror"
                            name="name_en">
                    <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                </div>
                {{-- <div class="mb-3">
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
                </div> --}}

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-warning">< Back</a>
        </div>
    </div>

@endsection

