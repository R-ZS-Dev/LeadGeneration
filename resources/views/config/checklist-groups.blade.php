@extends('sitemaster.master-layout')
@section('title','Check list group')
@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- @if (session('success'))
            <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif --}}

    <!-- Success Message -->
    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Add Check List Group</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('add-checklistgroup') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="clg_name">Name</label>
                                    <input type="text" name="clg_name" id="clg_name" value="{{ old('clg_name') }}" class="form-control" placeholder="Check list name" required>
                                    @error('clg_name')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="clg_description">Description</label>
                                    <textarea name="clg_description" id="clg_description" class="form-control" rows="4" placeholder="Enter Description..." required>{{ old('clg_description') }}</textarea>
                                    @error('clg_description')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            @php
                            $checkboxes = [
                            "Anesthetic gas scavenge line operational", "Hoses leak-free", "Flow meter/gas blender operational",
                            "Source and appropriate connections of gas(es) confirmed", "Gas line(s) and filter connections secure",
                            "Gas exhaust unobstructed", "Alarms operational, audible and engaged", "Alarms reengaged",
                            "Allergies checked", "Anesthetic vaporizer correct", "Anesthetic vaporizer", "Announce bypass terminated",
                            "Anticoagulant tested and reported", "Appropriate lines claimed / shunts closed", "Arterial and venous lines clamped",
                            "Arterial circuit bubble free before transfusing perfusate", "Arterial filter / bubble trap debubbled",
                            "Backup full oxygen tank with flow meter available", "Batteries charged and operational",
                            "Blood bank number confirmed", "Blood products available", "Blood type / antibodies confirmed",
                            "Cardiotomy / hardshell venous reservoir(s) vented", "Cardiotomy positive-pressure relief valve present",
                            "Cell salvage device", "Chart reviewed", "Circuit/patient temperature probes placed", "Components debubbled",
                            "Components checked for package integrity/expiration", "Connections / stopcocks / caps secure",
                            "Devices securely attached to console", "Drugs available and properly labeled",
                            "Duplicate circuit components / hardware available", "Emergency lighting / flashlight available",
                            "Equipment clean", "Flow meter in correct direction and calibration",
                            "Flow rate indicator correct for patient and/or tubing size", "Gas flow confirmed",
                            "Hand cranks available", "Heart lung machine - Air bubble detector(s)", "Heart lung machine - Blood flow sensors",
                            "Heart lung machine - Low Level alarm", "Heart lung machine - Pressure monitors", "Heart lung machine - Pumps",
                            "Heart lung machine - Temperature monitors", "Heart lung machine - Timers", "Heat exchanger(s) leak-tested",
                            "Heater/Cooler", "Heparin time and dose confirmed", "Holders secure", "IABP", "Ice available",
                            "Inline sensors calibrated", "Leak free after pressurization", "Medical record number confirmed",
                            "Negative-pressure relief valve unobstructed", "No tubing kinks noted", "Occlusion(s) set",
                            "One way valve(s) in correct direction", "Oxygen analyzer calibrated", "Oxygen analyzer",
                            "Oxygen Blender / Flow Meter", "Patency of arterial line / cannula confirmed", "Patient identity confirmed",
                            "Power cord(s) connection(s) secure", "Pressure transducers / monitors calibrated and on proper scales",
                            "Procedure confirmed", "Pump head rotation smooth and quiet", "Pump suction(s) off", "Rollers rotate freely",
                            "Sampling syringes / laboratory tubes available", "Servoregulated connections tested",
                            "Servoregulation connections secure", "Shunt(s) closed", "Solution(s) checked", "Solutions available",
                            "Speed controls operational", "System debubbled and operational", "System leak-free after pressurization",
                            "Temperature range(s) tested and operational", "Tubing clamps available", "Tubing direction traced and correct",
                            "Vacuum regulator operational", "VAD device", "Vaporizer operational and filled", "Venous assist off / cardiotomy / venous reservoirs vented",
                            "Venous line occluder(s) calibrated and tested", "Vent(s) clamped / removed", "Vent(s) tested",
                            "Water lines unobstructed", "Water source(s) connected and operational"
                            ];
                            @endphp

                            @php
                            $firstColumnCount = ceil(count($checkboxes) * 0.47);
                            $checkboxes1 = array_slice($checkboxes, 0, $firstColumnCount);
                            $checkboxes2 = array_slice($checkboxes, $firstColumnCount);
                            @endphp

                            <div class="row">
                                <!-- First Column (40%) -->
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        @foreach ($checkboxes1 as $checkbox)
                                        <label>
                                            <input type="checkbox" name="rowboxes[]" value="{{ $checkbox }}" class="form-check-input"> {{ $checkbox }}
                                        </label><br>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Second Column (60%) -->
                                <div class="col-md-6">
                                    <div class="form-group-inp mb-2">
                                        @foreach ($checkboxes2 as $checkbox)
                                        <label>
                                            <input type="checkbox" name="rowboxes[]" value="{{ $checkbox }}" class="form-check-input"> {{ $checkbox }}
                                        </label><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-2">
                                    <input type="hidden" name="clg_active" value="0">
                                    <input type="checkbox" role="switch" name="clg_active" id="clg_active" checked
                                        value="1" class="form-check-input"
                                        {{ old('clg_active') ? 'checked' : '' }}>
                                    <label for="clg_active" class="form-check-label">Active</label>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                    Add Check List Group
                                </button>
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
                            <i class="fas fa-plus"></i> Add Check List Group
                        </button>

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Check List</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($viewClgroups as $index => $viewClgroup)
                            <tr id="row-{{ $viewClgroup->clg_id }}">
                                <td>{{ ++$i }}</td>
                                <td>{{ $viewClgroup->clg_name }}</td>
                                <td>{{ $viewClgroup->clg_description }}</td>
                                <td id="truncated-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; cursor: pointer;" onclick="expandText(this)">{{ implode(', ', json_decode($viewClgroup->rowboxes, true)) }}</td>
                                <td>
                                    @if ($viewClgroup->clg_active == '1')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="editCLGroup({{ json_encode($viewClgroup, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }})"
                                        href="javascript:void(0);">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>


                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete('{{ route('delete-checklistgroup', $viewClgroup->clg_id) }}', '{{ $viewClgroup->clg_id }}')"

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

