<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('home') }}" class="navbar-brand me-auto me-lg-0">
            {{-- <h1 class="text-primary m-0"><i class="fas fa-biohazard me-3"></i>JustDance</h1> --}}
            <img class="w-100 w-lg-50" src="{{ asset('assets/website/img/logo-banner.png') }}" alt="Logo">
        </a>

        <a href="{{ route('online.admission') }}" class="btn btn-success rounded-pill text-white py-1 px-3 me-2 d-block d-lg-none">
            <span class="bangla">ভর্তি আবেদন</span>
        </a>

        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active"><span class="bangla">প্রচ্ছদ</span></a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="bangla">আমাদের সম্পর্কে</span></a>
                    <div class="dropdown-menu m-0">
                        <a href="#aboutPrincipal" class="dropdown-item"><span class="bangla">প্রিন্সিপালের বার্তা</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">নূরানী বিভাগ</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">হিফজ বিভাগ</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">মক্তব বিভাগ</span></a>
                        <a href="#aboutTeachers" class="dropdown-item"><span class="bangla">শিক্ষক মন্ডলী</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">সুযোগ-সুবিধা</span></a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="bangla">ভর্তি</span></a>
                    <div class="dropdown-menu m-0">
                        <a href="#" class="dropdown-item"><span class="bangla">ভর্তির নিয়মাবলী</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">বেতন ও অন্যান্য ফি</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">ইউনির্ফম</span></a>
                        <a href="#" class="dropdown-item"><span class="bangla">ভর্তি ফরম</span></a>
                    </div>
                </div>
                <a href="#notice" class="nav-item nav-link"><span class="bangla">নোটিশ</span></a>
                <a href="#gallery" class="nav-item nav-link"><span class="bangla">গ্যালারী</span></a>
                <a href="#footer" class="nav-item nav-link"><span class="bangla">যোগাযোগ</span></a>
                <a href="{{ route('login') }}" class="nav-item nav-link"><span class="bangla">লগইন</span></a>
            </div>

            <a href="{{ route('online.admission') }}" class="btn btn-success rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0 d-none d-lg-block">
                <span class="bangla">ভর্তি আবেদন</span>
            </a>

        </div>
    </nav>
</div>
