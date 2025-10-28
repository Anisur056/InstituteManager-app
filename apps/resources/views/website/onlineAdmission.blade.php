@extends('website.themes.main')

@section('page-title') অনলাইন ভর্তি আবেদন @endsection

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

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-light bangla display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">অনলাইন ভর্তি আবেদন</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('home')}}" class="text-light">প্রচ্ছদ</a></li>
            <li class="breadcrumb-item text-gray">অনলাইন ভর্তি আবেদন</li>
        </ol>
    </div>
</div>
<!-- Header End -->


<!-- Banner Start -->
<div class="container-fluid bg-white wow zoomInDown" data-wow-delay="0.1s">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center text-center p-3">
            <h3 class="me-4 bangla text-success">ভর্তি সংক্রান্ত তথ্যের জন্য এখনই যোগাযোগ করুন-</h3>
            <span class="text-dark fw-bold fs-3"> <i class="fa fa-phone me-1"></i> 01892-178 778, 01621-986 417</span>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Admission Form Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        
        <div class="pb-5">
            <div class="row g-4 align-items-end">
                <div class="col-xl-6">
                    <h4 class="text-success sub-title fw-bold bangla">অনলাইন ভর্তি আবেদন</h4><br>
                </div>
                <div class="col-xl-6 text-xl-end wow fadeInUp" data-wow-delay="0.3s">
                    <a class="btn btn-success rounded-pill text-white py-2 px-3" href="{{ route('notice.index') }}">ভর্তি আবেদনের অবস্থা </a>
                    {{-- <a class="btn btn-success rounded-pill text-white py-2 px-3" href="{{ route('notice.index') }}">আবেদনপত্র প্রিন্ট</a> --}}
                </div>
            </div>
        </div>

        <form action="{{ route('online.admission.submit') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Student Form Include Blade & send all compact value to view --}}
            @include('admin.students.form', get_defined_vars())

            <button type="submit" class="btn btn-success rounded mt-4"><i class="fa fa-floppy-o"></i> আবেদন দাখিল করুন </button>
        </form>
    </div>
</div>
<!-- Admission Form End -->


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


