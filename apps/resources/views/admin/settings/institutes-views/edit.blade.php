@extends('admin.themes.main')

@section('page-title') IMA | Dashboard @endsection

@section('page-body')

    @include('admin.settings.links')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Update Shifts
                </h5>
                <a href="{{ route('institutes.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('institutes.update',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">প্রতিষ্ঠানের নাম (English) <span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ $data->name_en }}"
                                type="text"
                                class="form-control @error('name_en') is-invalid @enderror"
                                name="name_en">
                        <span class="text-danger"> @error('name_en') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">প্রতিষ্ঠানের নাম (বাংলা) <span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ $data->name_bn }}"
                                type="text"
                                class="form-control @error('name_bn') is-invalid @enderror"
                                name="name_bn">
                        <span class="text-danger"> @error('name_bn') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ঠিকানা (English)</label>
                        <input  value="{{ $data->address_en }}"
                                type="text"
                                class="form-control @error('address_en') is-invalid @enderror"
                                name="address_en">
                        <span class="text-danger"> @error('address_en') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ঠিকানা (বাংলা) <span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ $data->address_bn }}"
                                type="text"
                                class="form-control @error('address_bn') is-invalid @enderror"
                                name="address_bn">
                        <span class="text-danger"> @error('address_bn') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">EIIN নাম্বার</label>
                        <input  value="{{ $data->eiin_number }}"
                                type="text"
                                class="form-control @error('eiin_number') is-invalid @enderror"
                                name="eiin_number">
                        <span class="text-danger"> @error('eiin_number') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">মোবাইল <span class="text-danger ms-2">(*)</span></label>
                        <input  value="{{ $data->mobile }}"
                                type="text"
                                class="form-control @error('mobile') is-invalid @enderror"
                                name="mobile">
                        <span class="text-danger"> @error('mobile') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ই-মেইল</label>
                        <input  value="{{ $data->email }}"
                                type="text"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email">
                        <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ওয়েবসাইট</label>
                        <input  value="{{ $data->website }}"
                                type="text"
                                class="form-control @error('website') is-invalid @enderror"
                                name="website">
                        <span class="text-danger"> @error('website') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">লগো</label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->logo) }}"
                            class="my-3"
                            width="100px"
                            id="logo">
                        <input  type="file"
                                class="form-control @error('logo') is-invalid @enderror"
                                name="logo"
                                onchange="document.querySelector('#logo').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('logo') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">অফিস পেড</label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->office_pad) }}"
                            class="my-3"
                            width="200px"
                            id="office_pad">
                        <input  type="file"
                                class="form-control @error('office_pad') is-invalid @enderror"
                                name="office_pad"
                                onchange="document.querySelector('#office_pad').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('office_pad') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">আইডি কার্ড (কর্মচারী) </label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->id_card_front_employee) }}"
                            class="my-3"
                            width="200px"
                            id="id_card_front_employee">
                        <input  type="file"
                                class="form-control @error('id_card_front_employee') is-invalid @enderror"
                                name="id_card_front_employee"
                                onchange="document.querySelector('#id_card_front_employee').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('id_card_front_employee') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">আইডি কার্ড (শিক্ষার্থী) </label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->id_card_front_student) }}"
                            class="my-3"
                            width="200px"
                            id="id_card_front_student">
                        <input  type="file"
                                class="form-control @error('id_card_front_student') is-invalid @enderror"
                                name="id_card_front_student"
                                onchange="document.querySelector('#id_card_front_student').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('id_card_front_student') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">আইডি কার্ড পিছনের পার্ট </label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->id_card_back) }}"
                            class="my-3"
                            width="200px"
                            id="id_card_back">
                        <input  type="file"
                                class="form-control @error('id_card_back') is-invalid @enderror"
                                name="id_card_back"
                                onchange="document.querySelector('#id_card_back').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('id_card_back') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">এডমিট কার্ড </label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->exam_admit_card) }}"
                            class="my-3"
                            width="50%"
                            id="exam_admit_card">
                        <input  type="file"
                                class="form-control @error('exam_admit_card') is-invalid @enderror"
                                name="exam_admit_card"
                                onchange="document.querySelector('#exam_admit_card').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('exam_admit_card') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">পরিক্ষার সিট স্টিকার </label><br>
                        <img src="{{ asset('apps/storage/app/public/' . $data->exam_seat_sticker) }}"
                            class="my-3"
                            width="200px"
                            id="exam_seat_sticker">
                        <input  type="file"
                                class="form-control @error('exam_seat_sticker') is-invalid @enderror"
                                name="exam_seat_sticker"
                                onchange="document.querySelector('#exam_seat_sticker').src=window.URL.createObjectURL(this.files[0])">
                        <span class="text-danger"> @error('exam_seat_sticker') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ম্যাপ লোকেশন</label>
                        <input  value="{{ $data->google_map }}"
                                type="text"
                                class="form-control @error('google_map') is-invalid @enderror"
                                name="google_map">
                        <span class="text-danger"> @error('google_map') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ক্রমিক তালিকা</label>
                        <input  value="{{ $data->display_order }}"
                                type="number"
                                class="form-control @error('display_order') is-invalid @enderror"
                                name="display_order">
                        <span class="text-danger"> @error('display_order') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

