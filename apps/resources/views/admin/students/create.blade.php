@extends('admin.themes.main')

@section('page-title') New Admission @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" /><!-- /Select2 -->
@endsection

@section('page-body')

    @include('admin.students.links')

    <div class="card my-3 p-3 text-danger">
        <ul>
            <li>অবশ্যই লাল স্টার মার্ক এর সকল তথ্য পূরণ করা আবশ্যিক। </li>
            <li>ছবি আপলোডের ক্ষেত্রে অবশ্যই ছবির সাইজ (২২৫ প্রস্থ, ২৮৫ উচ্চতা) এবং ১৫০ কিলোবাইটের নিচে হতে হবে। </li>
            <li>সকল তথ্য যথাযথভাবে যাচাই করে সাবমিট করুন।  </li>
            <li> বিস্তারিত জানার জন্য প্রতিষ্ঠানের মোবাইলে যোগাযোগ করুন। </li>
        </ul>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card rounded-15">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- Application Header & Profile Pic --}}
                <div class="row">
                    <div class="w-p100 mx-15 d-md-flex align-items-center">
                        <div class="text-center" style="flex: 1">
                            <div class="text-center">
                            <img src="{{ asset('assets/admin/img/logo/favicon.png') }}" alt="Logo" width="75" height="75">
                            <div class="text-center mt-15">
                                <div class="title-en">Institute Management Application</div>
                            </div>
                            </div>
                            <h2 class="heading"> Online Admission Form </h2>
                        </div>
                        <div class="preview-image text-center">
                            <img id="update_pic_file"
                                src="{{ asset('assets/admin/img/users/user.png') }}"
                                class="mb-3"
                                width="112px" height="140px">

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Select Profile Pic</label>
                                <input class="form-control"
                                    type="file"
                                    name="profile_pic"
                                    style="width:112px;"
                                    onchange="document.querySelector('#update_pic_file').src=window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger"> @error('profile_pic') {{$message}} @enderror </span>
                            </div>
                        </div>
                    </div>
                </div>{{-- /Application Header & Profile Pic --}}

                {{-- Student Information --}}
                <div class="card p-2 mb-3 border border-success">
                    <header class="card-header p-1">
                        <h3>Student Information</h3>
                    </header>
                    <div class="card-body row">

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Student Name: * </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('name') }}"
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="In English"
                                            name="name">
                                    <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> শিক্ষার্থীর নাম: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('name_bn') }}"
                                            type="text"
                                            class="form-control @error('name_bn') is-invalid @enderror"
                                            placeholder="In Bangla"
                                            name="name_bn">
                                    <span class="text-danger"> @error('name_bn') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Email: <br> (For Login & Recovery) *</label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('email') }}"
                                            type="text"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Ex- aaaa@gmail.com"
                                            name="email">
                                    <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Password: <br> (For Login) *</label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('password') }}"
                                            type="text"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="****"
                                            name="password">
                                    <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Date of Birth: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('date_of_birth') }}"
                                            type="date"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth">
                                    <span class="text-danger"> @error('date_of_birth') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Birth Registration: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('birth_reg') }}"
                                            type="number"
                                            class="form-control @error('birth_reg') is-invalid @enderror"
                                            placeholder="17-Digits Number"
                                            name="birth_reg">
                                    <span class="text-danger"> @error('birth_reg') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> NID: (If Applicable) </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('nid') }}"
                                            type="number"
                                            class="form-control @error('nid') is-invalid @enderror"
                                            placeholder="10/17-Digit number"
                                            name="nid">
                                    <span class="text-danger"> @error('nid') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Gender: </label>
                                <div class="col-md-8 ">
                                    <select name="gender" class="form-control select2">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Religion: </label>
                                <div class="col-md-8 ">
                                    <select name="religion" class="form-control select2">
                                        <option value="Islam">Islam</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Buddhism">Buddhism</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Judaism">Judaism</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Blood Group: </label>
                                <div class="col-md-8">
                                    <select name="blood_group" class="form-control select2">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Health Issues: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('health_issues') }}"
                                            type="text"
                                            class="form-control @error('health_issues') is-invalid @enderror"
                                            placeholder="If Applicable"
                                            name="health_issues">
                                    <span class="text-danger"> @error('health_issues') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Height: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('height') }}"
                                            type="text"
                                            class="form-control @error('height') is-invalid @enderror"
                                            placeholder="00 Feet 00Inch"
                                            name="height">
                                    <span class="text-danger"> @error('height') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Weight: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('weight') }}"
                                            type="number"
                                            class="form-control @error('weight') is-invalid @enderror"
                                            placeholder="Kilograms"
                                            name="weight">
                                    <span class="text-danger"> @error('weight') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Nationality: </label>
                                <div class="col-md-8 ">
                                    <select name="nationality" class="form-control select2">
                                        <option value="Bangladeshi">Bangladeshi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>{{-- /Student Information --}}

                {{-- Academic Information --}}
                <div class="card p-2 mb-3 border border-success">
                    <header class="card-header p-1">
                        <h3>Academic Information</h3>
                    </header>
                    <div class="card-body row">

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Admission Date: <span class="text-danger fs-5"> *</span> </label>
                                <div class="col-md-8 ">
                                    <input name="enrolled_date"
                                        type="date"
                                        class="form-control @error('enrolled_date') is-invalid @enderror"
                                        value="{{ now()->format('Y-m-d'); }}">
                                    <span class="text-danger"> @error('enrolled_date') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Academic Year: </label>
                                <div class="col-md-8 ">
                                    <select name="academic_year" class="form-control select2 @error('enrolled_date') is-invalid @enderror">
                                        @if ($years->count())
                                            <option value="null">Select...</option>
                                            @foreach ($years as $data)
                                                <option value="{{ $data->year_en }}">{{ $data->year_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Data found!</option>
                                        @endif
                                    </select>
                                    <span class="text-danger"> @error('academic_year') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Institute Name: </label>
                                <div class="col-md-8 ">
                                    <select name="institute_name" class="form-control select2">
                                        @if ($institutes->count())
                                            <option value="null">Select...</option>
                                            @foreach ($institutes as $data)
                                                <option value="{{ $data->name_en }}">{{ $data->name_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Data found!</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Shift: </label>
                                <div class="col-md-8 ">
                                    <select name="shift" class="form-control select2">
                                        @if ($shifs->count())
                                            <option value="null">Select...</option>
                                            @foreach ($shifs as $data)
                                                <option value="{{ $data->name_en }}">{{ $data->name_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Data found!</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Class: </label>
                                <div class="col-md-8 ">
                                    <select name="class" class="form-control select2">
                                        @if ($classes->count())
                                            <option value="null">Select...</option>
                                            @foreach ($classes as $data)
                                                <option value="{{ $data->name_en }}">{{ $data->name_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Data found!</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Section: </label>
                                <div class="col-md-8 ">
                                    <select name="section" class="form-control select2">
                                        @if ($sections->count())
                                            <option value="null">Select...</option>
                                            @foreach ($sections as $data)
                                                <option value="{{ $data->name_en }}">{{ $data->name_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Data found!</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Group: </label>
                                <div class="col-md-8 ">
                                    <select name="group" class="form-control select2">
                                        @if ($groups->count())
                                            <option value="null">Select...</option>
                                            @foreach ($groups as $data)
                                                <option value="{{ $data->name_en }}">{{ $data->name_en }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Data found!</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Class Roll: </label>
                                <div class="col-md-8 ">
                                    <input name="roll" type="number" class="form-control" placeholder="001">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> RFID Card No: </label>
                                <div class="col-md-8 ">
                                    <input name="rfid_card" type="number" class="form-control" placeholder="0001111111">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>{{-- /Academic Information --}}

                {{-- Contact Information --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-2 mb-3 border border-success">
                            <header class="card-header p-1">
                                <h3>Contact Information</h3>
                            </header>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-md-4 mb-2"> SMS Contact No: <small>(for sms)</small>   </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('contact_sms') }}"
                                                type="number"
                                                class="form-control @error('contact_sms') is-invalid @enderror"
                                                placeholder="01xxxxxxxxx"
                                                name="contact_sms">
                                        <span class="text-danger"> @error('contact_sms') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Enable SMS:</label>
                                    <div class="col-md-8 mb-3">
                                        <div class="form-check form-switch">
                                            <input name="sms_status" class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" checked>
                                            <label class="form-check-label" for="switchCheckChecked">On/ Off SMS Feature</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Whatsapp No: </label>
                                    <div class="col-md-8 mb-3 ">
                                        <input  value="{{ old('contact_whatsapp') }}"
                                                type="number"
                                                class="form-control @error('contact_whatsapp') is-invalid @enderror"
                                                placeholder="01xxxxxxxxx"
                                                name="contact_whatsapp">
                                        <span class="text-danger"> @error('contact_whatsapp') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Email Address: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('contact_email') }}"
                                                type="email"
                                                class="form-control @error('contact_email') is-invalid @enderror"
                                                placeholder="abc@gmail.com"
                                                name="contact_email">
                                        <span class="text-danger"> @error('contact_email') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Present Address: </label>
                                    <div class="col-md-8 mb-3">
                                        <textarea value="{{ old('present_address') }}"
                                                class="form-control @error('present_address') is-invalid @enderror"
                                                placeholder="C/O:..., Road:..., P.O:..., P.S:..., Dist:..."
                                                name="present_address"></textarea>
                                        <span class="text-danger"> @error('present_address') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Permanent Address: </label>
                                    <div class="col-md-8 mb-3">
                                        <textarea value="{{ old('permanent_address') }}"
                                                class="form-control @error('permanent_address') is-invalid @enderror"
                                                placeholder="C/O:..., Vill:..., P.O:..., P.S:..., Dist:..."
                                                name="permanent_address"></textarea>
                                        <span class="text-danger"> @error('permanent_address') {{$message}} @enderror </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-2 mb-3 border border-success">
                            <header class="card-header p-1">
                                <h3>Emergency Contact Information</h3>
                            </header>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Name: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('emergency_contact_name') }}"
                                                type="text"
                                                class="form-control @error('emergency_contact_name') is-invalid @enderror"
                                                placeholder="In English"
                                                name="emergency_contact_name">
                                        <span class="text-danger"> @error('emergency_contact_name') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Relation: </label>
                                    <div class="col-md-8 mb-3 ">
                                        <input  value="{{ old('emergency_contact_relation') }}"
                                                type="text"
                                                class="form-control @error('emergency_contact_relation') is-invalid @enderror"
                                                placeholder="Uncle/ Fufi Etc"
                                                name="emergency_contact_relation">
                                        <span class="text-danger"> @error('emergency_contact_relation') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Contact Number: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('emergency_contact_contact') }}"
                                                type="number"
                                                class="form-control @error('emergency_contact_contact') is-invalid @enderror"
                                                placeholder="01xxxxxxxxx"
                                                name="emergency_contact_contact">
                                        <span class="text-danger"> @error('emergency_contact_contact') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Address: </label>
                                    <div class="col-md-8 mb-3">
                                        <textarea value="{{ old('emergency_contact_address') }}"
                                                class="form-control @error('emergency_contact_address') is-invalid @enderror"
                                                placeholder="C/O:..., Road:..., P.O:..., P.S:..., Dist:..."
                                                name="emergency_contact_address"></textarea>
                                        <span class="text-danger"> @error('emergency_contact_address') {{$message}} @enderror </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>{{-- /Contact Information --}}

                {{-- Father Information & Mother Information Section --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-2 mb-3 border border-success">
                            <header class="card-header p-1">
                                <h3>Father Information</h3>
                            </header>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Father's name: <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_name_en') }}"
                                                type="text"
                                                class="form-control @error('father_name_en') is-invalid @enderror"
                                                placeholder="In English"
                                                name="father_name_en">
                                        <span class="text-danger"> @error('father_name_en') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> পিতার নাম: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_name_bn') }}"
                                                type="text"
                                                class="form-control @error('father_name_bn') is-invalid @enderror"
                                                placeholder="In Bangla"
                                                name="father_name_bn">
                                        <span class="text-danger"> @error('father_name_bn') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Contact <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_contact') }}"
                                                type="number"
                                                class="form-control @error('father_contact') is-invalid @enderror"
                                                placeholder="01xxxxxxxxx"
                                                name="father_contact">
                                        <span class="text-danger"> @error('father_contact') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Occupation: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_occupation') }}"
                                                type="text"
                                                class="form-control @error('father_occupation') is-invalid @enderror"
                                                placeholder="Business/ Employee"
                                                name="father_occupation">
                                        <span class="text-danger"> @error('father_occupation') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Birth Registration </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_birth_reg') }}"
                                                type="number"
                                                class="form-control @error('father_birth_reg') is-invalid @enderror"
                                                placeholder="17-Digit Number"
                                                name="father_birth_reg">
                                        <span class="text-danger"> @error('father_birth_reg') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Nid (If Applicable) </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_nid') }}"
                                                type="number"
                                                class="form-control @error('father_nid') is-invalid @enderror"
                                                placeholder="10/17-Digit Number"
                                                name="father_nid">
                                        <span class="text-danger"> @error('father_nid') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Income : </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('father_income') }}"
                                                type="number"
                                                class="form-control @error('father_income') is-invalid @enderror"
                                                placeholder="Taka Per Year"
                                                name="father_income">
                                        <span class="text-danger"> @error('father_income') {{$message}} @enderror </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-2 mb-3 border border-success">
                            <header class="card-header p-1">
                                <h3>Mother Information</h3>
                            </header>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Mother's name: <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_name_en') }}"
                                                type="text"
                                                class="form-control @error('mother_name_en') is-invalid @enderror"
                                                placeholder="In English"
                                                name="mother_name_en">
                                        <span class="text-danger"> @error('mother_name_en') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> মাতার নাম: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_name_bn') }}"
                                                type="text"
                                                class="form-control @error('mother_name_bn') is-invalid @enderror"
                                                placeholder="In Bangla"
                                                name="mother_name_bn">
                                        <span class="text-danger"> @error('mother_name_bn') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Contact <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_contact') }}"
                                                type="number"
                                                class="form-control @error('mother_contact') is-invalid @enderror"
                                                placeholder="01xxxxxxxxx"
                                                name="mother_contact">
                                        <span class="text-danger"> @error('mother_contact') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Occupation: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_occupation') }}"
                                                type="text"
                                                class="form-control @error('mother_occupation') is-invalid @enderror"
                                                placeholder="Business/ Employee"
                                                name="mother_occupation">
                                        <span class="text-danger"> @error('mother_occupation') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Birth Registration </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_birth_reg') }}"
                                                type="number"
                                                class="form-control @error('mother_birth_reg') is-invalid @enderror"
                                                placeholder="17-Digit Number"
                                                name="mother_birth_reg">
                                        <span class="text-danger"> @error('mother_birth_reg') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Nid (If Applicable) </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_nid') }}"
                                                type="number"
                                                class="form-control @error('mother_nid') is-invalid @enderror"
                                                placeholder="10/17-Digit Number"
                                                name="mother_nid">
                                        <span class="text-danger"> @error('mother_nid') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Income : </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('mother_income') }}"
                                                type="number"
                                                class="form-control @error('mother_income') is-invalid @enderror"
                                                placeholder="Taka Per Year"
                                                name="mother_income">
                                        <span class="text-danger"> @error('mother_income') {{$message}} @enderror </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>{{-- /Father Information & Mother Information Section --}}

                {{-- Local Guardian & Previous Institute Section --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-2 mb-3 border border-success">
                            <header class="card-header p-1">
                                <h3>Local Guardian Info <span class="fs-5">(If Applicable)</span></h3>
                            </header>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Name: <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('local_guardian_name_en') }}"
                                                type="text"
                                                class="form-control @error('local_guardian_name_en') is-invalid @enderror"
                                                placeholder="In English"
                                                name="local_guardian_name_en">
                                        <span class="text-danger"> @error('local_guardian_name_en') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> নাম: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('local_guardian_name_bn') }}"
                                                type="text"
                                                class="form-control @error('local_guardian_name_bn') is-invalid @enderror"
                                                placeholder="In Bangla"
                                                name="local_guardian_name_bn">
                                        <span class="text-danger"> @error('local_guardian_name_bn') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Relation <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('local_guardian_relation') }}"
                                                type="text"
                                                class="form-control @error('local_guardian_relation') is-invalid @enderror"
                                                placeholder="Uncle/ Fufi"
                                                name="local_guardian_relation">
                                        <span class="text-danger"> @error('local_guardian_relation') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Contact: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('local_guardian_contact') }}"
                                                type="number"
                                                class="form-control @error('local_guardian_contact') is-invalid @enderror"
                                                placeholder="01xxxxxxxxx"
                                                name="local_guardian_contact">
                                        <span class="text-danger"> @error('local_guardian_contact') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Nid (If Applicable) </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('local_guardian_nid') }}"
                                                type="number"
                                                class="form-control @error('local_guardian_nid') is-invalid @enderror"
                                                placeholder="10/17-Digit Number"
                                                name="local_guardian_nid">
                                        <span class="text-danger"> @error('local_guardian_nid') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Address: </label>
                                    <div class="col-md-8 mb-3">
                                        <textarea value="{{ old('local_guardian_address') }}"
                                                class="form-control @error('previous_institute_address') is-invalid @enderror"
                                                placeholder="C/O:..., Road:..., P.O:..., P.S:..., Dist:..."
                                                name="local_guardian_address"></textarea>
                                        <span class="text-danger"> @error('local_guardian_address') {{$message}} @enderror </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-2 mb-3 border border-success">
                            <header class="card-header p-1">
                                <h3>Previous Institute Information</h3>
                            </header>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Institute name: <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('previous_institute') }}"
                                                type="text"
                                                class="form-control @error('previous_institute') is-invalid @enderror"
                                                placeholder=""
                                                name="previous_institute">
                                        <span class="text-danger"> @error('previous_institute') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> Institute address: </label>
                                    <div class="col-md-8 mb-3">
                                        <textarea value="{{ old('previous_institute_address') }}"
                                                class="form-control @error('previous_institute_address') is-invalid @enderror"
                                                placeholder="C/O:..., Road:..., P.O:..., P.S:..., Dist:..."
                                                name="previous_institute_address"></textarea>
                                        <span class="text-danger"> @error('previous_institute_address') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> T.C. No. <span class="text-danger fs-5"> *</span> </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('previous_institute_tc_number') }}"
                                                type="number"
                                                class="form-control @error('previous_institute_tc_number') is-invalid @enderror"
                                                placeholder=""
                                                name="previous_institute_tc_number">
                                        <span class="text-danger"> @error('previous_institute_tc_number') {{$message}} @enderror </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-4 mb-2"> T.C. Date: </label>
                                    <div class="col-md-8 mb-3">
                                        <input  value="{{ old('previous_institute_tc_date') }}"
                                                type="date"
                                                class="form-control @error('previous_institute_tc_date') is-invalid @enderror"
                                                placeholder="Business/ Employee"
                                                name="previous_institute_tc_date">
                                        <span class="text-danger"> @error('previous_institute_tc_date') {{$message}} @enderror </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>{{-- /Local Guardian & Previous Institute Section --}}

                <div class="card-footer">
                    <button type="submit" class="btn btn-success rounded"><i class="fa fa-floppy-o pe-2"></i> Save </button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('assets/admin/js/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <!-- /Select2 -->
@endsection

