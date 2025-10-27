@extends('admin.themes.main')

@section('page-title') New Admission @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" /><!-- /Select2 -->

    <!-- Dropify 0.2.2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 15px;
        }
    </style>
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

                {{-- Student Form Include Blade & send all compact value to view --}}
                @include('admin.students.form', get_defined_vars())

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

    <!-- Dropify 0.2.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script>
        // Initialize Dropify on all elements with the class 'dropify'
        $(document).ready(function(){
            // Initialize all inputs with the class 'dropify'
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happened.'
                }
            });
        });
    </script><!-- Dropify 0.2.2 -->

@endsection

