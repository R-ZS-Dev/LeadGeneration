@extends('sitemaster.master-layout')
@section('title','Case staff')
@section('content')
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
        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Add Staff</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('add-casestaff') }}" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Select Surgeon</label>
                                        <select name="surgeon" class="form-select">
                                            <option value="">Select Surgeon</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Select 2nd Surgeon</label>
                                        <select name="second_surgeon" class="form-select">
                                            <option value="">Select 2nd Surgeon</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select PA/1st Assistant</label>
                                        <select name="pa_first_assistant" class="form-select">
                                            <option value="">Select PA/1st Assistant</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Anesthesiologist</label>
                                        <select name="anesthesiologist" class="form-select">
                                            <option value="">Select Anesthesiologist</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select CRNA/RES</label>
                                        <select name="crna_res" class="form-select">
                                            <option value="">Select CRNA/RES</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Cardiologist</label>
                                        <select name="cardiologist" class="form-select">
                                            <option value="">Select Cardiologist</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Family MD</label>
                                        <select name="family_md" class="form-select">
                                            <option value="">Select Family MD</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Perfusionist</label>
                                        <select name="perfusionist" class="form-select">
                                            <option value="">Select Perfusionist</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Perfusionist Category</label>
                                        <select name="perfusionist_category" class="form-select">
                                            <option>Select Perfusionist Category</option>
                                            <option value="1P Cardiopulmonary Bypass (CPB), Primary">1P Cardiopulmonary Bypass (CPB), Primary</option>
                                            <option value="2P Instructor CPB, Primary">2P Instructor CPB, Primary</option>
                                            <option value="3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary">3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary</option>
                                            <option value="4P Isolated Limb/Organ Perfusion, Primary">4P Isolated Limb/Organ Perfusion, Primary</option>
                                            <option value="5P Veno-Venous of Left Heart Bypass, Primary">5P Veno-Venous of Left Heart Bypass, Primary</option>
                                            <option value="6P Ventricular Assist Device (VAD), Primary">6P Ventricular Assist Device (VAD), Primary</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Perfusionist Status</label>
                                        <select name="perfusionist_status" class="form-select">
                                            <option value="">Select Perfusionist Status</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select 2nd Perfusionist</label>
                                        <select name="second_perfusionist" class="form-select">
                                            <option value="">Select 2nd Perfusionist</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select 2nd Perfusionist Category</label>
                                        <select name="second_perfusionist_category" class="form-select">
                                            <option>Select 2nd Perfusionist Category</option>
                                            <option value="1S CPB, First Assistant, Secondary">1S CPB, First Assistant, Secondary</option>
                                            <option value="25 Ex Vivo, Secondary">25 Ex Vivo, Secondary</option>
                                            <option value="35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary">
                                                35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary
                                            </option>
                                            <option value="45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary">
                                                45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary
                                            </option>
                                            <option value="5S High Fidelity Perfusion Simulation (HFPS), Secondary">5S High Fidelity Perfusion Simulation (HFPS), Secondary</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add Supply</button>
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

                            <button type="button" class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#signup-modal">
                                <i class="fas fa-plus"></i> Add Staff
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
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
                                @foreach($caseStaffs as $caseStaff)
                                <tr id="row-{{ $caseStaff->cs_id }}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $caseStaff->surgeonDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->secondSurgeonDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->paFirstAssistantDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->anesthesiologistDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->crnaResDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->cardiologistDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->familyMdDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->perfusionistDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->perfusionist_category ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->perfusionistStatusDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->secondPerfusionistDetail->st_name ?? 'N/A' }}</td>
                                    <td>{{ $caseStaff->second_perfusionist_category ?? 'N/A' }}</td>
                                    <td>
                                        <a onclick="editButtonCstaff({{ json_encode($caseStaff) }})"
                                            href="javascript:void(0);">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>


                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete('{{ route('delete-casestaff', $caseStaff->cs_id) }}' , '{{$caseStaff->cs_id}}')"
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
    <div id="editCaseStaff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Edit Staff</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-casestaff') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="cs_id" id="cs_id">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Select Surgeon</label>
                                    <select name="surgeon" id="edit_surgeon" class="form-select">
                                        <option>Select Surgeon</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select 2nd Surgeon</label>
                                    <select name="second_surgeon" id="edit_second_surgeon" class="form-select">
                                        <option value="">Select 2nd Surgeon</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select PA/1st Assistant</label>
                                    <select name="pa_first_assistant" id="edit_pa_first_assistant" class="form-select">
                                        <option value="">Select PA/1st Assistant</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Anesthesiologist</label>
                                    <select name="anesthesiologist" id="edit_anesthesiologist" class="form-select">
                                        <option value="">Select Anesthesiologist</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select CRNA/RES</label>
                                    <select name="crna_res" id="edit_crna_res" class="form-select">
                                        <option value="">Select CRNA/RES</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Cardiologist</label>
                                    <select name="cardiologist" id="edit_cardiologist" class="form-select">
                                        <option value="">Select Cardiologist</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Family MD</label>
                                    <select name="family_md" id="edit_family_md" class="form-select">
                                        <option value="">Select Family MD</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Perfusionist</label>
                                    <select name="perfusionist" id="edit_perfusionist" class="form-select">
                                        <option value="">Select Perfusionist</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Perfusionist Category</label>
                                    <select name="perfusionist_category" id="edit_perfusionist_category" class="form-select">
                                        <option value="">Select Perfusionist Category</option>
                                        <option value="1P Cardiopulmonary Bypass (CPB), Primary" {{ $caseStaff->perfusionist_category == "1P Cardiopulmonary Bypass (CPB), Primary" ? 'selected' : '' }}>1P Cardiopulmonary Bypass (CPB), Primary</option>
                                        <option value="2P Instructor CPB, Primary" {{ $caseStaff->perfusionist_category == "2P Instructor CPB, Primary" ? 'selected' : '' }}>2P Instructor CPB, Primary</option>
                                        <option value="3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary" {{ $caseStaff->perfusionist_category == "3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary" ? 'selected' : '' }}>3P Extra-Corporeal Membrane Oxygenation (ECMO), Primary</option>
                                        <option value="4P Isolated Limb/Organ Perfusion, Primary" {{ $caseStaff->perfusionist_category == "4P Isolated Limb/Organ Perfusion, Primary" ? 'selected' : '' }}>4P Isolated Limb/Organ Perfusion, Primary</option>
                                        <option value="5P Veno-Venous of Left Heart Bypass, Primary" {{ $caseStaff->perfusionist_category == "5P Veno-Venous of Left Heart Bypass, Primary" ? 'selected' : '' }}>5P Veno-Venous of Left Heart Bypass, Primary</option>
                                        <option value="6P Ventricular Assist Device (VAD), Primary" {{ $caseStaff->perfusionist_category == "6P Ventricular Assist Device (VAD), Primary" ? 'selected' : '' }}>6P Ventricular Assist Device (VAD), Primary</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Perfusionist Status</label>
                                    <select name="perfusionist_status" id="edit_perfusionist_status" class="form-select">
                                        <option value="">Select Perfusionist Status</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select 2nd Perfusionist</label>
                                    <select name="second_perfusionist" id="edit_second_perfusionist" class="form-select">
                                        <option value="">Select 2nd Perfusionist</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{ $staff->st_id }}">{{ $staff->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select 2nd Perfusionist Category</label>
                                    <select name="second_perfusionist_category" id="edit_second_perfusionist_category" class="form-select">
                                        <option value="">Select 2nd Perfusionist Category</option>
                                        <option value="1S CPB, First Assistant, Secondary"
                                            {{ ($caseStaff->second_perfusionist_category ?? '') == '1S CPB, First Assistant, Secondary' ? 'selected' : '' }}>
                                            1S CPB, First Assistant, Secondary
                                        </option>
                                        <option value="25 Ex Vivo, Secondary"
                                            {{ ($caseStaff->second_perfusionist_category ?? '') == '25 Ex Vivo, Secondary' ? 'selected' : '' }}>
                                            25 Ex Vivo, Secondary
                                        </option>
                                        <option value="35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary"
                                            {{ ($caseStaff->second_perfusionist_category ?? '') == '35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary' ? 'selected' : '' }}>
                                            35 Intraperitoneal Hyperthermic Chemoperfusion or Intrapleural Hyperthermic Chemoperfusion (HIPEC), Secondary
                                        </option>
                                        <option value="45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary"
                                            {{ ($caseStaff->second_perfusionist_category ?? '') == '45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary' ? 'selected' : '' }}>
                                            45 Cardiopulmonary Bypass (CPB) Standby Procedures, Secondary
                                        </option>
                                        <option value="5S High Fidelity Perfusion Simulation (HFPS), Secondary"
                                            {{ ($caseStaff->second_perfusionist_category ?? '') == '5S High Fidelity Perfusion Simulation (HFPS), Secondary' ? 'selected' : '' }}>
                                            5S High Fidelity Perfusion Simulation (HFPS), Secondary
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
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#users-table').DataTable({
            "paging": true, // Enable pagination
            "lengthChange": true, // Allow user to change the number of records per page
            "searching": true, // Enable search functionality
            "ordering": true, // Enable column sorting
            "info": true, // Display info like "Showing 1 to 10 of 50 entries"
            "autoWidth": false // Disable automatic column width adjustment
        });
    });
</script>
<script>
    function editButtonCstaff(caseStaff) {
        document.getElementById("cs_id").value = caseStaff.cs_id;
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.addEventListener("submit", function(event) {
            const activeModal = document.querySelector(".modal.show");
            if (!activeModal) return;

            const form = activeModal.querySelector("form");
            if (!form) return;

            const inputs = form.querySelectorAll("input:not([type='hidden'])");
            const submitBtn = form.querySelector("button[type='submit']");

            let isValid = true;

            inputs.forEach(input => {
                if (input.type !== "checkbox" && input.value.trim() === "") {
                    input.classList.add("is-invalid");
                    isValid = false;
                } else {
                    input.classList.remove("is-invalid");
                }
            });

            if (!isValid) {
                event.preventDefault();
            } else {
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm"></span> Processing...';
                submitBtn.disabled = true;
            }
        });
        document.addEventListener("input", function(event) {
            const input = event.target;
            if (input.value.trim() !== "") {
                input.classList.remove("is-invalid");
            }
        });
    });
</script>
@endsection