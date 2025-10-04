@extends('admin.themes.main')

@section('page-title') {{ $data->name }} > Edit Information @endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" />
    <!-- /Select2 -->
@endsection

@section('page-body')

    @include('admin.employee.links')

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
        <div class="card-header d-flex gap-3 align-items-center justify-content-between">
            <h5 class="m-0 fs-18 fw-semi-bold text-success">
                Edit {{ $data->name }} Information
            </h5>
            <a href="{{ route('employee.index') }}"
                class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                <i class="fa fa-chevron-left"></i>
                <span>Employee List</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('employee.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Student Information --}}
                <div class="card p-2 mb-3 border border-success">
                    <header class="card-header p-1">
                        <h3>Update Student Information</h3>
                    </header>
                    <div class="card-body row">

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Joining Date:</label>
                                <div class="col-md-8 ">
                                    <input name="joined_at"
                                        type="date"
                                        class="form-control @error('joined_at') is-invalid @enderror"
                                        value="{{ $data->joined_at }}">
                                    <span class="text-danger"> @error('joined_at') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Student Name: <span class="text-danger">(*)</span></label>
                                <div class="col-md-8 ">
                                    <input  value="{{ $data->name }}"
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
                                    <input  value="{{ $data->name_bn }}"
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
                                        <option value="admin" @selected(($data->role ?? '') == 'admin')>Admin</option>
                                        <option value="teacher" @selected(($data->role ?? '') == 'teacher')>Teacher</option>
                                        <option value="accountant" @selected(($data->role ?? '') == 'accountant')>Accountant</option>
                                        <option value="librarian" @selected(($data->role ?? '') == 'librarian')>Librarian</option>
                                        <option value="security" @selected(($data->role ?? '') == 'security')>Security</option>
                                        <option value="guest" @selected(($data->role ?? '') == 'guest')>Guest</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Email: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ $data->email }}"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="aaaa@gmail.com"
                                            name="email">
                                    <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                                    <span class="text-success"> For Login & Recovery</span>
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
                                    <input  value=""
                                            type="password"
                                            id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="****"
                                            name="password">
                                    <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                                    <span class="text-success"> Empty For Unchange </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Contact No: <br> <span class="text-danger">(for sms) *</span>   </label>
                                <div class="col-md-8 mb-3">
                                    <input  value="{{ $data->contact_sms }}"
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
                                <label class="col-md-4 mb-2"> Whatsapp No: </label>
                                <div class="col-md-8 mb-3 ">
                                    <input  value="{{ $data->contact_whatsapp }}"
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
                                <label class="col-md-4 mb-2"> Enable SMS: </label>
                                <div class="col-md-8">
                                    <select name="sms_status" class="form-control select2">
                                        <option value="on" @selected(($data->sms_status ?? '') == 'on')>On</option>
                                        <option value="off" @selected(($data->sms_status ?? '') == 'off')>Off</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Enable SMS:</label>
                                <div class="col-md-8 mb-3">
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="sms_status" value="off">

                                        <input name="sms_status"
                                            value="on"
                                            class="form-check-input"
                                            type="checkbox"
                                            role="switch"
                                            id="switchCheckChecked"
                                            3. Display Current Status: Checks the box if the model's status is 'on'
                                            @checked(old('sms_status', $data->sms_status) === 'on') >
                                        <label class="form-check-label" for="switchCheckChecked">On/ Off SMS Feature</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> NID: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ $data->nid }}"
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
                                    <input  value="{{ $data->birth_reg }}"
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
                                    <input  value="{{ $data->date_of_birth }}"
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
                                        <option value="male" @selected(($data->gender ?? '') == 'male')>Male</option>
                                        <option value="female" @selected(($data->gender ?? '') == 'female')>Female</option>
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
                                        <option value="A+" @selected(($data->blood_group ?? '') == 'A+')>A+</option>
                                        <option value="A-" @selected(($data->blood_group ?? '') == 'A-')>A-</option>
                                        <option value="AB+" @selected(($data->blood_group ?? '') == 'AB+')>AB+</option>
                                        <option value="AB-" @selected(($data->blood_group ?? '') == 'AB-')>AB-</option>
                                        <option value="B+" @selected(($data->blood_group ?? '') == 'B+')>B+</option>
                                        <option value="B-" @selected(($data->blood_group ?? '') == 'B-')>B-</option>
                                        <option value="O+" @selected(($data->blood_group ?? '') == 'O+')>O+</option>
                                        <option value="O-" @selected(($data->blood_group ?? '') == 'O-')>O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Health Issues: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ $data->health_issues }}"
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
                                    <input  value="{{ $data->height }}"
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
                                    <input  value="{{ $data->weight }}"
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
                                        <option value="single" @selected(($data->marital_status ?? '') == 'single')>Single</option>
                                        <option value="married" @selected(($data->marital_status ?? '') == 'married')>Married</option>
                                        <option value="divorced" @selected(($data->marital_status ?? '') == 'divorced')>Divorced</option>
                                        <option value="widowed" @selected(($data->marital_status ?? '') == 'widowed')>Widowed</option>
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
                                        <option value="Islam" @selected(($data->religion ?? '') == 'Islam')>Islam</option>
                                        <option value="Hinduism" @selected(($data->religion ?? '') == 'Hinduism')>Hinduism</option>
                                        <option value="Buddhism" @selected(($data->religion ?? '') == 'Buddhism')>Buddhism</option>
                                        <option value="Christianity" @selected(($data->religion ?? '') == 'Christianity')>Christianity</option>
                                        <option value="Judaism" @selected(($data->religion ?? '') == 'Judaism')>Judaism</option>
                                        <option value="Other" @selected(($data->religion ?? '') == 'Other')>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Present Address: </label>
                                <div class="col-md-8 mb-3">
                                    <textarea class="form-control @error('present_address') is-invalid @enderror"
                                            placeholder="C/O:           Vill:           P.O:            P.S:            Dist:"
                                            name="present_address">{{ $data->present_address }}</textarea>
                                    <span class="text-danger"> @error('present_address') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> Permanent Address: </label>
                                <div class="col-md-8 mb-3">
                                    <textarea class="form-control @error('permanent_address') is-invalid @enderror"
                                            placeholder="C/O:           Vill:           P.O:            P.S:            Dist:"
                                            name="permanent_address">{{ $data->permanent_address }}</textarea>
                                    <span class="text-danger"> @error('permanent_address') {{$message}} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="row">
                                <label class="col-md-4 mb-2"> RFID Card: </label>
                                <div class="col-md-8 ">
                                    <input  value="{{ $data->rfid_card }}"
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
                                <label class="col-md-4 mb-2"> Active Status: </label>
                                <div class="col-md-8">
                                    <select name="status" class="form-control select2">
                                        <option value="active" @selected(($data->status ?? '') == 'active')>Active</option>
                                        <option value="disable" @selected(($data->status ?? '') == 'disable')>Disable</option>
                                        <option value="tc" @selected(($data->status ?? '') == 'tc')>Transfer</option>
                                        <option value="exit" @selected(($data->status ?? '') == 'exit')>Exit</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Pic & Signature Uploads --}}
                        <div class="row">

                                <div class="col-md-6 col-lg-6 col-sm-12 mb-3">
                                    <label> Signature Uploads: </label><br>
                                    <img id="signature"
                                        src="{{ asset( "assets/admin/$data->signature" ) }}"
                                        class="mb-3" width="300px" height="70px"><br>
                                    <span>300px x 70px</span>
                                    <input class="form-control"
                                        type="file"
                                        name="signature"
                                        onchange="document.querySelector('#signature').src=window.URL.createObjectURL(this.files[0])">
                                    <span class="text-danger"> @error('signature') {{$message}} @enderror </span>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12 mb-3">
                                    <label for="formFile" class="form-label">Select Profile Pic</label><br>
                                    <img id="update_pic_file"
                                        src="{{ asset( "assets/admin/$data->profile_pic" ) }}"
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

    <!-- Show/Hide Password -->
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');

            // Check the current type of the input field
            if (passwordField.type === 'password') {
                // If it's a password, change it to text (shows the value)
                passwordField.type = 'text';
            } else {
                // If it's text, change it back to password (hides the value)
                passwordField.type = 'password';
            }
        }
    </script><!-- / Show/Hide Password -->
@endsection
