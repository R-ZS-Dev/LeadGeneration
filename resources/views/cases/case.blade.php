@extends('sitemaster.master-layout')
@section('title', 'All Cases')
@section('content')
    <div class="container-fluid">
        <style>
            .nav {
                flex-wrap: nowrap;
                /* Prevent wrapping */
            }

            .nav-item {
                flex-shrink: 0;
                /* Prevent shrinking */
            }
        </style>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">

            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <ul class="nav p-3" id="myTab" role="tablist"
                        style="white-space: nowrap; display: flex; overflow-x: auto;">
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                Case Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                Patient History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3" aria-selected="false">
                                Staff
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                                type="button" role="tab" aria-controls="tab4" aria-selected="false">
                                Equipment
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5"
                                type="button" role="tab" aria-controls="tab5" aria-selected="false">
                                Supplies
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6"
                                type="button" role="tab" aria-controls="tab6" aria-selected="false">
                                Coronary Artery ByPasses
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab7-tab" data-bs-toggle="tab" data-bs-target="#tab7"
                                type="button" role="tab" aria-controls="tab7" aria-selected="false">
                                Procedures
                            </button>
                        </li>
                    </ul>

                    @php
                        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                        $random = substr(str_shuffle($characters), 0, 8);
                    @endphp

                    <div class="tab-content mt-4">
                        <!-- Profile Tab -->
                        <section id="tab1" class="tab-pane fade show active">
                            <form id="profileSettingsForm" action="{{ route('add-patient') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row p-4">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Start Date</label>
                                                    <input type="date" name="start_date" class="form-control"
                                                        value="{{ now()->format('Y-m-d') }}">
                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Start Time</label>
                                                    <input type="time" name="start_time" class="form-control"
                                                        value="{{ now()->format('H:i') }}">
                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Case Id</label>
                                                    <input type="text" name="case_id" class="form-control"
                                                        value="{{ $random }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="first_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" name="middle_name" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Medical Record Number</label>
                                                    <input type="text" name="medical_record" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth</label>
                                                    <input type="date" name="dob" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Height (cm)</label>
                                                    <input type="number" name="height" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Weight (kg)</label>
                                                    <input type="number" name="weight" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">BMI</label>
                                                    <input type="text" name="bmi" id="bmi"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Blood Type</label>
                                                    <input type="text" name="blood_type" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Admit Date</label>
                                                    <input type="date" name="admit_date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Hospital</label>
                                                    <select name="hospital" class="form-control">
                                                        <option value="">Select Hospital</option>
                                                        @foreach ($hospital as $item)
                                                            <option value="{{ $item->hos_id }}">{{ $item->hos_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Room</label>
                                                    <input type="text" name="room" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Surface Area Method</label>
                                                    <select name="surface_area" class="form-control">
                                                        <option value="">Select Surface Area</option>
                                                        <option value="Dubois">Dubois</option>
                                                        <option value="Mosteller">Mosteller</option>
                                                        <option value="Haycock">Haycock</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Flow Rate</label>
                                                    <select name="flow_rate" class="form-control">
                                                        <option value="">Select Flow Rate</option>
                                                        <option value="2.4">2.4</option>
                                                        <option value="3.0">3.0</option>
                                                        <option value="3.6">3.6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Heparin Dose (units/kg)</label>
                                                    <select name="heparin_dose" class="form-control">
                                                        <option value="300">300</option>
                                                        <option value="400">400</option>
                                                        <option value="500">500</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Is this a Child?</label>
                                                    <div class="d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="is_child" value="Yes" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="is_child" value="No"
                                                                checked />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Sex</label>
                                                    <div class="d-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="sex" value="Male"
                                                                checked />
                                                            <span>Male</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="sex" value="Female" />
                                                            <span>Female</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Admit Source</label>
                                                    <select name="admit_source" class="form-control">
                                                        <option value="">Admission source</option>
                                                        <option value="Elective Admission">Elective Admission</option>
                                                        <option value="Emergency Department">Emergency Department</option>
                                                        <option
                                                            value="Transfer in from another hospital / acute care facility">
                                                            Transfer in from another hospital / acute care facility</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Discharge Date</label>
                                                    <input type="date" name="discharge_date" class="form-control"
                                                        value="{{ now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">Add Case</button>
                                </div>
                            </form>
                        </section>

                        <!-- Company Tab -->
                        <section id="tab2" class="tab-pane fade">
                            <form id="companySettingsForm" action="{{ route('add-patient-history') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 form-group mb-3">
                                        <label for="">Select Patient</label>
                                        <select name="ph_userid" id="" class="form-control" required>
                                            <option value="">Select Patient</option>
                                            @foreach ($patient as $item)
                                                <option value="{{ $item->pat_id }}"
                                                    {{ session('pat_id') == $item->pat_id ? 'selected' : '' }}>
                                                    {{ $item->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 form-group mb-3">
                                        <label for="">Medical Summary</label>
                                        <textarea name="ph_medicalsum" rows="3" class="form-control" placeholder="Medical Summary"></textarea>
                                    </div>
                                    <div class="col-lg-12 form-group mb-3">
                                        <label for="">Diagnosis</label>
                                        <textarea name="ph_diagnosis" rows="3" class="form-control" placeholder="Medical Summary"></textarea>
                                    </div>
                                    <div class="col-lg-12 form-group mb-3">
                                        <label for="">Allergies</label>
                                        <textarea name="ph_allergies" rows="3" class="form-control" placeholder="Medical Summary"></textarea>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">Add Medical History</button>
                                </div>
                            </form>

                        </section>

                        <section id="tab3" class="tab-pane fade">
                            <div class="container-fluid">
                                <div class="row">

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <!-- Success Message -->
                                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

                                    <!-- Signup modal content -->
                                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center mt-2 mb-4">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                                            <h4 class="mb-0"><b>Add Staff</b></h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>

                                                    <form method="POST" action="{{ route('add-casestaff') }}"
                                                        class="mt-4">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12 form-group mb-3">
                                                                <label for="pet_id">Select Patient</label>
                                                                <select name="pet_id" id="pet_id"
                                                                    class="form-control" required>
                                                                    <option value="">Select Patient</option>
                                                                    @foreach ($patient as $item)
                                                                        <option value="{{ $item->pat_id }}"
                                                                            {{ session('pat_id') == $item->pat_id ? 'selected' : '' }}>
                                                                            {{ $item->first_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Surgeon</label>
                                                                    <select name="surgeon" class="form-select">
                                                                        <option value="">Select Surgeon</option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>


                                                                <div class="form-group mb-3">
                                                                    <label for="">Select 2nd Surgeon</label>
                                                                    <select name="second_surgeon" class="form-select">
                                                                        <option value="">Select 2nd Surgeon</option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select PA/1st Assistant</label>
                                                                    <select name="pa_first_assistant" class="form-select">
                                                                        <option value="">Select PA/1st Assistant
                                                                        </option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Anesthesiologist</label>
                                                                    <select name="anesthesiologist" class="form-select">
                                                                        <option value="">Select Anesthesiologist
                                                                        </option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select CRNA/RES</label>
                                                                    <select name="crna_res" class="form-select">
                                                                        <option value="">Select CRNA/RES</option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Cardiologist</label>
                                                                    <select name="cardiologist" class="form-select">
                                                                        <option value="">Select Cardiologist</option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Family MD</label>
                                                                    <select name="family_md" class="form-select">
                                                                        <option value="">Select Family MD</option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Perfusionist</label>
                                                                    <select name="perfusionist" class="form-select">
                                                                        <option value="">Select Perfusionist</option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Perfusionist
                                                                        Category</label>
                                                                    <select name="perfusionist_category"
                                                                        class="form-select">
                                                                        <option>Select Perfusionist Category</option>
                                                                        <option
                                                                            value="1P Cardiopulmonary Bypass (CPB), Primary">
                                                                            1P Cardiopulmonary Bypass (CPB), Primary
                                                                        </option>
                                                                        <option value="2P Instructor CPB, Primary">2P
                                                                            Instructor CPB, Primary</option>
                                                                        <option
                                                                            value="3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary">
                                                                            3P Extra-Corporeal Membrane Oxygenation (ECMO),
                                                                            Primary</option>
                                                                        <option
                                                                            value="4P Isolated Limb/Organ Perfusion, Primary">
                                                                            4P Isolated Limb/Organ Perfusion, Primary
                                                                        </option>
                                                                        <option
                                                                            value="5P Veno-Venous of Left Heart Bypass, Primary">
                                                                            5P Veno-Venous of Left Heart Bypass, Primary
                                                                        </option>
                                                                        <option
                                                                            value="6P Ventricular Assist Device (VAD), Primary">
                                                                            6P Ventricular Assist Device (VAD), Primary
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Perfusionist
                                                                        Status</label>
                                                                    <select name="perfusionist_status"
                                                                        class="form-select">
                                                                        <option value="">Select Perfusionist Status
                                                                        </option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select 2nd Perfusionist</label>
                                                                    <select name="second_perfusionist"
                                                                        class="form-select">
                                                                        <option value="">Select 2nd Perfusionist
                                                                        </option>
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->st_id }}">
                                                                                {{ $staff->st_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="">Select 2nd Perfusionist
                                                                        Category</label>
                                                                    <select name="second_perfusionist_category"
                                                                        class="form-select">
                                                                        <option>Select 2nd Perfusionist Category</option>
                                                                        <option value="1S CPB, First Assistant, Secondary">
                                                                            1S CPB, First Assistant, Secondary</option>
                                                                        <option value="25 Ex Vivo, Secondary">25 Ex Vivo,
                                                                            Secondary</option>
                                                                        <option
                                                                            value="35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary">
                                                                            35 Intraperitoneal Hyperthermic Chemoperfusion
                                                                            or Intrapleural Hyperthermic Chemoperfusion
                                                                            (HIPEC), Secondary
                                                                        </option>
                                                                        <option
                                                                            value="45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary">
                                                                            45 Cardiopulmonary Bypass (CPB) Standby
                                                                            Procedures, Secondary
                                                                        </option>
                                                                        <option
                                                                            value="5S High Fidelity Perfusion Simulation (HFPS), Secondary">
                                                                            5S High Fidelity Perfusion Simulation (HFPS),
                                                                            Secondary</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-12 text-center">
                                                                <button type="submit" class="btn w-100 btn-dark"
                                                                    id="submitBtn">Add Supply</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <div class="col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 d-flex justify-content-end">

                                                        <button type="button"
                                                            class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                                            data-bs-toggle="modal" data-bs-target="#signup-modal">
                                                            <i class="fas fa-plus"></i> Add Staff
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="users-table"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Surgeon</th>
                                                                <th>2nd Surgeon</th>
                                                                <th>PA/1st Assistant</th>
                                                                <th>Anesthesiologist</th>
                                                                <th>CRNA/RES</th>
                                                                <th>Cardiologist</th>
                                                                <th>Family MD</th>
                                                                <th>Perfusionist</th>
                                                                <th>Perfusionist Category</th>
                                                                <th>Perfusionist Status</th>
                                                                <th>2nd Perfusionist</th>
                                                                <th>2nd Perfusionist Category</th>
                                                                <th>Action</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            @php $i = 0; @endphp
                                                            @foreach ($caseStaffs as $caseStaff)
                                                                <tr id="row-{{ $caseStaff->cs_id }}">
                                                                    <td>{{ ++$i }}</td>
                                                                    <td>{{ $caseStaff->surgeonDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->secondSurgeonDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->paFirstAssistantDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->anesthesiologistDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->crnaResDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->cardiologistDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->familyMdDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->perfusionistDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->perfusionist_category ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->perfusionistStatusDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->secondPerfusionistDetail->st_name ?? 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $caseStaff->second_perfusionist_category ?? 'N/A' }}
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="editButtonCstaff({{ json_encode($caseStaff) }})"
                                                                            href="javascript:void(0);">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>


                                                                        <a href="javascript:void(0);"
                                                                            onclick="confirmDelete('{{ route('delete-casestaff', $caseStaff->cs_id) }}' , '{{ $caseStaff->cs_id }}')"
                                                                            class="edit-icon delete-user-btn text-danger">
                                                                            <i class="fa-solid fa-trash-can-arrow-up"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /* --------------------------- edit staff modal -------------------------- */ --}}
                                <div id="editCaseStaff" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content ">
                                            <div class="modal-body ">
                                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                                    <h4 class="mb-0"><b>Edit Staff</b></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form method="POST" action="{{ route('edit-casestaff') }}"
                                                    class="mt-4">
                                                    @csrf
                                                    <input type="hidden" name="cs_id" id="cs_id">
                                                    <div class="row">
                                                        <div class="col-lg-12 form-group mb-3">
                                                            <label for="pet_id">Select Patient</label>
                                                            <select name="pet_id" id="editpet_id" class="form-control"
                                                                required>
                                                                <option value="">Select Patient</option>
                                                                @foreach ($patient as $item)
                                                                    <option value="{{ $item->pat_id }}"
                                                                        {{ isset($caseStaff) && $caseStaff->pet_id == $item->pat_id ? 'selected' : '' }}>
                                                                        {{ $item->first_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Select Surgeon</label>
                                                                <select name="surgeon" id="edit_surgeon"
                                                                    class="form-select">
                                                                    <option>Select Surgeon</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select 2nd Surgeon</label>
                                                                <select name="second_surgeon" id="edit_second_surgeon"
                                                                    class="form-select">
                                                                    <option value="">Select 2nd Surgeon</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select PA/1st Assistant</label>
                                                                <select name="pa_first_assistant"
                                                                    id="edit_pa_first_assistant" class="form-select">
                                                                    <option value="">Select PA/1st Assistant</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select Anesthesiologist</label>
                                                                <select name="anesthesiologist" id="edit_anesthesiologist"
                                                                    class="form-select">
                                                                    <option value="">Select Anesthesiologist</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select CRNA/RES</label>
                                                                <select name="crna_res" id="edit_crna_res"
                                                                    class="form-select">
                                                                    <option value="">Select CRNA/RES</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select Cardiologist</label>
                                                                <select name="cardiologist" id="edit_cardiologist"
                                                                    class="form-select">
                                                                    <option value="">Select Cardiologist</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select Family MD</label>
                                                                <select name="family_md" id="edit_family_md"
                                                                    class="form-select">
                                                                    <option value="">Select Family MD</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select Perfusionist</label>
                                                                <select name="perfusionist" id="edit_perfusionist"
                                                                    class="form-select">
                                                                    <option value="">Select Perfusionist</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            @foreach ($caseStaffs as $caseStaff)
                                                                <div class="form-group mb-3">
                                                                    <label for="">Select Perfusionist
                                                                        Category</label>
                                                                    <select name="perfusionist_category"
                                                                        id="edit_perfusionist_category"
                                                                        class="form-select">
                                                                        <option value="">Select Perfusionist Category
                                                                        </option>
                                                                        <option
                                                                            value="1P Cardiopulmonary Bypass (CPB), Primary"
                                                                            {{ $caseStaff->perfusionist_category == '1P Cardiopulmonary Bypass (CPB), Primary' ? 'selected' : '' }}>
                                                                            1P Cardiopulmonary Bypass (CPB), Primary
                                                                        </option>
                                                                        <option value="2P Instructor CPB, Primary"
                                                                            {{ $caseStaff->perfusionist_category == '2P Instructor CPB, Primary' ? 'selected' : '' }}>
                                                                            2P Instructor CPB, Primary</option>
                                                                        <option
                                                                            value="3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary"
                                                                            {{ $caseStaff->perfusionist_category == '3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary' ? 'selected' : '' }}>
                                                                            3P Extra-Corporeal Membrane Oxygenation (ECMO),
                                                                            Primary</option>
                                                                        <option
                                                                            value="4P Isolated Limb/Organ Perfusion, Primary"
                                                                            {{ $caseStaff->perfusionist_category == '4P Isolated Limb/Organ Perfusion, Primary' ? 'selected' : '' }}>
                                                                            4P Isolated Limb/Organ Perfusion, Primary
                                                                        </option>
                                                                        <option
                                                                            value="5P Veno-Venous of Left Heart Bypass, Primary"
                                                                            {{ $caseStaff->perfusionist_category == '5P Veno-Venous of Left Heart Bypass, Primary' ? 'selected' : '' }}>
                                                                            5P Veno-Venous of Left Heart Bypass, Primary
                                                                        </option>
                                                                        <option
                                                                            value="6P Ventricular Assist Device (VAD), Primary"
                                                                            {{ $caseStaff->perfusionist_category == '6P Ventricular Assist Device (VAD), Primary' ? 'selected' : '' }}>
                                                                            6P Ventricular Assist Device (VAD), Primary
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            @endforeach

                                                            <div class="form-group mb-3">
                                                                <label for="">Select Perfusionist Status</label>
                                                                <select name="perfusionist_status"
                                                                    id="edit_perfusionist_status" class="form-select">
                                                                    <option value="">Select Perfusionist Status
                                                                    </option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select 2nd Perfusionist</label>
                                                                <select name="second_perfusionist"
                                                                    id="edit_second_perfusionist" class="form-select">
                                                                    <option value="">Select 2nd Perfusionist</option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->st_id }}">
                                                                            {{ $staff->st_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="">Select 2nd Perfusionist
                                                                    Category</label>
                                                                <select name="second_perfusionist_category"
                                                                    id="edit_second_perfusionist_category"
                                                                    class="form-select">
                                                                    <option value="">Select 2nd Perfusionist Category
                                                                    </option>
                                                                    <option value="1S CPB, First Assistant, Secondary"
                                                                        {{ ($caseStaff->second_perfusionist_category ?? '') == '1S CPB, First Assistant, Secondary' ? 'selected' : '' }}>
                                                                        1S CPB, First Assistant, Secondary
                                                                    </option>
                                                                    <option value="25 Ex Vivo, Secondary"
                                                                        {{ ($caseStaff->second_perfusionist_category ?? '') == '25 Ex Vivo, Secondary' ? 'selected' : '' }}>
                                                                        25 Ex Vivo, Secondary
                                                                    </option>
                                                                    <option
                                                                        value="35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary"
                                                                        {{ ($caseStaff->second_perfusionist_category ?? '') == '35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary' ? 'selected' : '' }}>
                                                                        35 Intraperitoneal Hyperthermic Chemoperfusion or
                                                                        Intrapleural Hyperthermic Chemoperfusion (HIPEC),
                                                                        Secondary
                                                                    </option>
                                                                    <option
                                                                        value="45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary"
                                                                        {{ ($caseStaff->second_perfusionist_category ?? '') == '45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary' ? 'selected' : '' }}>
                                                                        45 Cardiopulmonary Bypass (CPB) Standby Procedures,
                                                                        Secondary
                                                                    </option>
                                                                    <option
                                                                        value="5S High Fidelity Perfusion Simulation (HFPS), Secondary"
                                                                        {{ ($caseStaff->second_perfusionist_category ?? '') == '5S High Fidelity Perfusion Simulation (HFPS), Secondary' ? 'selected' : '' }}>
                                                                        5S High Fidelity Perfusion Simulation (HFPS),
                                                                        Secondary
                                                                    </option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="btn w-100 btn-dark">Update
                                                                Staff</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>

                        </section>


                        <!-- Case Equipment Tab -->
                        <section id="tab4" class="tab-pane fade">
                            <div class="container-fluid">
                                <div class="row">

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <!-- Success Message -->
                                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

                                    <!-- Signup modal content -->
                                    <div id="signup-modals" class="modal fade" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center mt-2 mb-4">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                                            <h4 class="mb-0"><b>Add Equipment</b></h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>

                                                    <form method="POST" action="{{ route('add-caseequipment') }}"
                                                        class="mt-4">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-lg-12 form-group mb-3">
                                                                <label for="pet_id">Select Patient</label>
                                                                <select name="pet_id" id="pet_id"
                                                                    class="form-control" required>
                                                                    <option value="">Select Patient</option>
                                                                    @foreach ($patient as $item)
                                                                        <option value="{{ $item->pat_id }}"
                                                                            {{ session('pat_id') == $item->pat_id ? 'selected' : '' }}>
                                                                            {{ $item->first_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <strong>Add group of Equipment for Case</strong>
                                                                <div class="form-group mb-3">
                                                                    <label for="">Group</label>
                                                                    <select name="e_group" class="form-select">
                                                                        <option value="">Select Group</option>
                                                                        @foreach ($equipmentGroups as $group)
                                                                            <option value="{{ $group->eqg_id }}">
                                                                                {{ $group->eqg_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <strong>Add/Edit/Remove Equipment</strong>
                                                                <select name="e_configure" class="form-select mb-3"
                                                                    id="equipmentSelect">
                                                                    <option value="">Select Equipment</option>
                                                                    @foreach ($equipments as $equipment)
                                                                        <option value="{{ $equipment->eq_id }}"
                                                                            data-name="{{ $equipment->eq_name }}"
                                                                            data-serial="{{ $equipment->eq_serial }}"
                                                                            data-lastservice="{{ $equipment->eq_lastservice }}"
                                                                            data-nextservice="{{ $equipment->eq_nextservice }}"
                                                                            data-billingcode="{{ $equipment->eq_billingcode }}"
                                                                            data-notes="{{ $equipment->eq_notes }}"
                                                                            data-manufacturer="{{ $equipment->eq_manufacturer }}"
                                                                            data-type="{{ $equipment->eq_type }}">
                                                                            {{-- Yahan Manufacturer Ki Jagah Type Show Hoga --}}
                                                                            {{ $equipment->eq_type }} -
                                                                            {{ $equipment->eq_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Type</label>
                                                                    <select name="e_type" class="form-select">
                                                                        <option value="">Select Type</option>
                                                                        @foreach ($equipmentGroups as $group)
                                                                            <option value="{{ $equipment->eq_type }}">
                                                                                {{ $group->eq_type }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Manufacturer</label>
                                                                    <input type="text" name="e_manufacturer"
                                                                        class="form-control" id="e_manufacturer"
                                                                        placeholder="Manufacturer">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Name</label>
                                                                    <input type="text" name="e_name"
                                                                        class="form-control" id="e_name"
                                                                        placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Serial Number</label>
                                                                    <input type="text" name="serial_number"
                                                                        class="form-control" id="serial_number"
                                                                        placeholder="Serial Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Last Service Date</label>
                                                                    <input type="date" name="last_service_date"
                                                                        class="form-control" id="last_service_date"
                                                                        placeholder="Last Service Date">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Next Service Date</label>
                                                                    <input type="date" name="next_service_date"
                                                                        class="form-control" id="next_service_date"
                                                                        placeholder="Next Service Date">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Billing Code</label>
                                                                    <input type="text" name="billing_code"
                                                                        class="form-control" id="billing_code"
                                                                        placeholder="Billing Code">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Note</label>
                                                                    <textarea class="form-control" id="note" name="note" rows="4"></textarea>

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 text-center">
                                                                <button type="submit" class="btn w-100 btn-dark"
                                                                    id="submitBtn">Add Equipment</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <div class="col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 d-flex justify-content-end">

                                                        <button type="button"
                                                            class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                                            data-bs-toggle="modal" data-bs-target="#signup-modals">
                                                            <i class="fas fa-plus"></i> Add Equipment
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="users-table1"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Group</th>
                                                                <th>Equipment Name</th>
                                                                <th>Type</th>
                                                                <th>Manufacturer</th>
                                                                <th>Serial Number</th>
                                                                <th>Last Service Date</th>
                                                                <th>Next Service Date</th>
                                                                <th>Billing Code</th>
                                                                <th>Note</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $j = 0; @endphp
                                                            @foreach ($caseEquipments as $equipment)
                                                                <tr id="row-{{ $equipment->ce_id }}">
                                                                    <td>{{ ++$j }}</td>
                                                                    <td>@php
                                                                        $groupName = $equipmentGroups
                                                                            ->where('eqg_id', $equipment->e_group)
                                                                            ->first();
                                                                    @endphp
                                                                        {{ $groupName ? $groupName->eqg_name : 'N/A' }}
                                                                    </td>
                                                                    <td>{{ $equipment->e_name }}</td>

                                                                    <td>{{ $equipment->e_type }}</td>
                                                                    <td>{{ $equipment->e_manufacturer }}</td>
                                                                    <td>{{ $equipment->serial_number }}</td>
                                                                    <td>{{ $equipment->last_service_date }}</td>
                                                                    <td>{{ $equipment->next_service_date }}</td>
                                                                    <td>{{ $equipment->billing_code }}</td>
                                                                    <td>{{ $equipment->note }}</td>
                                                                    <td>
                                                                        <a onclick="editCEquipment({{ json_encode($equipment) }})"
                                                                            href="javascript:void(0);">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0);"
                                                                            class="edit-icon delete-user-btn text-danger"
                                                                            onclick="confirmDelete('{{ route('delete-caseequipment', $equipment->ce_id) }}', '{{ $equipment->ce_id }}')">
                                                                            <i class="fa-solid fa-trash-can-arrow-up"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /* --------------------------- edit Equipment modal -------------------------- */ --}}
                                <div id="editCaseEqu" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content ">
                                            <div class="modal-body ">
                                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                                    <h4 class="mb-0"><b>Edit Equipment</b></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form method="POST" action="{{ route('edit-caseequipment') }}"
                                                    class="mt-4">
                                                    @csrf
                                                    <input type="hidden" name="ce_id" id="ce_id">

                                                    <div class="row">
                                                        <div class="col-lg-12 form-group mb-3">
                                                            <label for="pet_id">Select Patient</label>
                                                            <select name="pet_id" id="editpet_id" class="form-control"
                                                                required>
                                                                <option value="">Select Patient</option>
                                                                @foreach ($patient as $item)
                                                                    <option value="{{ $item->pat_id }}"
                                                                        {{ isset($equipment) && $equipment->pet_id == $item->pat_id ? 'selected' : '' }}>
                                                                        {{ $item->first_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <strong>Add group of Equipment for Case</strong>
                                                            <div class="form-group mb-3">
                                                                <label for="">Group</label>
                                                                <select name="e_group" id="edite_group"
                                                                    class="form-select">
                                                                    <option value="">Select Group</option>
                                                                    @foreach ($equipmentGroups as $group)
                                                                        <option value="{{ $group->eqg_id }}">
                                                                            {{ $group->eqg_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <strong>Add/Edit/Remove Equipment</strong>
                                                            <select name="e_configure" class="form-select mb-3"
                                                                id="edite_configure">
                                                                <option value="">Select Equipment</option>
                                                                @foreach ($equipments as $equipment)
                                                                    <option value="{{ $equipment->eq_id }}"
                                                                        data-name="{{ $equipment->eq_name }}"
                                                                        data-serial="{{ $equipment->eq_serial }}"
                                                                        data-lastservice="{{ $equipment->eq_lastservice }}"
                                                                        data-nextservice="{{ $equipment->eq_nextservice }}"
                                                                        data-billingcode="{{ $equipment->eq_billingcode }}"
                                                                        data-notes="{{ $equipment->eq_notes }}"
                                                                        data-manufacturer="{{ $equipment->eq_manufacturer }}"
                                                                        data-type="{{ $equipment->eq_type }}">
                                                                        {{ $equipment->eq_type }} -
                                                                        {{ $equipment->eq_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Type</label>
                                                                <select name="e_type" id="edite_type"
                                                                    class="form-select">
                                                                    <option value="">Select Type</option>
                                                                    @foreach ($equipments as $equipment)
                                                                        <option value="{{ $equipment->eq_type }}">
                                                                            {{ $equipment->eq_type }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Manufacturer</label>
                                                                <input type="text" name="e_manufacturer"
                                                                    class="form-control" id="edite_manufacturer"
                                                                    placeholder="Manufacturer">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Name</label>
                                                                <input type="text" name="e_name" class="form-control"
                                                                    id="edite_name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Serial Number</label>
                                                                <input type="text" name="serial_number"
                                                                    class="form-control" id="eserial_number"
                                                                    placeholder="Serial Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Last Service Date</label>
                                                                <input type="date" name="last_service_date"
                                                                    class="form-control" id="elast_service_date"
                                                                    placeholder="Last Service Date">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Next Service Date</label>
                                                                <input type="date" name="next_service_date"
                                                                    class="form-control" id="enext_service_date"
                                                                    placeholder="Next Service Date">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Billing Code</label>
                                                                <input type="text" name="billing_code"
                                                                    class="form-control" id="ebilling_code"
                                                                    placeholder="Billing Code">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Note</label>
                                                                <textarea class="form-control" id="enote" name="note" rows="4"></textarea>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="btn w-100 btn-dark">Update
                                                                Equipment</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>
                        </section>

                        <!-- Supplies Tab -->
                        <section id="tab5" class="tab-pane fade">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Supply modal content -->
                                    <div id="ssignup-modal" class="modal fade" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="text-center mt-2 mb-4">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                                            <h4 class="mb-0"><b>Add Supplies</b></h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>

                                                    <form method="POST" action="{{ route('add-caseSupply') }}"
                                                        class="mt-4">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-lg-12 form-group mb-3">
                                                                <label for="pet_id">Select Patient</label>
                                                                <select name="pet_id" id="pet_id"
                                                                    class="form-control" required>
                                                                    <option value="">Select Patient</option>
                                                                    @foreach ($patient as $item)
                                                                        <option value="{{ $item->pat_id }}"
                                                                            {{ session('pat_id') == $item->pat_id ? 'selected' : '' }}>
                                                                            {{ $item->first_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <strong>Add groups of Supplies for Case</strong>
                                                                <div class="form-group mb-3">
                                                                    <label for="">Group</label>
                                                                    <select name="csu_group" class="form-select" required>
                                                                        <option value="">Select Group</option>
                                                                        @foreach ($supplyGroups as $group)
                                                                            <option value="{{ $group->spg_id }}">
                                                                                {{ $group->spg_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <strong>Add/Edit/Remove Supplies</strong>
                                                                <div class="form-group mb-3">
                                                                    <label for="">Type</label>
                                                                    <select name="csu_type" class="form-select">
                                                                        <option value="">Select Type</option>
                                                                        <option value="Antegrade Cannula">Antegrade Cannula
                                                                        </option>
                                                                        <option value="Aortic Vent">Aortic Vent</option>
                                                                        <option value="Arterial Cannula">Arterial Cannula
                                                                        </option>
                                                                        <option value="Biomedicus">Biomedicus</option>
                                                                        <option value="Cell Saver Cardiotomy">Cell Saver
                                                                            Cardiotomy</option>
                                                                        <option value="Femoral Venous">Femoral Venous
                                                                        </option>
                                                                        <option value="Left Vent Catheter">Left Vent
                                                                            Catheter</option>
                                                                        <option value="Multiple Perf Set">Multiple Perf Set
                                                                        </option>
                                                                        <option value="Suction Tubing">Suction Tubing
                                                                        </option>
                                                                        <option value="Sump/Vent">Sump/Vent</option>
                                                                        <option value="Venous Cannula">Venous Cannula
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Manufacturer</label>
                                                                    <input type="text" name="csu_manufacturer"
                                                                        class="form-control" placeholder="Manufacturer">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Name</label>
                                                                    <input type="text" name="csu_name"
                                                                        class="form-control" placeholder="Name">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Lot Number</label>
                                                                    <input type="text" name="csu_lot_number"
                                                                        class="form-control" placeholder="Lot Number">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Expiration Date</label>
                                                                    <input type="date" name="csu_ex_date"
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Billing Code</label>
                                                                    <input type="text" name="csu_billing_code"
                                                                        class="form-control" placeholder="Billing Code">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Number Used</label>
                                                                    <input type="text" name="csu_number_used"
                                                                        class="form-control" placeholder="Number Used">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Note</label>
                                                                    <textarea class="form-control" name="csu_note" placeholder="Note" rows="4"></textarea>

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 text-center">
                                                                <button type="submit" class="btn w-100 btn-dark"
                                                                    id="submitBtn">Add Supply</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <div class="col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 d-flex justify-content-end">

                                                        <button type="button"
                                                            class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                                            data-bs-toggle="modal" data-bs-target="#ssignup-modal">
                                                            <i class="fas fa-plus"></i> Add Supply
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="users-table2"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Group</th>
                                                                <th>Type</th>
                                                                <th>Manufacturer</th>
                                                                <th>Name</th>
                                                                <th>Lot Number</th>
                                                                <th>Expiration Date</th>
                                                                <th>Billing Code</th>
                                                                <th>Number Used</th>
                                                                <th>Note</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $k = 0; @endphp
                                                            @foreach ($caseSupplys as $supply)
                                                                <tr id="row-{{ $supply->csu_id }}">
                                                                    <td>{{ ++$k }}</td>
                                                                    <td>{{ $supply->supplyGroup->spg_name ?? 'N/A' }}</td>
                                                                    <td>{{ $supply->csu_type }}</td>
                                                                    <td>{{ $supply->csu_manufacturer }}</td>
                                                                    <td>{{ $supply->csu_name }}</td>
                                                                    <td>{{ $supply->csu_lot_number }}</td>
                                                                    <td>{{ $supply->csu_ex_date }}</td>
                                                                    <td>{{ $supply->csu_billing_code }}</td>
                                                                    <td>{{ $supply->csu_number_used }}</td>
                                                                    <td>{{ $supply->csu_note }}</td>
                                                                    <td>
                                                                        <a onclick="editsupplyBtn({{ json_encode($supply) }})"
                                                                            href="javascript:void(0);">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0);"
                                                                            class="edit-icon delete-user-btn text-danger"
                                                                            onclick="confirmDelete('{{ route('delete-caseSupply', $supply->csu_id) }}', '{{ $supply->csu_id }}')">
                                                                            <i class="fa-solid fa-trash-can-arrow-up"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /* --------------------------- edit Case modal -------------------------- */ --}}
                                <div id="editCaseSupply" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content ">
                                            <div class="modal-body ">
                                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                                    <h4 class="mb-0"><b>Edit Supply</b></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form method="POST" action="{{ route('edit-caseSupply') }}"
                                                    class="mt-4">
                                                    @csrf
                                                    <input type="hidden" name="csu_id" id="csu_id">

                                                    <div class="row">
                                                        <div class="col-lg-12 form-group mb-3">
                                                            <label for="pet_id">Select Patient</label>
                                                            <select name="pet_id" id="editpet_id" class="form-control"
                                                                required>
                                                                <option value="">Select Patient</option>
                                                                @foreach ($patient as $item)
                                                                    <option value="{{ $item->pat_id }}"
                                                                        {{ isset($supply) && $supply->pet_id == $item->pat_id ? 'selected' : '' }}>
                                                                        {{ $item->first_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <strong>Add groups of Supplies for Case</strong>
                                                            <div class="form-group mb-3">
                                                                <label for="">Group</label>
                                                                <select name="csu_group" id="editcsu_group"
                                                                    class="form-select">
                                                                    <option value="">Select Group</option>
                                                                    @foreach ($supplyGroups as $group)
                                                                        <option value="{{ $group->spg_id }}">
                                                                            {{ $group->spg_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <strong>Add/Edit/Remove Supplies</strong>
                                                            <div class="form-group mb-3">
                                                                <label for="">Type</label>
                                                                <select name="csu_type" id="editcsu_type"
                                                                    class="form-select">
                                                                    <option value="">Select Type</option>
                                                                    <option value="Antegrade Cannula">Antegrade Cannula
                                                                    </option>
                                                                    <option value="Aortic Vent">Aortic Vent</option>
                                                                    <option value="Arterial Cannula">Arterial Cannula
                                                                    </option>
                                                                    <option value="Biomedicus">Biomedicus</option>
                                                                    <option value="Cell Saver Cardiotomy">Cell Saver
                                                                        Cardiotomy</option>
                                                                    <option value="Femoral Venous">Femoral Venous</option>
                                                                    <option value="Left Vent Catheter">Left Vent Catheter
                                                                    </option>
                                                                    <option value="Multiple Perf Set">Multiple Perf Set
                                                                    </option>
                                                                    <option value="Suction Tubing">Suction Tubing</option>
                                                                    <option value="Sump/Vent">Sump/Vent</option>
                                                                    <option value="Venous Cannula">Venous Cannula</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Manufacturer</label>
                                                                <input type="text" name="csu_manufacturer"
                                                                    id="editcsu_manufacturer" class="form-control"
                                                                    placeholder="Manufacturer">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Name</label>
                                                                <input type="text" name="csu_name"
                                                                    id="editcsu_name" class="form-control"
                                                                    placeholder="Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Lot Number</label>
                                                                <input type="text" name="csu_lot_number"
                                                                    id="editcsu_lot_number" class="form-control"
                                                                    placeholder="Lot Number">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Expiration Date</label>
                                                                <input type="date" name="csu_ex_date"
                                                                    id="editcsu_ex_date" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Billing Code</label>
                                                                <input type="text" name="csu_billing_code"
                                                                    id="editcsu_billing_code" class="form-control"
                                                                    placeholder="Billing Code">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Number Used</label>
                                                                <input type="text" name="csu_number_used"
                                                                    id="editcsu_number_used" class="form-control"
                                                                    placeholder="Number Used">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="">Note</label>
                                                                <textarea class="form-control" id="editcsu_note" name="csu_note" placeholder="Note" rows="4"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="btn w-100 btn-dark"
                                                                id="submitBtn">Update Supply</button>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>
                        </section>

                        <!-- Coronary Artery Tab -->
                        <section id="tab6" class="tab-pane fade">
                            @include('cases.coronary')
                            <div class="table-responsive mt-3">
                                <table id="users-table3" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Distal</th>
                                            <th>Proximal</th>
                                            <th>Conduit</th>
                                            <th>DistalPosition</th>
                                            <th>Endarterectomy</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $j = 0; @endphp
                                        @foreach ($del_cabs as $cab)
                                            <tr id="row-{{ $cab->cab_id }}">
                                                <td>{{ ++$j }}</td>
                                                <td>{{ $cab->cab_ins_distal ?? 'N/A' }}</td>
                                                <td>{{ $cab->cab_ins_proximal ?? 'N/A' }}</td>
                                                <td>{{ $cab->cab_ins_conduit ?? 'N/A' }}</td>
                                                <td>{{ $cab->cab_ins_position == 1 ? 'End to Side' : ($cab->cab_ins_position == 0 ? 'Side to Side' : 'N/A') }}</td>
                                        <td>{{ $cab->cab_ins_end == 1 ? 'Yes' : ($cab->cab_ins_end == 0 ? 'No' : 'N/A') }}</td>
                                                <td>{{ $cab->note ?? 'N/A' }}</td>
                                                <td>
                                                    {{-- <a onclick="editCLitem($cab)" href="javascript:void(0);">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a> --}}
                                                    <a href="javascript:void(0);"
                                                        onclick="confirmDelete('{{ route('delete-cabypasses', $cab->cab_id) }}', {{ $cab->cab_id }})"
                                                        class="edit-icon delete-user-btn text-danger">
                                                        <i class="fa-solid fa-trash-can-arrow-up"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        {{-- procedure section  --}}

                        <section id="tab7" class="tab-pane fade">
                            @include('cases.procedure')
                        </section>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/js/caseprocedure.min.js') }}"></script>
    <script>
        function editsupplyBtn(caseSupply) {
            document.getElementById("csu_id").value = caseSupply.csu_id;
            document.getElementById("editpet_id").value = caseSupply.pet_id;
            document.getElementById("editcsu_group").value = caseSupply.csu_group;
            document.getElementById("editcsu_type").value = caseSupply.csu_type;
            document.getElementById("editcsu_manufacturer").value = caseSupply.csu_manufacturer;
            document.getElementById("editcsu_name").value = caseSupply.csu_name;
            document.getElementById("editcsu_lot_number").value = caseSupply.csu_lot_number;
            document.getElementById("editcsu_ex_date").value = caseSupply.csu_ex_date;
            document.getElementById("editcsu_billing_code").value = caseSupply.csu_billing_code;
            document.getElementById("editcsu_number_used").value = caseSupply.csu_number_used;
            document.getElementById("editcsu_note").value = caseSupply.csu_note;

            // Show the modal
            var editModal = new bootstrap.Modal(document.getElementById("editCaseSupply"));
            editModal.show();
        }
    </script>


    <script>
        document.getElementById("equipmentSelect").addEventListener("change", function() {
            let selectedOption = this.options[this.selectedIndex];

            document.getElementById("e_name").value = selectedOption.getAttribute("data-name") || "";
            document.getElementById("serial_number").value = selectedOption.getAttribute("data-serial") || "";
            document.getElementById("last_service_date").value = selectedOption.getAttribute("data-lastservice") ||
                "";
            document.getElementById("next_service_date").value = selectedOption.getAttribute("data-nextservice") ||
                "";
            document.getElementById("billing_code").value = selectedOption.getAttribute("data-billingcode") || "";
            document.getElementById("note").value = selectedOption.getAttribute("data-notes") || "";

            // **Auto-fill Manufacturer**
            document.getElementById("e_manufacturer").value = selectedOption.getAttribute("data-manufacturer") ||
                "";

            // **Auto-select Type and Show Only eq_type (not eq_name)**
            let eTypeSelect = document.querySelector("select[name='e_type']");
            if (eTypeSelect) {
                let equipmentType = selectedOption.getAttribute("data-type") || "";

                // Remove all previous options except the first one (default)
                eTypeSelect.innerHTML = '<option value="">Select Type</option>';

                // Add only the selected equipment's type
                if (equipmentType) {
                    let newOption = document.createElement("option");
                    newOption.value = equipmentType;
                    newOption.textContent = equipmentType; // Show Only eq_type Instead of eq_name
                    newOption.selected = true;
                    eTypeSelect.appendChild(newOption);
                }
            }
        });
    </script>

    <script>
        function editCEquipment(caseE) {
            document.getElementById("ce_id").value = caseE.ce_id;
            document.getElementById("edite_group").value = caseE.e_group;
            document.getElementById("edite_configure").value = caseE.e_configure;
            document.getElementById("edite_type").value = caseE.e_type;
            document.getElementById("edite_manufacturer").value = caseE.e_manufacturer;
            document.getElementById("edite_name").value = caseE.e_name;
            document.getElementById("eserial_number").value = caseE.serial_number;
            document.getElementById("elast_service_date").value = caseE.last_service_date;
            document.getElementById("enext_service_date").value = caseE.next_service_date;
            document.getElementById("ebilling_code").value = caseE.billing_code;
            document.getElementById("enote").value = caseE.note;

            var editModal = new bootstrap.Modal(document.getElementById("editCaseEqu"));
            editModal.show();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to enable/disable elements based on input value
            function toggleElement(inputId, targetIds) {
                let inputValue = parseInt(document.getElementById(inputId).value, 10);
                targetIds.forEach(targetId => {
                    let element = document.getElementById(targetId);
                    if (element) {
                        if (inputValue > 0) {
                            element.removeAttribute("disabled");
                        } else {
                            element.setAttribute("disabled", "true");
                        }
                    }
                });
            }

            // Enable/Disable 'veinSelect' based on 'numberInput'
            document.getElementById("numberInput").addEventListener("input", function() {
                toggleElement("numberInput", ["veinSelect"]);
            });

            // Enable/Disable radial artery-related fields based on 'radialArteriesInput'
            document.getElementById("radialArteriesInput").addEventListener("input", function() {
                toggleElement("radialArteriesInput", ["distalAnastomoses", "harvestTechnique", "prepTime"]);
            });

            // Enable/Disable 'Vein Harvest and Prep Time' based on selected value in 'veinSelect'
            document.getElementById("veinSelect").addEventListener("change", function() {
                let selectedValue = this.value.trim(); // Get selected option value
                let veinPrepInput = document.getElementById("veinPrepTime"); // Find input field

                if (selectedValue === "Endoscopic" || selectedValue === "Direct Vision (open)" ||
                    selectedValue === "Both") {
                    veinPrepInput.removeAttribute("disabled");
                } else {
                    veinPrepInput.setAttribute("disabled", "true");
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("imaSelect").addEventListener("change", function() {
                let selectedValue = this.value.trim(); // Get selected value

                let primaryReasonSelect = document.getElementById(
                    "primaryReasonSelect"); // Second select box
                let imaDetailsDiv = document.getElementById("imaDetailsDiv"); // Div for IMA details

                // Handling "Indicate Primary Reason" select box
                if (selectedValue === "No IMA") {
                    primaryReasonSelect.removeAttribute("disabled"); // Enable
                    imaDetailsDiv.style.opacity = "0.5"; // Make it semi-transparent
                    imaDetailsDiv.style.pointerEvents = "none"; // Disable interactions
                } else {
                    primaryReasonSelect.setAttribute("disabled", "true"); // Disable
                    imaDetailsDiv.style.opacity = "1"; // Fully visible
                    imaDetailsDiv.style.pointerEvents = "auto"; // Enable interactions
                }
            });
        });
    </script>

    <!-- for Case Staff -->
    <script>
        function editButtonCstaff(caseStaff) {
            document.getElementById("cs_id").value = caseStaff.cs_id;
            document.getElementById("editpet_id").value = caseStaff.pet_id;
            document.getElementById("edit_surgeon").value = caseStaff.surgeon;
            document.getElementById("edit_second_surgeon").value = caseStaff.second_surgeon;
            document.getElementById("edit_pa_first_assistant").value = caseStaff.pa_first_assistant;
            document.getElementById("edit_anesthesiologist").value = caseStaff.anesthesiologist;
            document.getElementById("edit_crna_res").value = caseStaff.crna_res;
            document.getElementById("edit_cardiologist").value = caseStaff.cardiologist;
            document.getElementById("edit_family_md").value = caseStaff.family_md;
            document.getElementById("edit_perfusionist").value = caseStaff.perfusionist;
            document.getElementById("edit_perfusionist_category").value = caseStaff.perfusionist_category;
            document.getElementById("edit_perfusionist_status").value = caseStaff.perfusionist_status;
            document.getElementById("edit_second_perfusionist").value = caseStaff.second_perfusionist;
            document.getElementById("edit_second_perfusionist_category").value = caseStaff.second_perfusionist_category;

            var editModal = new bootstrap.Modal(document.getElementById("editCaseStaff"));
            editModal.show();
        }
    </script>

    <!-- For expand lengthy table td -->
    <script>
        function expandText(td) {
            if (td.style.maxWidth === '200px') {
                td.style.maxWidth = 'none';
                td.style.whiteSpace = 'normal'; // Allow text to wrap
            } else {
                td.style.maxWidth = '200px';
                td.style.whiteSpace = 'nowrap'; // Prevent text from wrapping
            }
        }
    </script>


    <!-- Coronary Artery ByPass scritping for display and hide, enable and disable start -->
    <script>
        $(document).ready(function() {
            let numberInput = $("#numberInput");
            let veinSelect = $("#veinSelect");
            let veinPrepTime = $("#veinPrepTime");
            let customBox = $(".custom-border-box-text.position-relative").first();
            let innerBox = $(".custom-border-box-text.position-relative").last();
            customBox.hide();
            innerBox.hide();

            function toggleVisibility() {
                if (numberInput.val() > 0) {
                    customBox.stop(true, true).slideDown();
                    veinSelect.prop("disabled", false);
                } else {
                    customBox.stop(true, true).slideUp();
                    veinSelect.prop("disabled", true);
                    veinPrepTime.prop("disabled", true);
                }
            }

            function toggleVeinPrepTime() {
                let selectedValue = veinSelect.val();
                if (selectedValue === "Endoscopic" || selectedValue === "Direct Vision (open)" || selectedValue ===
                    "Both") {
                    innerBox.stop(true, true).slideDown();
                    veinPrepTime.prop("disabled", false);
                } else {
                    innerBox.stop(true, true).slideUp();
                    veinPrepTime.prop("disabled", true);
                }
            }

            numberInput.on("input", toggleVisibility);
            veinSelect.on("change", toggleVeinPrepTime);

            // Initial state check
            toggleVisibility();
            toggleVeinPrepTime();
        });
    </script>

    <script>
        $(document).ready(function() {
            var section = $('#radialArterySection');

            // Initially hide section using script
            section.hide();

            $('#radialArteriesInput').on('input', function() {
                var value = $(this).val();
                if (value > 0) {
                    section.stop(true, true).slideDown();
                    $('#distalAnastomoses, #harvestTechnique, #prepTime').prop('disabled', false);
                } else {
                    section.stop(true, true).slideUp();
                    $('#distalAnastomoses, #harvestTechnique, #prepTime').prop('disabled', true);
                }
            });

            // Initial check in case of pre-filled value
            $('#radialArteriesInput').trigger('input');
        });
    </script>

    <script>
        $(document).ready(function() {
            var primaryReasonDiv = $('#primaryReasonSelect').closest('.custom-border-box-text');
            var imaDetailsDiv = $('#imaDetailsDiv');
            var distalAnastomosesInput = imaDetailsDiv.find(
                'input'); // "Total # of Distal Anastomoses done using IMA grafts"
            var harvestTechniqueSelect = imaDetailsDiv.find('select'); // "IMA Harvest Technique"
            var primaryReasonSelect = $('#primaryReasonSelect');

            // Initially hide both sections and disable fields
            primaryReasonDiv.hide();
            imaDetailsDiv.hide();
            distalAnastomosesInput.prop('disabled', true);
            harvestTechniqueSelect.prop('disabled', true);
            primaryReasonSelect.prop('disabled', true);

            $('#imaSelect').on('change', function() {
                var selectedValue = $(this).val();

                // If No IMA condition
                if (selectedValue === "No IMA") {
                    primaryReasonDiv.stop(true, true).slideDown();
                    primaryReasonSelect.prop('disabled', false);
                } else {
                    primaryReasonDiv.stop(true, true).slideUp();
                    primaryReasonSelect.prop('disabled', true);
                }

                // If Left, Right, or Both IMAs condition
                if (selectedValue === "Left IMA" || selectedValue === "Right IMA" || selectedValue ===
                    "Both IMAS") {
                    imaDetailsDiv.stop(true, true).slideDown();
                    distalAnastomosesInput.prop('disabled', false);
                    harvestTechniqueSelect.prop('disabled', false);
                } else {
                    imaDetailsDiv.stop(true, true).slideUp();
                    distalAnastomosesInput.prop('disabled', true);
                    harvestTechniqueSelect.prop('disabled', true);
                }
            });

            // Initial check in case of pre-selected value
            $('#imaSelect').trigger('change');
        });
    </script>
    <!-- Coronary Artery ByPass scritping for display and hide, enable and disable End -->
    <script>
        document.getElementById("proCoroartSelect").addEventListener("change", function() {
            let selectedValue = this.value;
            if (selectedValue.includes("Yes")) {
                $("#yesModal").modal("show"); // Open Bootstrap Modal
            }
        });
    </script>
    <script>
        document.querySelectorAll("input[name='valve_surgery']").forEach(function(radio) {
            radio.addEventListener("change", function() {
                if (this.value === "yes") {
                    $("#valveModal").modal("show"); // Open Bootstrap Modal
                }
            });
        });
        $("#valveModal").on("hidden.bs.modal", function() {
            document.getElementById("valve_no").checked = true;
        });
    </script>
    <script>
        document.getElementById("noncardic_yes").addEventListener("change", function() {
            if (this.checked) {
                $("#noncardic").modal("show"); // Open Bootstrap Modal
                document.getElementById("noncardic_no").checked = false; // Uncheck "No"
            }
        });
        $("#noncardic").on("hidden.bs.modal", function() {
            document.getElementById("noncardic_no").checked = true;
        });
    </script>
    <script>
        document.getElementById("implant_yes").addEventListener("change", function() {
            if (this.checked) {
                $("#cardicAssist").modal("show");
                document.getElementById("implant_no").checked = false;
            }
        });
        $("#cardicAssist").on("hidden.bs.modal", function() {
            document.getElementById("implant_no").checked = true;
        });
    </script>
    <script>
        document.getElementById("cardiac_yes").addEventListener("change", function() {
            if (this.checked) {
                $("#otherCardic").modal("show"); // Modal open karein
                document.getElementById("cardiac_no").checked = false; // "No" ko uncheck karein
            }
        });

        $("#otherCardic").on("hidden.bs.modal", function() {
            document.getElementById("cardiac_no").checked = true; // Modal close hone par "No" ko select karein
        });
    </script>
    <script>
        document.getElementById("cardiacfib_yes").addEventListener("change", function() {
            if (this.checked) {
                $("#atrailFilrilate").modal("show"); // Modal open karein
                document.getElementById("cardiacfib_no").checked = false; // "No" ko uncheck karein
            }
        });

        $("#atrailFilrilate").on("hidden.bs.modal", function() {
            document.getElementById("cardiacfib_no").checked = true; // Modal close hone par "No" select karein
        });
    </script>
    <script>
        document.querySelector("select[name='aortic_proce']").addEventListener("change", function() {
            if (this.value.startsWith("Yes")) { // Yes se start hone wale options check karega
                $("#aorticModal").modal("show"); // Modal open karega
            }
        });
    </script>



@endsection
