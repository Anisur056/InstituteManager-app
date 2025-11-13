@extends('admin.themes.main')

@section('page-title') Students @endsection

@section('css')
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/buttons.dataTables.css') }}" />
    <!-- Datatable -->

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2/select2.min.css') }}" /><!-- /Select2 -->
@endsection


@section('page-body')

    @include('admin.students.links')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-12">

        <div class="card h-100 rounded-15 mb-3">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold text-success">
                    Filter Records
                </h5>
                <div class="text-end">
                    <div class="actions">
                        <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                            Hide/Show
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <div    id="flush-collapseOne"
                                        class="accordion-collapse collapse show bg-white pb-4"
                                        aria-labelledby="flush-headingOne"
                                        data-bs-parent="#accordionFlushExample">
                                    <form action="{{ route('index.admit.card') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="institute_name" class="col-form-label">Institute Name:</label>
                                                <select name="institute_name" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($instituteInfo as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('institute_name') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="branch" class="col-form-label">Branch Name:</label>
                                                <select name="branch" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($instituteBranch as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('branch') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="class" class="col-form-label">Division:</label>
                                                <select name="division" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($instituteDivision as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('division') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="class" class="col-form-label">Class:</label>
                                                <select name="class" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($classes as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('class') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="class" class="col-form-label">Shift:</label>
                                                <select name="shift" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($shifts as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('shift') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="class" class="col-form-label">Section:</label>
                                                <select name="section" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($sections as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('section') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Group:</label>
                                                <select name="group" class="form-control select2" >
                                                    <option value="">Select</option>
                                                    @foreach ($groups as $info)
                                                        {{-- Check if the current option's value matches the 'institute_name' parameter in the GET request --}}
                                                        <option value="{{ $info->name_en }}" {{ (request('group') == $info->name_en) ? 'selected' : '' }}>
                                                            {{ $info->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success mt-4">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($users->isNotEmpty())
            <div class="card h-100 rounded-15">
                <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                    <h5 class="m-0 fs-18 fw-semi-bold text-success">
                        Students  | <span class="ms-2 ">{{ $users->count() }} Records </span>
                    </h5>
                </div>
                <div class="card-body">
                    <form id="admitCardForm" action="{{ route('print.admit.card') }}" method="POST">
                        @csrf
                        <div class="m-2">
                            <label for="selectAll" class="form-check-label me-3 bg-success p-1 text-white">
                                <input type="checkbox" id="selectAll" class="form-check-input">
                                Select All
                            </label>
                            <button type="submit" class="btn btn-success" id="generateBtn" disabled>
                                Generate Admit Cards (PDF)
                            </button>
                            <span class="ms-2 text-muted" id="selectedCount">0 selected</span>
                        </div>

                        <table id="dataTable" class="table table-striped table-bordered mobileResponsiveTable">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>Pic</th>
                                    <th>Information</th>
                                    <th>Contact <br>(Call)</th>
                                    <th>Contact <br>(Whatsapp)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="user_ids[]" value="{{ $data->id }}"
                                                class="user-checkbox">
                                        </td>
                                        <td data-label="Pic: ">
                                            <img class="rounded-3" width="100px" src="{{ optional($data)->profile_pic ? asset('assets/' . optional($data)->profile_pic) : 'assets/admin/img/users/user.png' }}">
                                        </td>
                                        <td data-label="Information:- " >
                                            Name: {{$data->name}}<br>
                                            নাম: {{$data->name_bn}} <br>
                                            পিতা: {{$data->father_name}} <br>
                                            {{$data->institute_name}} <br>
                                            Branch: {{$data->branch}} <br>
                                            Division: {{$data->division}} <br>
                                            Class: {{$data->class}} <br>
                                            Shift: {{$data->shift}} <br>
                                            Sections: {{$data->section}} <br>
                                            Group: {{$data->group}} <br>
                                            Roll: {{$data->roll}} <br>
                                            Designation: {{$data->role}} <br>
                                            RFID Card: {{$data->rfid_card}} <br>
                                            @if ($data->sms_status === 'on')
                                                <span class="badge bg-success text-bg-success">SMS On</span>
                                            @else
                                                <span class="badge bg-danger text-bg-danger">SMS Off</span>
                                            @endif
                                        </td>
                                        <td data-label="Contact (Call): ">
                                            <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="tel:{{$data->contact_sms}}">
                                                {{$data->contact_sms}}
                                            </a>
                                        </td>
                                        <td data-label="Contact (Whatsapp): ">
                                            <a class="text-decoration-none text-success font-weight-bold" target="_blank" href="https://wa.me/+88{{$data->contact_whatsapp}}">
                                                {{$data->contact_whatsapp}}
                                            </a>
                                        </td>
                                        <td data-label="Actions: ">
                                            <a class="btn btn-primary mb-1" href="{{ route('students.show',$data->id) }}">
                                                <i class="fa fa-user me-1"></i>
                                            </a>
                                            <a class="btn btn-warning mb-1" href="{{ route('students.edit',$data->id) }}">
                                                <i class="fa fa-pencil-square-o  me-1"></i>
                                            </a>
                                            <a class="btn btn-success mb-1" href="{{ route('sms.create',$data->id) }}" target=”_blank”>
                                                <i class="fa fa-comments me-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        @else
            <div class="card h-100 rounded-15">
                <div class="card-body">
                    No users found. Please Filter Form List
                </div>
            </div>
        @endif
        

            
    </div>

@endsection

@section('js')
    <!-- Datatable -->
    <script >
      const table = new DataTable('#dataTable', {
          lengthMenu: [
              [-1, 10, 25, 50],
              ['All',10, 25, 50]
          ],
          order: [],
          scrollX: true,
          layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf',
                {
                    text: 'JSON',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        DataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
                    }
                },
                {
                  extend: 'print',
                  exportOptions: {
                    columns: ':visible'
                  },
                  autoPrint: false
                },
                {
                    extend: 'colvis',
                    collectionLayout: 'fixed columns',
                    popoverTitle: 'Column visibility control',
                    postfixButtons: ['colvisRestore']
                },
                ]
            },
            topEnd: 'search',
            bottomStart: 'pageLength',
            bottomEnd: 'info'
          }
      });
    </script>
    <!-- Datatable -->

    <!-- Select2 -->
    <script src="{{ asset('assets/admin/js/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <!-- /Select2 -->

    <script>
        const selectAllCheckbox = document.getElementById('selectAll');
        const userCheckboxes = document.querySelectorAll('.user-checkbox');
        const generateBtn = document.getElementById('generateBtn');
        const selectedCount = document.getElementById('selectedCount');

        // Select all functionality
        selectAllCheckbox.addEventListener('change', function() {
            userCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateGenerateButton();
        });

        // Individual checkbox change
        userCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateGenerateButton);
        });

        function updateGenerateButton() {
            const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
            const count = checkedBoxes.length;

            selectedCount.textContent = `${count} selected`;
            generateBtn.disabled = count === 0;

            // Update select all checkbox state
            selectAllCheckbox.checked = count === userCheckboxes.length && count > 0;
        }
    </script>
@endsection

