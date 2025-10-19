@extends('website.themes.main')

@section('page-title') নোটিশ-{{ $notice->title }} । ছিরিকোটিয়া @endsection

@section('page-body')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-light bangla display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">নোটিশ বোর্ড</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('notice.index')}}" class="text-light">নোটিশ বোর্ড</a></li>
            <li class="breadcrumb-item text-gray">{{ $notice->title }}</li>
        </ol>    
    </div>
</div>
<!-- Header End -->



<!-- Notice Details Start -->
    <img src="{{ asset("assets/$notice->image") }}" width="100%" class="rounded-top" alt="Image">
<!-- Notice Details End -->

@endsection

