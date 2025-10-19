@extends('admin.themes.main')

@section('page-title') Notice- Edit- {{$notice->title}} @endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Notice- Edit- {{$notice->title}}
                </h5>
                <a href="{{ route('notices.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('notices.update', $notice->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUt')
                    <div class="mb-3">
                        <label class="form-label">Title<span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ old('title', $notice->title) }}"
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                name="title">
                        <span class="text-danger"> @error('title') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notice Date <span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ old('date', $notice->date) }}"
                                type="date"
                                class="form-control @error('date') is-invalid @enderror"
                                name="date">
                        <span class="text-danger"> @error('date') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enable Status</label>
                        <select class="form-select form-select-sm" name="enable_status">
                            <option value="on" {{ old('enable_status', $notice->enable_status) == 'on' ? 'selected' : '' }}>On</option>
                            <option value="off" {{ old('enable_status', $notice->enable_status) == 'off' ? 'selected' : '' }}>Off</option>
                        </select>
                    </div>

                    {{-- Notice Image --}}
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Notice Image <span class="text-danger ms-2">(*)</span></label><br>

                        <input class="form-control @error('image') is-invalid @enderror"

                            type="file"
                            name="image"
                            onchange="document.querySelector('#imagePreview').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('image') {{$message}} @enderror </span>

                        <img id="imagePreview" class="rounded-3 w-50 mb-3" src="{{ asset("assets/$notice->image") }}"><br>
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

