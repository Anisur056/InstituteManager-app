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
                            <span>112px x 140px</span>

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
                                <label class="col-md-4 mb-2"> Joining Date:</label>
                                <div class="col-md-8 ">
                                    <input name="joined_at"
                                        type="date"
                                        class="form-control @error('joined_at') is-invalid @enderror"
                                        value="{{ now()->format('Y-m-d'); }}">
                                    <span class="text-danger"> @error('joined_at') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Student Name: <span class="text-danger">(*)</span></label>
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
                                <label class="col-md-4 mb-2"> Email: <br> <span class="text-danger">(For Login & Recovery) *</span> </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('email') }}"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="aaaa@gmail.com"
                                            name="email">
                                    <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Password: <br> <span class="text-danger">(For Login) *</span></label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('password') }}"
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="****"
                                            name="password">
                                    <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Contact No: <br> <span class="text-danger">(for sms) *</span>   </label>
                                <div class="col-md-8 mb-3">
                                    <input  value="{{ old('contact_sms') }}"
                                            type="number"
                                            class="form-control @error('contact_sms') is-invalid @enderror"
                                            placeholder="01xxxxxxxxx 11 Digit Only"
                                            name="contact_sms">
                                    <span class="text-danger"> @error('contact_sms') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Enable SMS:</label>
                                <div class="col-md-8 mb-3">
                                    <div class="form-check form-switch">
                                        <input name="sms_status" value="on" class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" checked>
                                        <label class="form-check-label" for="switchCheckChecked">On/ Off SMS Feature</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
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
                                <label class="col-md-4 mb-2"> Gender: </label>
                                <div class="col-md-8 ">
                                    <select name="gender" class="form-control select2">
                                        <option value="">Select...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Blood Group: </label>
                                <div class="col-md-8">
                                    <select name="blood_group" class="form-control select2">
                                        <option value="">Select...</option>
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
                                <label class="col-md-4 mb-2"> Marital Status: </label>
                                <div class="col-md-8 ">
                                    <select name="marital_status" class="form-control select2">
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
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
                                <label class="col-md-4 mb-2"> Present Address: </label>
                                <div class="col-md-8 mb-3">
                                    <textarea value="{{ old('present_address') }}"
                                            class="form-control @error('present_address') is-invalid @enderror"
                                            placeholder="C/O:..., Road:..., P.O:..., P.S:..., Dist:..."
                                            name="present_address"></textarea>
                                    <span class="text-danger"> @error('present_address') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
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

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> RFID Card: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ old('rfid_card') }}"
                                            type="number"
                                            class="form-control @error('rfid_card') is-invalid @enderror"
                                            placeholder="10 Digit Number"
                                            name="rfid_card">
                                    <span class="text-danger"> @error('rfid_card') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">

                                <label class="col-md-4 mb-2"> Signature Uploads: </label>

                                <img id="signature"
                                    src="{{ asset('assets/admin/img/signature/01.jpg') }}"
                                    class="mb-3"
                                    width="100%" height="70px">
                                
                                <span>300px x 70px</span>

                                <div class="col-md-8 ">
                                    <input class="form-control"
                                        type="file"
                                        name="signature"
                                        style="width:112px;"
                                        onchange="document.querySelector('#signature').src=window.URL.createObjectURL(this.files[0])">
                                    <span class="text-danger"> @error('signature') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>{{-- /Student Information --}}

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

