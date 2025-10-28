@extends('website.themes.main')

@section('page-title') ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা । অফিসিয়াল ওয়েবসাইট @endsection

@section('page-body')

    <!-- Home Gallery Carousel Start -->
    <div class="header-carousel owl-carousel">
        @foreach($gallery as $row)
            <div class="header-carousel-item">
                <img src="{{ asset("assets/$row->image") }}" class="img-fluid w-100" alt="Image">
            </div>
        @endforeach
    </div>
    <!-- Home Gallery Carousel End -->

    <!-- Banner Start -->
    <div class="container-fluid bg-success wow zoomInDown" data-wow-delay="0.1s">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center text-center p-5">
                <h1 class="me-4 text-white"><span class="bangla"> ধর্মীয় ও আধুনিক শিক্ষার সমন্বিত ব্যতিক্রমী শিক্ষা প্রতিষ্ঠান</span></h1>
                {{-- <a href="#" class="text-white fw-bold fs-2"> <i class="fa fa-phone me-1"></i> 714-783-2205</a> --}}
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- About Principal -->
    <div class="container-fluid py-5" id="aboutPrincipal">
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
                    <p class="bangla text-dark mt-3" style="text-align: justify">আস্সালামু আলাইকুম ওয়া রাহমাতুল্লাহ, <br>
                        সম্মানিত অভিভাবকবৃন্দ <br>
                        চলমান বিশ্বের জটিল চ্যালেঞ্জ মোকাবেলায় ইসলামী চরিত্রের নিষ্ঠাবান অনুসারী, দেশপ্রেমিক, সৎ ও যোগ্য প্রজন্ম সৃষ্টির মহান ব্রত নিয়ে <b>"ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা"</b>  মহান প্রভুর অপার কৃপায় যাত্রা শুরু করেছে। একদল অভিজ্ঞ আলেম, শিক্ষানুরাগী, ত্যাগী ও মুখলেসিনেদের দৃঢ় হাতে নিরন্তর তত্ত্ববধানে প্রতিষ্ঠান পরিচালনার হাল ধরেছেন। একদল সুশিক্ষিত ও নিবেদিত প্রাণ শিক্ষকমন্ডলীর সমন্বিত প্রয়াসে ইতিমধ্যে আর্ন্তজাতিক হিফযুল কোরআন বিভাগের কার্যক্রম শুরু করেছে। <br><br>
                        সমস্ত প্রশংসার মালিক আল্লাহ সুবাহানাহু ওয়া তা'য়ালা। বর্তমানে প্রতিষ্ঠানের প্রশস্ত ভবনের মধ্যে মর্নিং শিফ্ট-এ চলছে দ্বীনি পরিবেশে (প্লে থেকে ৫ম শ্রেণি পর্যন্ত) পূর্ণাঙ্গ মানের মাদ্রাসা, রয়েছে আন্তজার্তিক মানের হিফজুল কুরআন বিভাগ। <br><br>

                        ইসলামিক শিক্ষা প্রদানে আমরা সর্বদাই যত্নশীল রয়েছি ও থাকবো ইন্‌শাআল্লাহ। একজন সচেতন অভিভাবক হিসেবে নৈতিক অবক্ষয়ের এই দুর্দিনে আপনার প্রিয় সন্তানের আধুনিক শিক্ষা ও সু-শিক্ষা নিশ্চিত করণে এবং চরিত্র গঠনের দায়িত্ব আমাদের উপর ন্যস্ত করে নিশ্চিত হতে পারেন। আমরা কঠিন এই দায়িত্ব গ্রহণের অঙ্গীকার করছি, ইনশা-আল্লাহ।</p>
                    <a class="btn btn-success rounded-pill text-white py-3 px-5" href="#">+880 1892-178778</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Principal End -->

    <!-- Notice Board Start -->
    <div class="container-fluid training bg-light py-5" id="notice">
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

                @foreach($notices as $row)

                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset("assets/$row->image") }}" width="100%" class="object-fit-fill rounded-top" alt="Image">
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

    <!-- Admission & Features -->
    <div class="container py-5" id="admission-features">
        <style>
            /* Define the glowing effect */
            .custom-glow-card {
                box-shadow: 0 0 5px 5px rgba(25, 135, 84, 0.7);
                transition: box-shadow 0.3s ease-in-out;
            }

            /* Add the glowing shadow on hover */
            .custom-glow-card:hover {
                box-shadow: 0 0 20px 5px rgba(25, 135, 84, 0.7); /* Adjust color and spread */
            }
        </style>
        @for ($i = 1; $i <= 6; $i++)
            @php
                $image = str_pad($i, 2, '0', STR_PAD_LEFT);
            @endphp
            <div class="card p-0 mb-3 border border-success custom-glow-card">
                <img src="{{ asset("assets/website/img/features/".$image.".jpg") }}" class="img-fluid rounded w-100" alt="Image">
            </div>
        @endfor
    </div>
    <!-- Admission & Features End -->

    <!-- Gallery Start -->
    <div class="container-fluid training py-5" id="gallery">
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

                @foreach($gallery as $row)

                    <div class="training-item bg-white rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="training-img rounded-top">
                            <img src="{{ asset("assets/$row->image") }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom border border-top-0 p-4">
                            <p class="mb-3">{{ $row->title }}</p>
                            <a class="btn btn-success rounded-pill text-white py-2 px-4" href="#">বিস্তারিত</a>
                        </div>
                    </div>

                @endforeach
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
                        <a class="btn btn-success rounded-pill text-white py-3 px-5" target="_blank" href="https://www.youtube.com/@%E0%A6%9B%E0%A6%BF%E0%A6%B0%E0%A6%BF%E0%A6%95%E0%A7%8B%E0%A6%9F%E0%A6%BF%E0%A6%AF%E0%A6%BC%E0%A6%BE%E0%A6%B9%E0%A6%BE%E0%A6%AB%E0%A7%87%E0%A6%9C%E0%A6%BF%E0%A6%AF%E0%A6%BC%E0%A6%BE%E0%A6%A8%E0%A7%82%E0%A6%B0%E0%A6%BE%E0%A6%A8%E0%A7%80%E0%A6%AE%E0%A6%A1%E0%A7%87%E0%A6%B2/videos">সকল ভিডিও</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($videoGallery as $row)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="video h-100">
                            <img class="img-fluid rounded w-100 h-100 youtube-thumbnail"
                                data-src="{{ $row->youtube_link }}"
                                style="object-fit: cover;" alt="YouTube Thumbnail">

                            <button type="button" class="btn btn-play"
                                    data-bs-toggle="modal"
                                    data-src="{{ $row->youtube_link }}"
                                    data-bs-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- Video Gallery End -->

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
    <div class="container-fluid team pb-5" id="aboutTeachers">
        <div class="container pb-5">
            <div class="pb-5">
                <div class="row g-4 align-items-end">
                    <div class="col-xl-8">
                        <h4 class="text-success sub-title fw-bold bangla">শিক্ষক মন্ডলী</h4><br>
                    </div>
                </div>
            </div>
            <div class="team-carousel owl-carousel pt-5 wow fadeInUp" data-wow-delay="0.1s">
                @foreach($teachers as $row)
                    <div class="team-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-img bg-white rounded-top">
                            <img src="{{ asset("assets/admin/$row->profile_pic") }}" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="team-content text-center p-4">
                            <a href="#" class="h4"><span class="bangla text-white">{{ $row->name_bn }}</span></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- Team End -->

@endsection

@section('js')


@endsection
