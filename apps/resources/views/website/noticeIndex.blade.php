@extends('website.themes.main')

@section('page-title') নোটিশ বোর্ড । ছিরিকোটিয়া @endsection

@section('page-body')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-light bangla display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">নোটিশ বোর্ড</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('home')}}" class="text-light">প্রচ্ছদ</a></li>
            <li class="breadcrumb-item text-gray">নোটিশ বোর্ড</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- Notice Board Start -->
<div class="container-fluid bg-light py-5">
    <div class="row">
        @foreach($notice as $row)

            <div class="col-3 col-md-3 col-12 py-3">
                <div class="training-img rounded-top">
                    <img src="{{ asset("assets/website/$row->image") }}" width="100%" class="rounded-top" alt="Image">
                </div>
                <div class="rounded-bottom border border-top-0 p-4">
                    <p class="mb-3 text-dark">{{ $row->title }}</p>
                    <hr>
                    <p class="mb-3 text-dark">তারিখ: {{ $row->date }}</p>
                    <a class="btn btn-success rounded-pill text-white py-2 px-4" href="{{ route('notice.show',$row->id) }}">বিস্তারিত</a>
                </div>
            </div>
        
        @endforeach

    </div>
</div><!-- Notice Board End -->


@endsection

