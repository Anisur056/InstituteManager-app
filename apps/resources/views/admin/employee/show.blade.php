@extends('admin.themes.main')

@section('page-title') {{ $data->name }} > Details @endsection

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
                {{ $data->name }} > Details
            </h5>
            <a href="{{ route('employee.index') }}"
                class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                <i class="fa fa-chevron-left"></i>
                <span>Employee List</span>
            </a>
        </div>
        <div class="card-body">
            {{-- Student Information --}}
            <div class="card p-2 mb-3 border border-success">
                <header class="card-header p-1">
                    <h3>Student Information</h3>
                </header>
                <div class="card-body row">
                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Pic:</p>
                            <img class="rounded-3" style="width: 100px;" src="{{ asset( "assets/admin/$data->profile_pic" ) }}"><br>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Signature:</p>
                            <img class="rounded-3" style="width: 100px;" src="{{ asset( "assets/admin/$data->signature" ) }}"><br>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Joining Date: {{ $data->joined_at }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Student Name: {{ $data->name }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> শিক্ষার্থীর নাম: {{ $data->name_bn }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Designation: {{ $data->role }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Email: {{ $data->email }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Contact No: {{ $data->contact_sms }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Whatsapp No: {{ $data->contact_whatsapp }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> SMS Status: {{ $data->sms_status }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> NID: {{ $data->nid }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Birth Registration: {{ $data->birth_reg }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Date of Birth: {{ $data->date_of_birth }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Gender: {{ $data->gender }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Blood Group: {{ $data->blood_group }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Health Issues: {{ $data->health_issues }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Height: {{ $data->height }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Weight: {{ $data->weight }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Marital Status: {{ $data->marital_status }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Nationality: {{ $data->nationality }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Religion: {{ $data->religion }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Present Address: {{ $data->present_address }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> Permanent Address: {{ $data->permanent_address }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <p> RFID Card: {{ $data->rfid_card }}</p>
                        </div>
                    </div>

                </div>
            </div>{{-- /Student Information --}}
        </div>
    </div>

@endsection

