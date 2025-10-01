@extends('admin.themes.main')

@section('page-title') Update Students @endsection

@section('page-body')

    <div class="card p-3 mb-3">
        <span>Update Students</span>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.update',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input  value="{{ $data->name_en }}"
                            type="text"
                            class="form-control @error('name_en') is-invalid @enderror"
                            name="name_en">
                    <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-warning">< Back</a>
        </div>
    </div>

@endsection

