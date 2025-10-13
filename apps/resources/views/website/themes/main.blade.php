<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা । অফিসিয়াল ওয়েবসাইট</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="ছিরিকোটিয়া মাদ্রাসা" name="keywords">
        <meta content="ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা । অফিসিয়াল ওয়েবসাইট" name="description">

        <!-- Favicon -->
        <link href="{{ asset('assets/website/img/icon.png') }}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Yantramanav:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Fonts Bangla-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">

        <!-- Custom Bangla Font -->
        <style>
            .bangla{
            font-family: "Tiro Bangla", serif;
            font-weight: 400;
            font-style: normal;
            }
        </style>

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/website/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/website/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/website/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">

    </head>

    <body class="bangla">

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Contact Top Header -->
        <div class="contact-top-header">
            <div class="container-fluid bg-danger">
                <div class="row">
                    <div class="col-md-6 text-center bg-info">
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="py-2 text-white">
                            <i class="bi bi-geo-alt me-2"></i>
                            হাজী দরবেশ আলী চৌধুরী বাড়ী, বিশ্বাস পাড়া, উত্তর কাট্টলী, আকবরশাহ, চট্টগ্রাম
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 text-center bg-success">
                        <div class="row">
                            <span class="col-12 col-md-6 py-2 text-white ">
                            <i class="bi bi-envelope me-2"></i>
                            sirikotiamadrasha@gmail.com
                            </span>
                            <span class="col-12 col-md-6 py-2 text-white ">
                            <i class="bi bi-telephone-fill me-2"></i>
                            +880 1892-178778
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /Contact Top Header -->

        <!-- Announcement Start -->
            <table class="w-100 border-bottom">
                <tbody>
                    <tr>
                        <td class="bg-success text-white" style="font-weight: bold; width: 130px; padding-left:10px;">সর্বশেষ নোটিশ -</td>
                        <td class="bg-light text-success" style="font-weight: bold; padding-top:5px;">
                            <marquee behavior="scroll" direction="left">
                                ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসার ওয়েবসাইটে আপনাকে স্বাগতম। &nbsp; <i class='fas fa-chess-board'></i>  &nbsp;১৮/০৬/২৫ ইং মাদ্রাসার সকল কার্যক্রম যথারীতি চালু হবে, ইনশাআল্লাহ।&nbsp; <i class='fas fa-chess-board'></i>  &nbsp;এখন থেকে শিক্ষার্থীদের সকল তথ্য ওয়েবসাইটের মাধ্যমে জানা যাবে।
                            </marquee>
                        </td>
                    </tr>
                </tbody>
            </table>
        <!-- Announcement End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand p-0">
                    {{-- <h1 class="text-primary m-0"><i class="fas fa-biohazard me-3"></i>JustDance</h1> --}}
                    <img src="{{ asset('assets/website/img/logo-banner.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link active"><span class="bangla">প্রচ্ছদ</span></a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="bangla">আমাদের সম্পর্কে</span></a>
                            <div class="dropdown-menu m-0">
                                <a href="classes.html" class="dropdown-item"><span class="bangla">প্রিন্সিপালের বার্তা</span></a>
                                <a href="training.html" class="dropdown-item"><span class="bangla">নূরানী বিভাগ</span></a>
                                <a href="team.html" class="dropdown-item"><span class="bangla">হিফজ বিভাগ</span></a>
                                <a href="testimonial.html" class="dropdown-item"><span class="bangla">মক্তব বিভাগ</span></a>
                                <a href="gallery.html" class="dropdown-item"><span class="bangla">শিক্ষক মন্ডলী</span></a>
                                <a href="404.html" class="dropdown-item"><span class="bangla">সুযোগ-সুবিধা</span></a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="bangla">ভর্তি</span></a>
                            <div class="dropdown-menu m-0">
                                <a href="classes.html" class="dropdown-item"><span class="bangla">ভর্তির নিয়মাবলী</span></a>
                                <a href="training.html" class="dropdown-item"><span class="bangla">বেতন ও অন্যান্য ফি</span></a>
                                <a href="team.html" class="dropdown-item"><span class="bangla">ইউনির্ফম</span></a>
                                <a href="testimonial.html" class="dropdown-item"><span class="bangla">ভর্তি ফরম</span></a>
                            </div>
                        </div>
                        <a href="index.html" class="nav-item nav-link"><span class="bangla">নোটিশ</span></a>
                        <a href="index.html" class="nav-item nav-link"><span class="bangla">গ্যালারী</span></a>
                        <a href="contact.html" class="nav-item nav-link"><span class="bangla">যোগাযোগ</span></a>
                        <a href="{{ route('login') }}" class="nav-item nav-link"><span class="bangla">লগইন</span></a>
                    </div>
                    <a href="#" class="btn btn-success rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0"><span class="bangla">ভর্তি আবেদন</span></a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Home Gallery Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <img src="{{ asset('assets/website/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
            </div>
            <div class="header-carousel-item">
                <img src="{{ asset('assets/website/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Image">
            </div>
            <div class="header-carousel-item">
                <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid w-100" alt="Image">
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
                            <a class="btn btn-success rounded-pill text-white py-3 px-5" href="#">সকল নোটিশ</a>
                        </div>
                    </div>
                </div>
                <div class="training-carousel owl-carousel pt-5 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>

                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
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
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">গ্যালারী-১</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>

                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">ছুটি সংক্রান্ত নোটিশ</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>
                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Image">
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
                    <h4 class="text-success sub-title fw-bold bangla">ভিডিও গ্যালারী</h4><br>
                </div>
                <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                    <div id="GalleryTab-1" class="tab-pane fade show p-0">
                        {{-- <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/YTR5jkyTPBo" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2 wow fadeInUp" data-wow-delay="0.9s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 wow fadeInUp" data-wow-delay="0.9s">
                                <div class="video h-100">
                                    <img src="{{ asset('assets/website/img/carousel-3.jpg') }}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2 wow fadeInUp" data-wow-delay="0.1s">
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
                    <h4 class="text-secondary sub-title fw-bold wow fadeInUp" data-wow-delay="0.1s">Dance Teachers</h4>
                    <h1 class="display-2 mb-0 wow fadeInUp" data-wow-delay="0.3s">Our Professional Instructor</h1>
                </div>
                <div class="team-carousel owl-carousel pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-img bg-secondary rounded-top">
                            <img src="img/team-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            <div class="team-icon">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center p-4">
                            <a href="#" class="h4">Emily Ava</a>
                            <p class="mb-0 text-primary">Instructor</p>
                        </div>
                    </div>
                    <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-img bg-secondary rounded-top">
                            <img src="img/team-2.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            <div class="team-icon">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center p-4">
                            <a href="#" class="h4">Emily Ava</a>
                            <p class="mb-0 text-primary">Instructor</p>
                        </div>
                    </div>
                    <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-img bg-secondary rounded-top">
                            <img src="img/team-3.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            <div class="team-icon">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center p-4">
                            <a href="#" class="h4">Emily Ava</a>
                            <p class="mb-0 text-primary">Instructor</p>
                        </div>
                    </div>
                    <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-img bg-secondary rounded-top">
                            <img src="img/team-4.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            <div class="team-icon">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center p-4">
                            <a href="#" class="h4">Emily Ava</a>
                            <p class="mb-0 text-primary">Instructor</p>
                        </div>
                    </div>
                    <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.9s">
                        <div class="team-img bg-secondary rounded-top">
                            <img src="img/team-4.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            <div class="team-icon">
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center p-4">
                            <a href="#" class="h4">Emily Ava</a>
                            <p class="mb-0 text-primary">Instructor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Team End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">JustDanc</h4>
                                <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                                <div class="d-flex">
                                    <a class="btn btn-lg-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg-square btn-primary rounded-circle mx-2" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-lg-square btn-primary rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-lg-square btn-primary rounded-circle mx-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Address</h4>
                            <div class="d-flex align-items-center mb-3">
                                <a class="btn btn-lg-square btn-primary rounded-circle mx-2" href=""><i class="fas fa-map-marker-alt"></i></a>
                                <div class="text-white ms-2">
                                    <p class="mb-0">0123.. Street, New York, USA</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <a class="btn btn-lg-square btn-primary rounded-circle mx-2" href=""><i class="fa fa-phone-alt"></i></a>
                                <div class="text-white ms-2">
                                    <p class="mb-0">+012 345 67890</p>
                                    <p class="mb-0">+012 345 67890</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-lg-square btn-primary rounded-circle mx-2" href=""><i class="fas fa-envelope"></i></a>
                                <div class="text-white ms-2">
                                    <p class="mb-0">info@example.com</p>
                                    <p class="mb-0">info@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="#" class="footer-link"> About Us</a>
                            <a href="#" class="footer-link"> Classes</a>
                            <a href="#" class="footer-link"> Privacy Policy</a>
                            <a href="#" class="footer-link"> Terms & Conditions</a>
                            <a href="#" class="footer-link"> Schedule</a>
                            <a href="#" class="footer-link"> FAQ</a>
                            <a href="#" class="footer-link"> Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Newsletter</h4>
                                <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                                <div class="position-relative mx-auto rounded-pill">
                                    <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                    <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-white"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div><!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-success btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/website/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/website/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/website/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/website/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    </body>

    <!-- Youtube Thumbnail Generator Javascript -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Loop through all images with class youtube-thumbnail
        document.querySelectorAll('.youtube-thumbnail').forEach(img => {
            const videoUrl = img.getAttribute('data-src');
            const videoId = extractYouTubeID(videoUrl);
            if (videoId) {
                img.src = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
            }
        });

        // Extract YouTube video ID
        function extractYouTubeID(url) {
            const regExp = /(?:embed\/|v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            const match = url.match(regExp);
            return match ? match[1] : null;
        }

        // Play video in modal
        const videoModal = document.getElementById('videoModal');
        const videoIframe = document.getElementById('video');

        videoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const videoSrc = button.getAttribute('data-src');
            videoIframe.src = videoSrc + "?autoplay=1&modestbranding=1&showinfo=0";
        });

        // Stop video on modal close
        videoModal.addEventListener('hidden.bs.modal', function () {
            videoIframe.src = "";
        });
    });
    </script>


</html>
