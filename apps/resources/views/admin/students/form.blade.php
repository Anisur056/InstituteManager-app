{{-- Academic Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Academic Information</h3>
    </header>
    <div class="card-body row">

        @auth

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2"> Enrollment Date:</label>
                    <div class="col-md-12 ">
                        <input name="joined_at"
                            type="date"
                            class="form-control @error('joined_at') is-invalid @enderror"
                            value="{{ old('joined_at') ?: ($user->joined_at ?? date('Y-m-d')) }}">

                        <span class="text-danger"> @error('joined_at') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2">Academic Year: </label>
                    <div class="col-md-12 ">
                        <select name="academic_year" class="form-control select2 @error('academic_year') is-invalid @enderror">
                            @foreach ($academicYear as $year)
                                <option value="{{ $year->year_en }}"
                                    {{ old('academic_year', $year->year_en ?? '') == optional($user)->academic_year ? 'selected' : '' }}>
                                    {{ $year->year_en }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"> @error('academic_year') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2"> Institute Name: </label>
                    <div class="col-md-12 ">
                        <select name="institute_name" class="form-control select2">
                            <option value="null">Select</option>
                            @foreach ($instituteInfo as $info)
                                <option value="{{ $info->name_en }}"
                                    {{ old('institute_name', $info->name_en ?? '') == optional($user)->institute_name ? 'selected' : '' }}>
                                    {{ $info->name_en }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"> @error('institute_name') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

        @endauth

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Branch Name: </label>
                <div class="col-md-12 ">
                    <select name="branch" class="form-control select2">
                        <option value="null">Select</option>
                        @foreach ($instituteBranch as $branch)
                            <option value="{{ $branch->name_en }}" {{ old('branch', $branch->name_en ?? '') == optional($user)->branch ? 'selected' : '' }}>
                                {{ $branch->name_en }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger"> @error('branch') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Division: </label>
                <div class="col-md-12 ">
                    <select name="division" class="form-control select2">
                        <option value="null">Select</option>
                        @foreach ($instituteDivision as $division)
                            <option value="{{ $division->name_en }}" {{ old('division', $division->name_en ?? '') == optional($user)->division ? 'selected' : '' }}>
                                {{ $division->name_en }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger"> @error('division') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Class: </label>
                <div class="col-md-12 ">
                    <select name="class" class="form-control select2">
                        <option value="null">Select</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->name_en }}" {{ old('class', $class->name_en ?? '') == optional($user)->class ? 'selected' : '' }}>
                                {{ $class->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Shift: </label>
                <div class="col-md-12 ">
                    <select name="shift" class="form-control select2">
                        <option value="null">Select</option>
                        @foreach ($shifts as $shift)
                            <option value="{{ $shift->name_en }}" {{ old('shift', $shift->name_en ?? '') == optional($user)->shift ? 'selected' : '' }}>
                                {{ $shift->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> section: </label>
                <div class="col-md-12 ">
                    <select name="section" class="form-control select2">
                        <option value="null">Select</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->name_en }}" {{ old('section', $section->name_en ?? '') == optional($user)->section ? 'selected' : '' }}>
                                {{ $section->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Group: </label>
                <div class="col-md-12 ">
                    <select name="group" class="form-control select2">
                        <option value="null">Select</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->name_en }}" {{ old('group', $group->name_en ?? '') == optional($user)->group ? 'selected' : '' }}>
                                {{ $group->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        @auth

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2"> Roll:</label>
                    <div class="col-md-12 ">
                        <input  value="{{ old('roll', $user->roll ?? '') }}"
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
                    <label class="col-md-12 mb-2"> RFID Card:</label>
                    <div class="col-md-12 ">
                        <input  value="{{ old('rfid_card', $user->rfid_card ?? '') }}"
                                type="text"
                                class="form-control @error('rfid_card') is-invalid @enderror"
                                placeholder="RFID Number"
                                name="rfid_card">
                        <span class="text-danger"> @error('rfid_card') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2"> Registration ID:</label>
                    <div class="col-md-12 ">
                        <input  value="{{ old('registration_id', $user->registration_id ?? $registration_id) }}"
                                type="text"
                                class="form-control @error('registration_id') is-invalid @enderror"
                                placeholder="Registration ID"
                                name="registration_id">
                        <span class="text-danger"> @error('registration_id') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2">Student Status: </label>
                    <div class="col-md-12 ">
                        <select name="status" class="form-control select2">
                            <option value="active" {{ old('status', $user->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="pending" {{ old('status', $user->status ?? '') == 'pending' ? 'selected' : '' }}>Pending Admission</option>
                            <option value="disable" {{ old('status', $user->status ?? '') == 'disable' ? 'selected' : '' }}>Temporary Disable</option>
                            <option value="tc" {{ old('status', $user->status ?? '') == 'tc' ? 'selected' : '' }}>Transfer to Another Institution</option>
                            <option value="exam-complete" {{ old('status', $user->status ?? '') == 'exam-complete' ? 'selected' : '' }}>Board Exam Complete</option>
                            <option value="exit" {{ old('status', $user->status ?? '') == 'exit' ? 'selected' : '' }}>Exit from Institute</option>
                        </select>
                        <span class="text-danger"> @error('status') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

        @endauth

    </div>
</div>{{-- Academic Information --}}

{{-- Student Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Student Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Name (English): <span class="text-danger">*</span> </label>
                <div class="col-md-12 ">
                    <input name="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') ?: ($user->name ?? '') }}">

                    <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Name (Bangla): </label>
                <div class="col-md-12 ">
                    <input name="name_bn"
                        type="text"
                        class="form-control @error('name_bn') is-invalid @enderror"
                        value="{{ old('name_bn') ?: ($user->name_bn ?? '') }}">
                    <span class="text-danger"> @error('name_bn') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Nick Name: (Bangla) <span class="text-success">For SMS Name</span> </label>
                <div class="col-md-12 ">
                    <input name="nick_name"
                        type="text"
                        class="form-control @error('nick_name') is-invalid @enderror"
                        value="{{ old('nick_name') ?: ($user->nick_name ?? '') }}">
                    <span class="text-danger"> @error('nick_name') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2">NID Number (If Applicable): </label>
                <div class="col-md-12 ">
                    <input name="nid"
                        type="text"
                        class="form-control @error('nid') is-invalid @enderror"
                        value="{{ old('nid') ?: ($user->nid ?? '') }}">

                    <span class="text-danger"> @error('nid') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2">Birth Registration: </label>
                <div class="col-md-12 ">
                    <input name="birth_reg"
                        type="text"
                        class="form-control @error('birth_reg') is-invalid @enderror"
                        value="{{ old('birth_reg') ?: ($user->birth_reg ?? '') }}">

                    <span class="text-danger"> @error('birth_reg') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Date Of Birth:</label>
                <div class="col-md-12 ">
                    <input name="date_of_birth"
                        type="date"
                        class="form-control @error('date_of_birth') is-invalid @enderror"
                        value="{{ old('date_of_birth') ?: ($user->date_of_birth ?? '') }}">

                    <span class="text-danger"> @error('date_of_birth') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Gender: </label>
                <div class="col-md-12 ">
                    <select name="gender" class="form-control select2">
                        <option value="null">Select</option>
                        <option value="male" {{ old('gender', $user->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $user->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <span class="text-danger"> @error('gender') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2">Blood Group: </label>
                <div class="col-md-12 ">
                    <select name="blood_group" class="form-control select2">
                        <option value="null">Select</option>
                        <option value="A+" {{ old('blood_group', $user->blood_group ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ old('blood_group', $user->blood_group ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="AB+" {{ old('blood_group', $user->blood_group ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ old('blood_group', $user->blood_group ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="B+" {{ old('blood_group', $user->blood_group ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ old('blood_group', $user->blood_group ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="O+" {{ old('blood_group', $user->blood_group ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ old('blood_group', $user->blood_group ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
                    </select>
                    <span class="text-danger"> @error('blood_group') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Health Issues/ Known Diseases: (If Available)</label>
                <div class="col-md-12 ">
                    <input name="health_issues"
                        type="text"
                        class="form-control @error('health_issues') is-invalid @enderror"
                        value="{{ old('health_issues') ?: ($user->health_issues ?? '') }}">

                    <span class="text-danger"> @error('health_issues') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Height</label>
                <div class="col-md-12 ">
                    <input name="height"
                        type="text"
                        class="form-control @error('height') is-invalid @enderror"
                        value="{{ old('height') ?: ($user->height ?? '') }}">

                    <span class="text-danger"> @error('height') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Weight</label>
                <div class="col-md-12 ">
                    <input name="weight"
                        type="text"
                        class="form-control @error('weight') is-invalid @enderror"
                        value="{{ old('weight') ?: ($user->weight ?? '') }}">

                    <span class="text-danger"> @error('weight') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Marital Status</label>
                <div class="col-md-12 ">
                    <select name="marital_status" class="form-control select2">
                        <option value="single" {{ old('marital_status', $user->marital_status ?? '') == 'single' ? 'selected' : '' }}>Single</option>
                        <option value="married" {{ old('marital_status', $user->marital_status ?? '') == 'married' ? 'selected' : '' }}>Married</option>
                        <option value="divorced" {{ old('marital_status', $user->marital_status ?? '') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="widowed" {{ old('marital_status', $user->marital_status ?? '') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                    <span class="text-danger"> @error('marital_status') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Nationality</label>
                <div class="col-md-12 ">
                    <select name="nationality" class="form-control select2">
                        <option value="bangladeshi" {{ old('nationality', $user->nationality ?? '') == 'bangladeshi' ? 'selected' : '' }}>Bangladeshi</option>
                    </select>
                    <span class="text-danger"> @error('nationality') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Religion</label>
                <div class="col-md-12 ">
                    <select name="religion" class="form-control select2">
                        <option value="islam" {{ old('religion', $user->religion ?? '') == 'islam' ? 'selected' : '' }}>Islam</option>
                    </select>
                    <span class="text-danger"> @error('religion') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Student Picture:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="profile_pic"
                    id="profile_pic"
                    class="dropify"
                    title="Student Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->profile_pic ? asset('assets/' . optional($user)->profile_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Student Information --}}

{{-- Contact Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Contact Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Contact Number (For SMS): <span class="text-danger">*</span> </label>
                <div class="col-md-12 ">
                    <input name="contact_sms"
                        type="text"
                        class="form-control @error('contact_sms') is-invalid @enderror"
                        value="{{ old('contact_sms') ?: ($user->contact_sms ?? '') }}">

                    <span class="text-danger"> @error('contact_sms') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Whatsapp Number: </label>
                <div class="col-md-12 ">
                    <input name="contact_whatsapp"
                        type="text"
                        class="form-control @error('contact_whatsapp') is-invalid @enderror"
                        value="{{ old('contact_whatsapp') ?: ($user->contact_whatsapp ?? '') }}">
                    <span class="text-danger"> @error('contact_whatsapp') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Enable SMS</label>
                <div class="col-md-12 ">
                    <select name="sms_status" class="form-control select2">
                        <option value="on" {{ old('sms_status', $user->sms_status ?? '') == 'on' ? 'selected' : '' }}>On</option>
                        <option value="off" {{ old('sms_status', $user->sms_status ?? '') == 'off' ? 'selected' : '' }}>Off</option>
                    </select>
                    <span class="text-danger"> @error('sms_status') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Present Address</label>
                <div class="col-md-12 ">
                    <textarea
                        name="present_address"
                        class="form-control">{{ old('present_address') ?: ($user->present_address ?? '') }}</textarea>

                    <span class="text-danger"> @error('present_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Present Address</label>
                <div class="col-md-12 ">
                    <textarea
                        name="permanent_address"
                        class="form-control">{{ old('permanent_address') ?: ($user->permanent_address ?? '') }}</textarea>

                    <span class="text-danger"> @error('permanent_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Contact Information --}}

{{-- Father Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Father Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father Name:</label>
                <div class="col-md-12 ">
                    <input name="father_name_en"
                        type="text"
                        class="form-control @error('father_name_en') is-invalid @enderror"
                        value="{{ old('father_name_en') ?: ($user->father_name_en ?? '') }}">

                    <span class="text-danger"> @error('father_name_en') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father Name: (Bangla) </label>
                <div class="col-md-12 ">
                    <input name="father_name_bn"
                        type="text"
                        class="form-control @error('father_name_bn') is-invalid @enderror"
                        value="{{ old('father_name_bn') ?: ($user->father_name_bn ?? '') }}">

                    <span class="text-danger"> @error('father_name_bn') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Contact Number: </label>
                <div class="col-md-12 ">
                    <input name="father_contact"
                        type="text"
                        class="form-control @error('father_contact') is-invalid @enderror"
                        value="{{ old('father_contact') ?: ($user->father_contact ?? '') }}">

                    <span class="text-danger"> @error('father_contact') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father Occupation: </label>
                <div class="col-md-12 ">
                    <input name="father_occupation"
                        type="text"
                        class="form-control @error('father_occupation') is-invalid @enderror"
                        value="{{ old('father_occupation') ?: ($user->father_occupation ?? '') }}">

                    <span class="text-danger"> @error('father_occupation') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> NID: </label>
                <div class="col-md-12 ">
                    <input name="father_nid"
                        type="text"
                        class="form-control @error('father_nid') is-invalid @enderror"
                        value="{{ old('father_nid') ?: ($user->father_nid ?? '') }}">

                    <span class="text-danger"> @error('father_nid') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Birth Registration:</label>
                <div class="col-md-12 ">
                    <input name="father_birth_reg"
                        type="text"
                        class="form-control @error('father_birth_reg') is-invalid @enderror"
                        value="{{ old('father_birth_reg') ?: ($user->father_birth_reg ?? '') }}">

                    <span class="text-danger"> @error('father_birth_reg') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father Yearly Income:</label>
                <div class="col-md-12 ">
                    <input name="father_income"
                        type="text"
                        class="form-control @error('father_income') is-invalid @enderror"
                        value="{{ old('father_income') ?: ($user->father_income ?? '') }}">

                    <span class="text-danger"> @error('father_income') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father Present Address:</label>
                <div class="col-md-12 ">
                    <input name="father_address"
                        type="text"
                        class="form-control @error('father_address') is-invalid @enderror"
                        value="{{ old('father_address') ?: ($user->father_address ?? '') }}">

                    <span class="text-danger"> @error('father_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Father Information --}}

{{-- Mother Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Mother Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother Name:</label>
                <div class="col-md-12 ">
                    <input name="mother_name_en"
                        type="text"
                        class="form-control @error('mother_name_en') is-invalid @enderror"
                        value="{{ old('mother_name_en') ?: ($user->mother_name_en ?? '') }}">

                    <span class="text-danger"> @error('mother_name_en') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother Name: (Bangla) </label>
                <div class="col-md-12 ">
                    <input name="mother_name_bn"
                        type="text"
                        class="form-control @error('mother_name_bn') is-invalid @enderror"
                        value="{{ old('mother_name_bn') ?: ($user->mother_name_bn ?? '') }}">

                    <span class="text-danger"> @error('mother_name_bn') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Contact Number: </label>
                <div class="col-md-12 ">
                    <input name="mother_contact"
                        type="text"
                        class="form-control @error('mother_contact') is-invalid @enderror"
                        value="{{ old('mother_contact') ?: ($user->mother_contact ?? '') }}">

                    <span class="text-danger"> @error('mother_contact') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother Occupation: </label>
                <div class="col-md-12 ">
                    <input name="mother_occupation"
                        type="text"
                        class="form-control @error('mother_occupation') is-invalid @enderror"
                        value="{{ old('mother_occupation') ?: ($user->mother_occupation ?? '') }}">

                    <span class="text-danger"> @error('mother_occupation') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> NID: </label>
                <div class="col-md-12 ">
                    <input name="mother_nid"
                        type="text"
                        class="form-control @error('mother_nid') is-invalid @enderror"
                        value="{{ old('mother_nid') ?: ($user->mother_nid ?? '') }}">

                    <span class="text-danger"> @error('mother_nid') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Birth Registration:</label>
                <div class="col-md-12 ">
                    <input name="mother_birth_reg"
                        type="text"
                        class="form-control @error('mother_birth_reg') is-invalid @enderror"
                        value="{{ old('mother_birth_reg') ?: ($user->mother_birth_reg ?? '') }}">

                    <span class="text-danger"> @error('mother_birth_reg') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother Yearly Income:</label>
                <div class="col-md-12 ">
                    <input name="mother_income"
                        type="text"
                        class="form-control @error('mother_income') is-invalid @enderror"
                        value="{{ old('mother_income') ?: ($user->mother_income ?? '') }}">

                    <span class="text-danger"> @error('mother_income') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother Present Address:</label>
                <div class="col-md-12 ">
                    <input name="mother_address"
                        type="text"
                        class="form-control @error('mother_address') is-invalid @enderror"
                        value="{{ old('mother_address') ?: ($user->mother_address ?? '') }}">

                    <span class="text-danger"> @error('mother_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Father Information --}}

{{-- Local Guardian Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Local Guardian Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Name:</label>
                <div class="col-md-12 ">
                    <input name="local_guardian_name_en"
                        type="text"
                        class="form-control @error('local_guardian_name_en') is-invalid @enderror"
                        value="{{ old('local_guardian_name_en') ?: ($user->local_guardian_name_en ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_name_en') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Name: (Bangla) </label>
                <div class="col-md-12 ">
                    <input name="local_guardian_name_bn"
                        type="text"
                        class="form-control @error('local_guardian_name_bn') is-invalid @enderror"
                        value="{{ old('local_guardian_name_bn') ?: ($user->local_guardian_name_bn ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_name_bn') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Contact Number: </label>
                <div class="col-md-12 ">
                    <input name="local_guardian_contact"
                        type="text"
                        class="form-control @error('local_guardian_contact') is-invalid @enderror"
                        value="{{ old('local_guardian_contact') ?: ($user->local_guardian_contact ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_contact') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Occupation: </label>
                <div class="col-md-12 ">
                    <input name="local_guardian_occupation"
                        type="text"
                        class="form-control @error('local_guardian_occupation') is-invalid @enderror"
                        value="{{ old('local_guardian_occupation') ?: ($user->local_guardian_occupation ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_occupation') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> NID: </label>
                <div class="col-md-12 ">
                    <input name="local_guardian_nid"
                        type="text"
                        class="form-control @error('local_guardian_nid') is-invalid @enderror"
                        value="{{ old('local_guardian_nid') ?: ($user->local_guardian_nid ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_nid') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Birth Registration:</label>
                <div class="col-md-12 ">
                    <input name="local_guardian_birth_reg"
                        type="text"
                        class="form-control @error('local_guardian_birth_reg') is-invalid @enderror"
                        value="{{ old('local_guardian_birth_reg') ?: ($user->local_guardian_birth_reg ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_birth_reg') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Yearly Income:</label>
                <div class="col-md-12 ">
                    <input name="local_guardian_income"
                        type="text"
                        class="form-control @error('local_guardian_income') is-invalid @enderror"
                        value="{{ old('local_guardian_income') ?: ($user->local_guardian_income ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_income') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Present Address:</label>
                <div class="col-md-12 ">
                    <input name="local_guardian_address"
                        type="text"
                        class="form-control @error('local_guardian_address') is-invalid @enderror"
                        value="{{ old('local_guardian_address') ?: ($user->local_guardian_address ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Relation:</label>
                <div class="col-md-12 ">
                    <input name="local_guardian_relation"
                        type="text"
                        class="form-control @error('local_guardian_relation') is-invalid @enderror"
                        value="{{ old('local_guardian_relation') ?: ($user->local_guardian_relation ?? '') }}">

                    <span class="text-danger"> @error('local_guardian_relation') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Local Guardian Information --}}

{{-- Emergency Contact Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Emergency Contact Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Emergency Contact Name:</label>
                <div class="col-md-12 ">
                    <input name="emergency_contact_name"
                        type="text"
                        class="form-control @error('emergency_contact_name') is-invalid @enderror"
                        value="{{ old('emergency_contact_name') ?: ($user->emergency_contact_name ?? '') }}">

                    <span class="text-danger"> @error('emergency_contact_name') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Relation:</label>
                <div class="col-md-12 ">
                    <input name="emergency_contact_relation"
                        type="text"
                        class="form-control @error('emergency_contact_relation') is-invalid @enderror"
                        value="{{ old('emergency_contact_relation') ?: ($user->emergency_contact_relation ?? '') }}">

                    <span class="text-danger"> @error('emergency_contact_relation') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Emergency Contact Number: </label>
                <div class="col-md-12 ">
                    <input name="emergency_contact_contact"
                        type="text"
                        class="form-control @error('emergency_contact_contact') is-invalid @enderror"
                        value="{{ old('emergency_contact_contact') ?: ($user->emergency_contact_contact ?? '') }}">

                    <span class="text-danger"> @error('emergency_contact_contact') {{$message}} @enderror </span>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Present Address:</label>
                <div class="col-md-12 ">
                    <input name="emergency_contact_address"
                        type="text"
                        class="form-control @error('emergency_contact_address') is-invalid @enderror"
                        value="{{ old('emergency_contact_address') ?: ($user->emergency_contact_address ?? '') }}">

                    <span class="text-danger"> @error('emergency_contact_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>



    </div>
</div>{{-- Emergency Contact Information --}}

{{-- Previous Institute Information --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Previous Institute Information</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Previous Institute Name::</label>
                <div class="col-md-12 ">
                    <input name="previous_institute_name"
                        type="text"
                        class="form-control @error('previous_institute_name') is-invalid @enderror"
                        value="{{ old('previous_institute_name') ?: ($user->previous_institute_name ?? '') }}">

                    <span class="text-danger"> @error('previous_institute_name') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Previous Institute Address:</label>
                <div class="col-md-12 ">
                    <input name="previous_institute_address"
                        type="text"
                        class="form-control @error('previous_institute_address') is-invalid @enderror"
                        value="{{ old('previous_institute_address') ?: ($user->previous_institute_address ?? '') }}">

                    <span class="text-danger"> @error('previous_institute_address') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Previous Institute Info: </label>
                <div class="col-md-12 ">
                    <input name="previous_institute_info"
                        type="text"
                        class="form-control @error('previous_institute_info') is-invalid @enderror"
                        value="{{ old('previous_institute_info') ?: ($user->previous_institute_info ?? '') }}">

                    <span class="text-danger"> @error('previous_institute_info') {{$message}} @enderror </span>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Previous Institute Information --}}

{{-- Supporting Document Upload --}}
<div class="card p-2 mb-3 border border-success">
    <header class="card-header p-1 text-center">
        <h3>Supporting Documents Upload</h3>
    </header>
    <div class="card-body row">

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Student Birth Registraion Cerfificate <br> <span class="text-success"> (Online): </span></label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="birth_certificate"
                    id="birth_certificate"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->birth_certificate ? asset('assets/' . optional($user)->birth_certificate) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Student Vaccination Card: <br> <span class="text-success">(If birth certificate not Available)</span></label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="vaccination_card"
                    id="vaccination_card"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->vaccination_card ? asset('assets/' . optional($user)->vaccination_card) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father Picture:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="father_profile_pic"
                    id="father_profile_pic"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->father_profile_pic ? asset('assets/' . optional($user)->father_profile_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Father NID/ Birth Certificate Card:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="father_nid_pic"
                    id="father_nid_pic"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->father_nid_pic ? asset('assets/' . optional($user)->father_nid_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother Picture:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="mother_profile_pic"
                    id="mother_profile_pic"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->mother_profile_pic ? asset('assets/' . optional($user)->mother_profile_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Mother NID/ Birth Certificate Card:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="mother_nid_pic"
                    id="mother_nid_pic"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->mother_nid_pic ? asset('assets/' . optional($user)->mother_nid_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian Picture:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="local_guardian_profile_pic"
                    id="local_guardian_profile_pic"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->local_guardian_profile_pic ? asset('assets/' . optional($user)->local_guardian_profile_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Local Guardian NID/ Birth Certificate:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="local_guardian_nid_pic"
                    id="local_guardian_nid_pic"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->local_guardian_nid_pic ? asset('assets/' . optional($user)->local_guardian_nid_pic) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Previous Institute Certificate:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="previous_institute_certificate"
                    id="previous_institute_certificate"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->previous_institute_certificate ? asset('assets/' . optional($user)->previous_institute_certificate) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-3">
            <div class="row">
                <label class="col-md-12 mb-2"> Signature:</label>
                <div class="col-md-12 ">
                    <input  type="file"
                    name="signature"
                    id="signature"
                    class="dropify"
                    title="Father Picture"
                    data-plugin="dropify"
                    data-errors-position="outside"
                    data-min-width="220"
                    data-height="220"
                    data-default-file="{{ optional($user)->signature ? asset('assets/' . optional($user)->signature) : '' }}"
                    data-allowed-file-extensions="pdf jpg jpeg png"
                    data-max-file-size="1M"
                    accept=".pdf, .jpg, .jpeg, .png,"/>
                </div>
            </div>
        </div>

    </div>
</div>{{-- Supporting Document Upload --}}

@auth
    {{-- Login Information --}}
    <div class="card p-2 mb-3 border border-success">
        <header class="card-header p-1 text-center">
            <h3>Login Information</h3>
        </header>
        <div class="card-body row">

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2"> User Name:</label>
                    <div class="col-md-12 ">
                        <input name="user_name"
                            type="text"
                            class="form-control @error('user_name') is-invalid @enderror"
                            value="{{ old('user_name') ?: ($user->user_name ?? '') }}">

                        <span class="text-danger"> @error('user_name') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-12 mb-2"> Email:</label>
                    <div class="col-md-12 ">
                        <input name="email"
                            type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') ?: ($user->email ?? '') }}">

                        <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="row">
                    <label class="col-md-4 mb-2"> Password: </label>
                    <div class="col-md-12 ">
                        <input name="password"
                            type="text"
                            class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password') ?: ($user->password ?? '') }}">

                        <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                    </div>
                </div>
            </div>

            {{-- Delete later & use in controller --}}
            <input name="role" type="hidden" value="student">

        </div>
    </div>{{-- Login Information --}}
@endauth

