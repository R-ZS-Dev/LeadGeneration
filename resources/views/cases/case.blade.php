@extends('sitemaster.master-layout')
@section('title', 'All Cases')
@section('content')
    <div class="container-fluid">
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
                    <ul class="nav p-3" id="myTab" role="tablist">
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
                            <button class="btn tabButton" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3" aria-selected="false">
                                Equipment
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

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Sex</label>
                                                    <div>
                                                        <input type="radio" name="sex" value="Male" checked> Male
                                                        <input type="radio" name="sex" value="Female"> Female
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Is this a Child?</label>
                                                    <div>
                                                        <input type="radio" name="is_child" value="yes"> Yes
                                                        <input type="radio" name="is_child" value="no" checked> No
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
                                        <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
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

                        <!-- Password Tab -->
                        <section id="tab3" class="tab-pane fade">
                            <form action="{{ route('settings.updatePassword') }}" method="POST" id="passwordForm">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control" required>
                                        <small class="text-danger d-none" id="currentPasswordError">Incorrect current
                                            password.</small>
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="new_password" id="new_password"
                                            class="form-control" required disabled>
                                        <small class="text-danger d-none" id="passwordError">Password must be at least 8
                                            characters, include uppercase, lowercase, number & special character.</small>
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="new_password_confirmation" id="confirm_password"
                                            class="form-control" required disabled>
                                        <small class="text-danger d-none" id="confirmError">Passwords do not
                                            match.</small>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" id="submitBtn" class="btn btn-dark" disabled>Update
                                        Password</button>
                                </div>
                            </form>

                        </section>

                        <!-- Email Tab -->
                        <section id="tab4" class="tab-pane fade">
                            <form id="emailSettingsForm" action="{{ route('settings.updateEmail') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="mail_from_name" class="form-control"
                                            value="{{ old('mail_from_name', Auth::user()->settings->mail_from_name ?? '') }}">
                                        <div class="invalid-feedback">Name is required.</div>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', Auth::user()->settings->email ?? '') }}">
                                        <div class="invalid-feedback">Valid email is required.</div>
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ old('password', Auth::user()->settings->password ?? '') }}">
                                        <div class="invalid-feedback">Password is required.</div>
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Port</label>
                                        <input type="text" name="port" class="form-control"
                                            value="{{ old('port', Auth::user()->settings->port ?? '') }}">
                                        <div class="invalid-feedback">Port is required.</div>
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">SMTP</label>
                                        <input type="text" name="smtp" class="form-control"
                                            value="{{ old('smtp', Auth::user()->settings->smtp ?? '') }}">
                                        <div class="invalid-feedback">SMTP is required.</div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                </div>
                            </form>
                        </section>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')

    <script></script>
@endsection
