@extends('admin.themes.main')

@section('page-title') New Admission @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" /><!-- /Select2 -->
@endsection

@section('page-body')

    @include('admin.students.links')

    <div class="card rounded-15">
        <div class="card-header d-flex gap-3 align-items-center justify-content-between">
            <h5 class="m-0 fs-18 fw-semi-bold text-success">
                New Admission
            </h5>
            <a href="{{ route('students.index') }}"
                class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                <i class="fa fa-chevron-left"></i>
                <span>Students List</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @include('admin.students.form')

                <div class="card-footer">
                    <button type="submit" class="btn btn-success rounded"><i class="fa fa-floppy-o pe-2"></i> Save </button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('assets/admin/js/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <!-- /Select2 -->
@endsection

