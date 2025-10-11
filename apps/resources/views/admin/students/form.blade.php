{{-- Student Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1">
        <h3>Student Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Enrollment Date:</label>
                <div class="col-md-8 ">
                    <input name="joined_at"
                        type="date"
                        class="form-control @error('joined_at') is-invalid @enderror"
                        value="{{ old('joined_at', $data->joined_at ?? '') }}">

                    <span class="text-danger"> @error('joined_at') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Student Name: <span class="text-danger">(*)</span></label>
                <div class="col-md-8 ">
                    <input  value="{{ old('name', $data->name ?? '') }}"
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
                <label class="col-md-4 mb-2"> Designation: </label>
                <div class="col-md-8">
                    <select name="role" class="form-control select2">
                        <option value="student">Student</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Class: </label>
                <div class="col-md-8 ">
                    <select name="class" class="form-control select2">
                        @foreach ($classes as $data)
                            <option value="{{ $data->name_en }}">{{ $data->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Class Roll: </label>
                <div class="col-md-8 ">
                    <input  value="{{ old('roll') }}"
                            type="text"
                            class="form-control @error('roll') is-invalid @enderror"
                            placeholder="Class Roll"
                            name="roll">
                    <span class="text-danger"> @error('roll') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Email: </label>
                <div class="col-md-8 ">
                    <input  value="{{ old('email') }}"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="aaaa@gmail.com"
                            name="email">
                    <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    <span class="text-success"> For Login & Recovery </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2">
                    Password:
                    <span onclick="togglePasswordVisibility()">
                        <i class="fa fa-eye" aria-hidden="true"></i></span>
                </label>
                <div class="col-md-8 ">
                    <input  value="{{ old('password') }}"
                            type="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="****"
                            name="password">
                    <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                    <span class="text-success"> For Login </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Contact No: <br> <span class="text-danger">(for sms) *</span>   </label>
                <div class="col-md-8 mb-3">
                    <input  value="{{ old('contact_sms') }}"
                            type="text"
                            class="form-control @error('contact_sms') is-invalid @enderror"
                            placeholder="01xxxxxxxxx 11 Digit Only"
                            name="contact_sms">
                    <span class="text-danger"> @error('contact_sms') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Whatsapp No: </label>
                <div class="col-md-8 mb-3 ">
                    <input  value="{{ old('contact_whatsapp') }}"
                            type="text"
                            class="form-control @error('contact_whatsapp') is-invalid @enderror"
                            placeholder="01xxxxxxxxx 11 Digit Only"
                            name="contact_whatsapp">
                    <span class="text-danger"> @error('contact_whatsapp') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Enable SMS: </label>
                <div class="col-md-8">
                    <select name="sms_status" class="form-control select2">
                        <option value="on">On</option>
                        <option value="off">Off</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> NID: </label>
                <div class="col-md-8 ">
                    <input  value="{{ old('nid') }}"
                            type="text"
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
                            type="text"
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
                            type="text"
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
                            placeholder="C/O:           Vill:           P.O:            P.S:            Dist:"
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
                            placeholder="C/O:           Vill:           P.O:            P.S:            Dist:"
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
                            type="text"
                            class="form-control @error('rfid_card') is-invalid @enderror"
                            placeholder="0002500000"
                            name="rfid_card">
                    <span class="text-danger"> @error('rfid_card') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-4 mb-2"> Active Status: </label>
                <div class="col-md-8">
                    <select name="status" class="form-control select2">
                        <option value="active">Active</option>
                        <option value="disable">disable</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Profile Pic & Signature Uploads --}}
        <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-12 mb-3">
                    <label for="formFile" class="form-label">Select Profile Pic</label><br>
                    <img id="update_pic_file"
                        src="{{ asset('assets/admin/img/users/user.png') }}"
                        class="mb-3"
                        width="112px" height="140px"><br>

                    <span>112px x 140px</span>
                    <input class="form-control"
                        type="file"
                        name="profile_pic"
                        onchange="document.querySelector('#update_pic_file').src=window.URL.createObjectURL(this.files[0])">
                    <span class="text-danger"> @error('profile_pic') {{$message}} @enderror </span>
                </div>
        </div>{{-- Profile Pic & Signature Uploads --}}

    </div>
</div>{{-- /Student Information --}}
