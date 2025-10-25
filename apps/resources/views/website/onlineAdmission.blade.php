@extends('website.themes.main')

@section('page-title') ভর্তি আবেদন @endsection

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

{{-- Student Form Include Blade --}}
@include('admin.students.form')



@endsection

