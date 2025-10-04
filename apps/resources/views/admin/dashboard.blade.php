@extends('admin.themes.main')

@section('page-title') IMA | Dashboard @endsection

@section('page-body')

    <div class="tab-content" id="pills-tabContent">
        <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row g-4">
                <div class="col-lg-5 col-xl-3 col-xxl-2">
                    <div class="d-flex gap-3 flex-column justify-content-between h-100">
                        <a href="{{ route('students.index'); }}" class="link-success">
                            <div class="card justify-content-center h-100 p-4 rounded-15">
                                <div class="d-flex gap-2 align-items-center justify-content-between">
                                    <div>
                                        <p class="fs-16 fw-medium mb-1">
                                            Total Students
                                        </p>
                                        <h3 class="mb-0 fw-bold">
                                            {{ $students }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('employee.index'); }}" class="link-success">
                            <div class="card justify-content-center h-100 p-4 rounded-15">
                                <div class="d-flex gap-2 align-items-center justify-content-between">
                                    <div>
                                        <p class="fs-16 fw-medium mb-1">
                                            Total Employee
                                        </p>
                                        <h3 class="mb-0 fw-bold">{{ $employee }}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('dashboard'); }}" class="link-success">
                            <div class="card justify-content-center h-100 p-4 rounded-15">
                                <div class="d-flex gap-2 align-items-center justify-content-between">
                                    <div>
                                        <p class="fs-16 fw-medium mb-1">
                                            SMS Balance
                                        </p>
                                        <h3 class="mb-0 fw-bold">
                                            {{ $smsBalance }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- <div class="col-lg-7 col-xl-5 col-xxl-6">
                    <div class="card h-100 rounded-15">
                        <div class="card-header d-flex pb-2 align-items-center justify-content-between">
                            <h5 class="m-0 fs-18 fw-semi-bold">Daily attendance statistic (department wise)</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div id="attendance"></div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-5 col-xl-4">
                    <div class="card h-100 rounded-15">
                        <div class="card-header align-items-center">
                            <h5 class="m-0 fs-18 fw-semi-bold text-color-1">Leave Application</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Amy Aphrodite Zamora Peck
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Reason : scszCd
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Approved
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Maisha Lucy Zamora Gonzales
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Reason :
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Approved
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Maisha Lucy Zamora Gonzales
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Reason :
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Approved
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Maisha Lucy Zamora Gonzales
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Reason :
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Approved
                                    </p>
                                </div>
                            </div>
                            <div class="py-3">
                                <a href="https://hrm.bdtask-demoserver.com/hr/leaves/index" class="d-flex gap-1 align-items-center justify-content-center lh-lg fs-14 fw-semi-bold text-color-3">
                                    See All Request
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 4H10M10 4L6.75 1M10 4L6.75 7" stroke="#00B074" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-5 col-xl-4">
                    <div class="card h-100 rounded-15">
                        <div class="card-header align-items-center">
                            <h5 class="m-0 fs-18 fw-semi-bold text-color-1">New recruitment</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Test Candidate
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Date : 24-06-2025
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Recruit
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Ch. Monalisa Subudhi
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Date : 03-03-2025
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Recruit
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
                                <div class="d-flex align-items-start gap-3">
                                    <img class="rounded-3 dashboard-user-img" src="{{ asset(Auth::user()->profile_pic) }}" alt="" />
                                    <div>
                                        <p class="mb-2 lh-1 fs-18 fw-semi-bold text-color-1">
                                            Mohmed Afif Akram
                                        </p>
                                        <p class="mb-2 lh-1 fs-14 fw-normal">

                                        </p>
                                        <p class="mb-0 lh-1 fs-14 fw-medium">
                                            Date : 02-11-2024
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-soft-success w-px-90 rounded-3 p-1">
                                    <p class="mb-0 fs-14 fw-semi-bold text-color-3 text-center">
                                        Recruit
                                    </p>
                                </div>
                            </div>
                            <div class="py-3">
                                <a href="https://hrm.bdtask-demoserver.com/hr/selection" class="d-flex gap-1 align-items-center justify-content-center lh-lg fs-14 fw-semi-bold">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection

