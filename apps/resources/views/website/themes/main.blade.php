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
        <link href="{{ asset('assets/website/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">

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
                        <td class="bg-success text-white" style="font-weight: bold; width: 130px; padding-left:10px;">সর্বশেষ নোটিশ -</td>
                        <td class="bg-light text-danger" style="font-weight: bold; padding-top:5px;">
                            <marquee behavior="scroll" direction="left">
                                ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসার ওয়েবসাইটে আপনাকে স্বাগতম। &nbsp; <i class='fas fa-chess-board'></i>  &nbsp;
                                @foreach($notice as $row){{ $row->title }} &nbsp; <i class='fas fa-chess-board'></i>  &nbsp; @endforeach
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

    @yield('js')


</html>
