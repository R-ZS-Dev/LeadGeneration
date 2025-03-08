@extends('sitemaster.master-layout')
@section('title','Case Equipment')
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
                                <h4 class="mb-0"><b>Add Equipment</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('add-caseequipment') }}" class="mt-4">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <strong>Add group of Equipment for Case</strong>
                                    <div class="form-group mb-3">
                                        <label for="">Group</label>
                                        <select name="e_group" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach($equipmentGroups as $group)
                                            <option value="{{ $group->eqg_id }}">{{ $group->eqg_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <strong>Add/Edit/Remove Equipment</strong>
                                    <select name="e_configure" class="form-select mb-3" id="equipmentSelect">
                                        <option value="">Select Equipment</option>
                                        @foreach($equipments as $equipment)
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
                                            {{ $equipment->eq_type }} - {{ $equipment->eq_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Type</label>
                                        <select name="e_type" class="form-select">
                                            <option value="">Select Type</option>
                                            @foreach($equipmentGroups as $group)
                                            <option value="{{ $equipment->eq_type }}">{{ $group->eq_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Manufacturer</label>
                                        <input type="text" name="e_manufacturer" class="form-control" id="e_manufacturer" placeholder="Manufacturer">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="e_name" class="form-control" id="e_name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Serial Number</label>
                                        <input type="text" name="serial_number" class="form-control" id="serial_number" placeholder="Serial Number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Last Service Date</label>
                                        <input type="date" name="last_service_date" class="form-control" id="last_service_date" placeholder="Last Service Date">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Next Service Date</label>
                                        <input type="date" name="next_service_date" class="form-control" id="next_service_date" placeholder="Next Service Date">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Billing Code</label>
                                        <input type="text" name="billing_code" class="form-control" id="billing_code" placeholder="Billing Code">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Note</label>
                                        <input type="text" name="note" class="form-control" id="note" placeholder="Note">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add Equipment</button>
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
                                <i class="fas fa-plus"></i> Add Equipment
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
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
                                @foreach($caseEquipments as $equipment)
                                <tr id="row-{{ $equipment->ce_id }}">
                                    <td>{{ $equipment->ce_id }}</td>
                                    <td>@php
                                        $groupName = $equipmentGroups->where('eqg_id', $equipment->e_group)->first();
                                        @endphp
                                        {{ $groupName ? $groupName->eqg_name : 'N/A' }}
                                    </td>
                                    <td>{{ $equipment->e_name }}</td>
                                    <td>@php
                                        $groupName = $equipmentGroups->where('eqg_id', $equipment->e_type)->first();
                                        @endphp
                                        {{ $groupName ? $groupName->eqg_name : 'N/A' }}
                                    </td>
                                    <td>{{ $equipment->e_manufacturer }}</td>
                                    <td>{{ $equipment->serial_number }}</td>
                                    <td>{{ $equipment->last_service_date }}</td>
                                    <td>{{ $equipment->next_service_date }}</td>
                                    <td>{{ $equipment->billing_code }}</td>
                                    <td>{{ $equipment->note }}</td>
                                    <td>
                                        <a onclick="editCEquipment({{ json_encode($equipment) }})" href="javascript:void(0);">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="edit-icon delete-user-btn text-danger"
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
    {{-- /* --------------------------- edit staff modal -------------------------- */ --}}
    <div id="editCaseEqu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Edit Staff</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-caseequipment') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="ce_id" id="ce_id">
                        <div class="row">

                            <div class="col-lg-12">
                                <strong>Add group of Equipment for Case</strong>
                                <div class="form-group mb-3">
                                    <label for="">Group</label>
                                    <select name="e_group" id="edite_group" class="form-select">
                                        <option value="">Select Group</option>
                                        @foreach($equipmentGroups as $group)
                                        <option value="{{ $group->eqg_id }}">{{ $group->eqg_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <strong>Add/Edit/Remove Equipment</strong>
                                <select name="e_configure" class="form-select mb-3" id="edite_configure">
                                    <option value="">Select Equipment</option>
                                    @foreach($equipments as $equipment)
                                    <option value="{{ $equipment->eq_id }}"
                                        data-name="{{ $equipment->eq_name }}"
                                        data-serial="{{ $equipment->eq_serial }}"
                                        data-lastservice="{{ $equipment->eq_lastservice }}"
                                        data-nextservice="{{ $equipment->eq_nextservice }}"
                                        data-billingcode="{{ $equipment->eq_billingcode }}"
                                        data-notes="{{ $equipment->eq_notes }}"
                                        data-manufacturer="{{ $equipment->eq_manufacturer }}"
                                        data-type="{{ $equipment->eq_type }}">
                                        {{ $equipment->eq_type }} - {{ $equipment->eq_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Type</label>
                                    <select name="e_type" id="edite_type" class="form-select">
                                        <option value="">Select Type</option>
                                        @foreach($equipments as $equipment)
                                        <option value="{{ $equipment->eq_type }}">{{ $equipment->eq_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Manufacturer</label>
                                    <input type="text" name="e_manufacturer" class="form-control" id="edite_manufacturer" placeholder="Manufacturer">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="e_name" class="form-control" id="edite_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Serial Number</label>
                                    <input type="text" name="serial_number" class="form-control" id="eserial_number" placeholder="Serial Number">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Last Service Date</label>
                                    <input type="date" name="last_service_date" class="form-control" id="elast_service_date" placeholder="Last Service Date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Next Service Date</label>
                                    <input type="date" name="next_service_date" class="form-control" id="enext_service_date" placeholder="Next Service Date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Billing Code</label>
                                    <input type="text" name="billing_code" class="form-control" id="ebilling_code" placeholder="Billing Code">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Note</label>
                                    <input type="text" name="note" class="form-control" id="enote" placeholder="Note">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark">Update Equipment</button>
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
    document.getElementById("equipmentSelect").addEventListener("change", function() {
        let selectedOption = this.options[this.selectedIndex];

        document.getElementById("e_name").value = selectedOption.getAttribute("data-name") || "";
        document.getElementById("serial_number").value = selectedOption.getAttribute("data-serial") || "";
        document.getElementById("last_service_date").value = selectedOption.getAttribute("data-lastservice") || "";
        document.getElementById("next_service_date").value = selectedOption.getAttribute("data-nextservice") || "";
        document.getElementById("billing_code").value = selectedOption.getAttribute("data-billingcode") || "";
        document.getElementById("note").value = selectedOption.getAttribute("data-notes") || "";

        // **Auto-fill Manufacturer**
        document.getElementById("e_manufacturer").value = selectedOption.getAttribute("data-manufacturer") || "";

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
        document.addEventListener("submit", function(event) {
            const activeModal = document.querySelector(".modal.show");
            if (!activeModal) return;

            const form = activeModal.querySelector("form");
            if (!form) return;

            // const inputs = form.querySelectorAll("input:not([type='hidden'])");
            const submitBtn = form.querySelector("button[type='submit']");

            let isValid = true;

            // inputs.forEach(input => {
            //     if (input.type !== "checkbox" && input.value.trim() === "") {
            //         input.classList.add("is-invalid");
            //         isValid = false;
            //     } else {
            //         input.classList.remove("is-invalid");
            //     }
            // });

            if (!isValid) {
                event.preventDefault();
            } else {
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm"></span> Processing...';
                submitBtn.disabled = true;
            }
        });
        // document.addEventListener("input", function(event) {
        //     const input = event.target;
        //     if (input.value.trim() !== "") {
        //         input.classList.remove("is-invalid");
        //     }
        // });
    });
</script>
@endsection