{{-- /* --------------------------- edit checklist modal -------------------------- */ --}}
<div id="editCLG" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body ">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h4 class="mb-0"><b>Edit Checklist Group</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('update-cgroup') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="clg_id" id="clg_id" value="{{ $checklistg->clg_id ?? '' }}">

                            <div class="form-group mb-3">
                                <label for="clg_name">Name</label>
                                <input type="text" name="clg_name" id="editclg_name"
                                    value="{{ old('clg_name') }}" class="form-control"
                                    placeholder="Check list name" required>
                                @error('clg_name')
                                <small
                                    class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="clg_description">Description</label>
                                <textarea name="clg_description" id="editclg_description" class="form-control" rows="4" placeholder="Enter Description...">{{ old('clg_description') }}</textarea>
                                @error('clg_description')
                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        @php
                        $selectedBoxes = json_decode($checklistg->rowboxes ?? '[]', true);
                        @endphp

                        @php
                        $firstColumnCount = ceil(count($checkboxes) * 0.47);
                        $checkboxes1 = array_slice($checkboxes, 0, $firstColumnCount);
                        $checkboxes2 = array_slice($checkboxes, $firstColumnCount);
                        @endphp

                        <div class="row">
                            <!-- First Column (40%) -->
                            <div class="col-md-6">
                                <label>Groups (40%)</label>
                                <div class="form-group mb-2">
                                    @foreach ($checkboxes1 as $checkbox)
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="rowboxes[]" value="{{ $checkbox }}"
                                            {{ in_array($checkbox, $selectedBoxes ?? []) ? 'checked' : '' }}>
                                        {{ $checkbox }}
                                    </label><br>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Second Column (60%) -->
                            <div class="col-md-6">
                                <label>Groups (60%)</label>
                                <div class="form-group mb-2">
                                    @foreach ($checkboxes2 as $checkbox)
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="rowboxes[]" value="{{ $checkbox }}"
                                            {{ in_array($checkbox, $selectedBoxes ?? []) ? 'checked' : '' }}>
                                        {{ $checkbox }}
                                    </label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group form-switch mb-2">
                                <input type="hidden" name="clg_active" value="0">
                                <input type="checkbox" role="switch" name="clg_active" id="editclg_active"
                                    value="1" class="form-check-input"
                                    {{ old('clg_active') ? 'checked' : '' }}>
                                <label for="editclg_active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark ">Update Check List Group</button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection
@section('script')
<script>
    function editCLGroup(clItem) {
        console.log(clItem);

        // Populate form fields
        document.getElementById("clg_id").value = clItem.clg_id;
        document.getElementById("editclg_name").value = clItem.clg_name;
        document.getElementById("editclg_description").value = clItem.clg_description;
        document.getElementById("editclg_active").checked = clItem.clg_active == 1;

        // Parse rowboxes safely (ensure it's an array)
        let selectedBoxes = [];
        if (clItem.rowboxes) {
            try {
                selectedBoxes = JSON.parse(clItem.rowboxes);
            } catch (error) {
                console.error("Error parsing rowboxes:", error);
            }
        }

        // Select all checkboxes and update based on stored values
        let checkboxes = document.querySelectorAll("input[name='rowboxes[]']");
        checkboxes.forEach((checkbox) => {
            checkbox.checked = selectedBoxes.includes(checkbox.value);
        });

        // Show modal
        var editModal = new bootstrap.Modal(document.getElementById("editCLG"));
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
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Processing...';
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

<script>
    function expandText(td) {
        // Toggle the width between 200px and auto
        if (td.style.maxWidth === '200px') {
            td.style.maxWidth = 'none';
            td.style.whiteSpace = 'normal'; // Allow text to wrap
        } else {
            td.style.maxWidth = '200px';
            td.style.whiteSpace = 'nowrap'; // Prevent text from wrapping
        }
    }
</script>
@endsection
