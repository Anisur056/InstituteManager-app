<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('page-title')</title>

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
        <link href="{{ asset('assets/website/css/bootstrap.min.css?v=1.0') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/website/css/style.css?v=1.0') }}" rel="stylesheet">

        @yield('css')

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
        <div class="contact-top-header d-none d-lg-block">
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
                            +880 1892-178778, +880 1621-986417
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
                        <td class="bg-success text-white" style="font-weight: bold; width: 130px; padding-left:10px;">সর্বশেষ নোটিশ-</td>
                        <td class="bg-light text-danger" style="font-weight: bold; padding-top:5px;">
                            <marquee behavior="scroll" direction="left">
                                @foreach($notices as $row){{ $row->title }} &nbsp; <i class='fas fa-chess-board'></i>  &nbsp; @endforeach
                            </marquee>
                        </td>
                    </tr>
                </tbody>
            </table>
        <!-- Announcement End -->

        <!-- Top Navbar Start -->
        @include('website.themes.topNav')

        <!-- Body Content -->
        @yield('page-body')
        
        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s" id="footer">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                
                                <img class="w-100 w-lg-100" src="{{ asset('assets/website/img/logo-banner.png') }}" alt="Logo">
                                <p class="text-white mb-4 mt-3">ধর্মীয় ও আধুনিক শিক্ষার সমন্বিত ব্যতিক্রমী শিক্ষা প্রতিষ্ঠান</p>
                                
                                <div class="d-flex">
                                    <a class="btn btn-lg-square btn-light rounded-3 me-2" target="_blank" href="https://www.facebook.com/profile.php?id=100067806348409"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg-square btn-light rounded-3 me-2" target="_blank" href="https://www.youtube.com/@%E0%A6%9B%E0%A6%BF%E0%A6%B0%E0%A6%BF%E0%A6%95%E0%A7%8B%E0%A6%9F%E0%A6%BF%E0%A6%AF%E0%A6%BC%E0%A6%BE%E0%A6%B9%E0%A6%BE%E0%A6%AB%E0%A7%87%E0%A6%9C%E0%A6%BF%E0%A6%AF%E0%A6%BC%E0%A6%BE%E0%A6%A8%E0%A7%82%E0%A6%B0%E0%A6%BE%E0%A6%A8%E0%A7%80%E0%A6%AE%E0%A6%A1%E0%A7%87%E0%A6%B2/videos"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4 bangla">যোগাযোগ</h4>
                            <hr>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="text-white ms-2">
                                    <p class="mb-0">ক্যাম্পাস-১ : হাজী দরবেশ আলী চৌধুরী বাড়ী, বিশ্বাস পাড়া, উত্তর কাট্টলী, আকবরশাহ, চট্টগ্রাম।</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="text-white ms-2">
                                    <p class="mb-0">ক্যাম্পাস-2 : চৌধুরী ভিলা, পঞ্চায়েত বাড়ী, উত্তর কাট্টলী, আকবরশাহ, চট্টগ্রাম।</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-mobile"></i>
                                <div class="text-white ms-2">
                                    <p class="mb-0">018 92- 17 87 78</p>
                                    <p class="mb-0">016 21- 98 64 17</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope"></i>
                                <div class="text-white ms-2">
                                    <p class="mb-0">sirikotiamadrasha@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4 bangla">গুরুত্বপূর্ণ লিংক</h4>
                            <hr>
                            <a target="_blank" href="https://nctb.portal.gov.bd/site/page/c57df64c-7ea0-4d93-a915-3921181dbefc" class="footer-link"> ২০২৫ শিক্ষাবর্ষের সরকারী বই</a>
                            <a target="_blank" href="https://www.vaxepi.gov.bd/registration/tcv" class="footer-link"> টায়ফয়েড টিকা আবেদন</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4 bangla">ওয়েবসাইট লিংক</h4>
                            <hr>
                            <a target="_blank" href="" class="footer-link"> প্রচ্ছদ</a>
                            <a target="_blank" href="" class="footer-link"> ভর্তি আবেদন</a>
                            <a target="_blank" href="" class="footer-link"> অভিজ্ঞ শিক্ষকমন্ডলী</a>
                            <a target="_blank" href="" class="footer-link"> সুযোগ-সুবিধা</a>
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
                        <span class="text-white"><a href="{{ route('home') }}" class="text-success"><i class="fas fa-copyright text-light me-2"></i>ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা</a>, সর্বস্বত্ব সংরক্ষিত ।</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        Developed By <a class="border-bottom text-white" href="mailto:anis14109@gmail.com">Anisur Rahman</a>
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
    <script src="{{ asset('assets/website/js/main.js?v=1.0') }}"></script>
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

    @yield('js')


</html>
