@extends('website.themes.main')

@section('page-title') অনলাইন ভর্তি আবেদন @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" /><!-- /Select2 -->
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
            {{-- Academic Information --}}
            <div class="card py-4 wow fadeInLeft" data-wow-delay="0.1s">
                <h2 class="mb-2 bangla text-center">একাডেমিক তথ্য</h2>
                <hr>
                <div class="card-body row">

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> ভর্তির তারিখ:</label>
                            <div class="col-md-8 ">
                                <input name="joined_at"
                                    type="date"
                                    class="form-control @error('joined_at') is-invalid @enderror"
                                    value="{{ old('joined_at') ?: ($data->joined_at ?? date('Y-m-d')) }}">
                                <span class="text-danger"> @error('joined_at') {{$message}} @enderror </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 col-sm-12 mb-2">শিক্ষা বর্ষ: </label>
                            <div class="col-md-8 col-sm-12">
                                <select name="academic_year" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($academicYear as $year)
                                        <option value="{{ $year->year_en }}">{{ $year->year_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> প্রতিষ্ঠানের নাম: </label>
                            <div class="col-md-8 ">
                                <select name="institute_name" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($instituteInfo as $data)
                                        <option value="{{ $data->name_en }}">{{ $data->name_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> প্রতিষ্ঠানের শাখা: </label>
                            <div class="col-md-8 ">
                                <select name="branch" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($instituteBranch as $branch)
                                        <option value="{{ $branch->name_en }}">{{ $branch->name_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> শ্রেনী: </label>
                            <div class="col-md-8 ">
                                <select name="class" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->name_en }}">{{ $class->name_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> শ্রেনী শাখা: </label>
                            <div class="col-md-8 ">
                                <select name="shift" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($shifts as $shift)
                                        <option value="{{ $shift->name_en }}">{{ $shift->name_bn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> সেকশন: </label>
                            <div class="col-md-8 ">
                                <select name="section" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->name_en }}">{{ $section->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <label class="col-md-4 mb-2"> গ্রুপ: </label>
                            <div class="col-md-8 ">
                                <select name="group" class="form-control">
                                    <option value="null">নির্বাচন করুন</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->name_en }}">{{ $group->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>{{-- Academic Information --}}

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
@endsection


