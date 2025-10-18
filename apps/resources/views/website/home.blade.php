@extends('website.themes.main')

@section('page-title') ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা । অফিসিয়াল ওয়েবসাইট @endsection

@section('page-body')

    <!-- Home Gallery Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="{{ asset('assets/website/img/gallery/01.jpg') }}" class="img-fluid w-100" alt="Image">
        </div>
        <div class="header-carousel-item">
            <img src="{{ asset('assets/website/img/gallery/02.jpg') }}" class="img-fluid w-100" alt="Image">
        </div>
        <div class="header-carousel-item">
            <img src="{{ asset('assets/website/img/gallery/03.jpg') }}" class="img-fluid w-100" alt="Image">
        </div>
    </div>
    <!-- Home Gallery Carousel End -->

    <!-- Banner Start -->
    <div class="container-fluid bg-success wow zoomInDown" data-wow-delay="0.1s">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center text-center p-5">
                <h1 class="me-4 text-white"><span class="bangla"> আধুনিক শিক্ষার প্রতিষ্ঠান</span></h1>
                {{-- <a href="#" class="text-white fw-bold fs-2"> <i class="fa fa-phone me-1"></i> 714-783-2205</a> --}}
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="border bg-secondary rounded">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h4 class="text-success sub-title fw-bold bangla">প্রিন্সিপালের বার্তা</h4><br>
                    <h5 class="text-success bangla">মোঃ রফিকুল ইসলাম (রোমান)</h5>
                    <p class="bangla">আপনার সন্তানের ভবিষ্যৎ গড়তে আমরা আছি প্রতিশ্রুতি বদ্ধ।আপনার সন্তানের ভবিষ্যৎ গড়তে আমরা আছি প্রতিশ্রুতি বদ্ধ।আপনার সন্তানের ভবিষ্যৎ গড়তে আমরা আছি প্রতিশ্রুতি বদ্ধ।আপনার সন্তানের ভবিষ্যৎ গড়তে আমরা আছি প্রতিশ্রুতি বদ্ধ।</p>
                    <a class="btn btn-success rounded-pill text-white py-3 px-5" href="#">+880 1892-178778</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Notice Board Start -->
    <div class="container-fluid training bg-light py-5">
        <div class="container py-5">
            <div class="pb-5">
                <div class="row g-4 align-items-end">
                    <div class="col-xl-8">
                        <h4 class="text-success sub-title fw-bold bangla">নোটিশ বোর্ড</h4><br>
                    </div>
                    <div class="col-xl-4 text-xl-end wow fadeInUp" data-wow-delay="0.3s">
                        <a class="btn btn-success rounded-pill text-white py-3 px-5" href="{{ route('notice.index') }}">সকল নোটিশ</a>
                    </div>
                </div>
            </div>
            <div class="training-carousel owl-carousel pt-5 wow fadeInUp" data-wow-delay="0.1s">

                @foreach($notice as $row)

                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset("assets/website/$row->image") }}" width="100%" class="object-fit-fill rounded-top" alt="Image">
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
        </div>
    </div><!-- Notice Board End -->

    <!-- Gallery Start -->
    <div class="container-fluid training py-5">
        <div class="container py-5">
            <div class="pb-5">
                <div class="row g-4 align-items-end">
                    <div class="col-xl-8">
                        <h4 class="text-success sub-title fw-bold bangla">গ্যালারী</h4><br>
                    </div>
                    <div class="col-xl-4 text-xl-end wow fadeInUp" data-wow-delay="0.3s">
                        <a class="btn btn-success rounded-pill text-white py-3 px-5" href="#">সকল গ্যালারী</a>
                    </div>
                </div>
            </div>
            <div class="training-carousel owl-carousel pt-5 wow fadeInUp" data-wow-delay="0.1s">

                <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="training-img rounded-top">
                        <img src="{{ asset('assets/website/img/gallery/01.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom border border-top-0 p-4">
                        <p class="mb-3">গ্যালারী-১</p>
                        <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                    </div>
                </div>

                <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="training-img rounded-top">
                        <img src="{{ asset('assets/website/img/gallery/02.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom border border-top-0 p-4">
                        <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                        <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                    </div>
                </div>
                <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="training-img rounded-top">
                        <img src="{{ asset('assets/website/img/gallery/03.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom border border-top-0 p-4">
                        <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                        <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                    </div>
                </div>
                <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="training-img rounded-top">
                        <img src="{{ asset('assets/website/img/gallery/01.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom border border-top-0 p-4">
                        <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                        <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                    </div>
                </div>
                <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="training-img rounded-top">
                        <img src="{{ asset('assets/website/img/gallery/02.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom border border-top-0 p-4">
                        <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                        <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Gallery End -->

    <!-- Video Gallery Start -->
    <div class="container-fluid gallery pb-5">
        <div class="container pb-5">
            <div class="pb-5">
                <div class="row g-4 align-items-end">
                    <div class="col-xl-8">
                        <h4 class="text-success sub-title fw-bold bangla">ভিডিও গ্যালারী</h4><br>
                    </div>
                    <div class="col-xl-4 text-xl-end wow fadeInUp" data-wow-delay="0.3s">
                        <a class="btn btn-success rounded-pill text-white py-3 px-5" href="#">সকল ভিডিও</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video h-100">
                        <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                            data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                            style="object-fit: cover;" alt="YouTube Thumbnail">

                        <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video h-100">
                        <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                            data-src="https://www.youtube.com/embed/-1CVMSGU2mQ"
                            style="object-fit: cover;" alt="YouTube Thumbnail">

                        <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/-1CVMSGU2mQ"
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video h-100">
                        <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                            data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                            style="object-fit: cover;" alt="YouTube Thumbnail">

                        <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video h-100">
                        <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                            data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                            style="object-fit: cover;" alt="YouTube Thumbnail">

                        <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video h-100">
                        <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                            data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                            style="object-fit: cover;" alt="YouTube Thumbnail">

                        <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video h-100">
                        <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                            data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                            style="object-fit: cover;" alt="YouTube Thumbnail">

                        <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/YTR5jkyTPBo"
                                data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Modal Video End -->

    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="pb-5">
                <div class="row g-4 align-items-end">
                    <div class="col-xl-8">
                        <h4 class="text-success sub-title fw-bold bangla">শিক্ষক মন্ডলী</h4><br>
                    </div>
                </div>
            </div>
            <div class="team-carousel owl-carousel pt-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-img bg-secondary rounded-top">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="team-content text-center p-4">
                        <a href="#" class="h4"><span class="bangla text-white">শিক্ষকের নাম</span></a>
                    </div>
                </div>
                <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-img bg-secondary rounded-top">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="team-content text-center p-4">
                        <a href="#" class="h4"><span class="bangla text-white">শিক্ষকের নাম</span></a>
                    </div>
                </div>
                <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-img bg-secondary rounded-top">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="team-content text-center p-4">
                        <a href="#" class="h4"><span class="bangla text-white">শিক্ষকের নাম</span></a>
                    </div>
                </div>
                <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-img bg-secondary rounded-top">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="team-content text-center p-4">
                        <a href="#" class="h4"><span class="bangla text-white">শিক্ষকের নাম</span></a>
                    </div>
                </div>
                <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-img bg-secondary rounded-top">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="team-content text-center p-4">
                        <a href="#" class="h4"><span class="bangla text-white">শিক্ষকের নাম</span></a>
                    </div>
                </div>
                <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-img bg-secondary rounded-top">
                        <img src="{{ asset('assets/website/img/principal_photo.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="team-content text-center p-4">
                        <a href="#" class="h4"><span class="bangla text-white">শিক্ষকের নাম</span></a>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- Team End -->

@endsection

