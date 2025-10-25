@extends('admin.themes.main')

@section('page-title') {{ $data->name }} > Edit Information @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" />
    <!-- /Select2 -->
@endsection

@section('page-body')

    @include('admin.students.links')

    <div class="card rounded-15">
        <div class="card-header d-flex gap-3 align-items-center justify-content-between">
            <h5 class="m-0 fs-18 fw-semi-bold text-success">
                Edit {{ $data->name }} Information
            </h5>
            <a href="{{ route('students.index') }}"
                class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                <i class="fa fa-chevron-left"></i>
                <span>Students List</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Student Form Include Blade --}}
                @include('admin.students.form', ['data' => $data])

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

    <!-- Show/Hide Password -->
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');

            // Check the current type of the input field
            if (passwordField.type === 'password') {
                // If it's a password, change it to text (shows the value)
                passwordField.type = 'text';
            } else {
                // If it's text, change it back to password (hides the value)
                passwordField.type = 'password';
            }
        }
    </script><!-- / Show/Hide Password -->
@endsection
