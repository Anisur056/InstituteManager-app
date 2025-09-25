@extends('admin.themes.main')

@section('page-title') Update Students @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" />
    <!-- /Select2 -->
@endsection

@section('page-body')

    @include('admin.students.links')

    <div class="card my-3 p-3 text-danger">
        <ul>
            <li>অবশ্যই লাল স্টার মার্ক এর সকল তথ্য পূরণ করা আবশ্যিক। </li>
            <li>ছবি আপলোডের ক্ষেত্রে অবশ্যই ছবির সাইজ (২২৫ প্রস্থ, ২৮৫ উচ্চতা) এবং ১৫০ কিলোবাইটের নিচে হতে হবে। </li>
            <li>সকল তথ্য যথাযথভাবে যাচাই করে সাবমিট করুন।  </li>
            <li> বিস্তারিত জানার জন্য প্রতিষ্ঠানের মোবাইলে যোগাযোগ করুন। </li>
        </ul>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

                <div class="col-sm-12 col-lg-6 mb-3">
                    <div class="row">
                        <label class="col-md-4 mb-2"> RFID Card No: </label>
                        <div class="col-md-8 ">
                            <input value="{{ $data->rfid_card }}" name="rfid_card" type="number" class="form-control" placeholder="0001111111">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-warning">< Back</a>
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

