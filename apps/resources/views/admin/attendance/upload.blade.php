@extends('admin.themes.main')

@section('page-title') Upload Attendance Logs @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->
@endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Upload Attendance Logs
                </h5>
                <a href="{{ route('academic-years.create') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-plus"></i>
                    <span>Pull From Device</span>
                </a>
            </div>
            <div class="card-body">

                <form action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="json_file">Choose JSON File</label>
                        <input class="form-control my-3" type="file" name="json_file" id="json_file">
                    </div>
                    <button class="btn btn-success" type="submit">Upload</button>
                </form>

                @if(session('success'))
                    <p class="text-success my-4">{{ session('success') }}</p>
                @endif

                @if($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p class="text-danger my-4">{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
