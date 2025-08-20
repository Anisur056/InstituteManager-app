@extends('admin.themes.main')

@section('page-title') IMA | Dashboard @endsection

@section('page-body')

    <div class="card p-3 mb-3">
        <span>Update Shifts</span>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('shifts.update',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Shift Name</label>
                    <input  value="{{ $data->name_en }}"
                            type="text"
                            class="form-control @error('name_en') is-invalid @enderror"
                            name="name_en">
                    <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">শিফটের নাম</label>
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
            <a href="{{ route('shifts.index') }}" class="btn btn-warning">< Back</a>
        </div>
    </div>

@endsection

