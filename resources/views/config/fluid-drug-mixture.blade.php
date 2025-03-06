@extends('sitemaster.master-layout')
@section('title','Fluid Drug Mixture')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
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
            <div class="modal-dialog modal-lg  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Add Fluid Drug Mixture</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('add-fdmixture') }}" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="flm_name">Name</label>
                                        <input type="text" name="flm_name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="flm_cname">Common name</label>
                                        <input type="text" name="flm_cname" class="form-control" placeholder="Common name">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="flm_desc">Description</label>
                                        <textarea name="flm_desc" class="form-control" rows="3" placeholder="Enter Description..."></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="flm_billcode">Billing code</label>
                                        <input type="text" name="flm_billcode" class="form-control" maxlength="15" placeholder="Billing code">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="flm_dname">Default Note</label>
                                        <input type="text" name="flm_dname" class="form-control" placeholder="Default Note">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="">From</label>
                                        <select name="flm_ftype" class="form-select">
                                            <option value="">Select Mixture</option>
                                            @foreach ($fluidLocations as $location)
                                            <option value="{{ $location->fl_id }}">{{ $location->fl_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="">To</label>
                                        <select name="flm_ttype" class="form-select">
                                            <option value="">Select Mix</option>
                                            @foreach ($fluidLocations as $location)
                                            <option value="{{ $location->fl_id }}">{{ $location->fl_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="flm_display">Display</label>
                                        <input type="text" name="flm_display" class="form-control" placeholder="Display">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="flm_amount">Amount</label>
                                        <input type="text" name="flm_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="flm_quick" value="0">
                                        <input type="checkbox" name="flm_quick" id="flm_quick" value="1" checked class="form-check-input">
                                        <label for="flm_quick" class="form-check-label">Quick</label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="flm_prime" value="0">
                                        <input type="checkbox" name="flm_prime" id="flm_prime" value="1" checked class="form-check-input">
                                        <label for="flm_prime" class="form-check-label">Prime</label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="flm_cardioplegia" value="0">
                                        <input type="checkbox" name="flm_cardioplegia" id="flm_cardioplegia" value="1" checked class="form-check-input">
                                        <label for="flm_cardioplegia" class="form-check-label">Cardioplegia</label>
                                    </div>
                                </div>

                                @php $medications = [ "Additive Volume", "Adenosine", "Albumin 25% 100ml", "Albumin 25% 50ml",
                                "Albumin 5% 250ml", "Albumin 5% 500ml", "Aminocaproic Acid", "Amiodarone", "Calcium Chloride",
                                "Cefazolin", "Cefuroxime", "Cell Saver In", "Cell Saver RBC", "Dextrose-50%", "Estimated Blood Loss",
                                "FFP", "Furosemide", "Glutamate/Aspartate Reperfuse", "Heparin", "Insulin Regular", "Isoflurane",
                                "Lidocaine 2%", "Magnesium Sulfate", "Mannitol 20%", "Mannitol 25%", "Methylprednisolone", "Normosol",
                                "PHENYLephrine in 0. 9% NaCI PREMIX", "Phenylephrine", "Plasmalyte", "Plegisol", "Potassium Chloride",
                                "PRBC", "Sodium Bicarbonate", "Sodium Chloride 0.9%", "Ultrafiltration", "Urine Output", "Vancomycin" ];
                                @endphp
                                <div class="col-lg-12">
                                    <table class=" w-100">
                                        <thead class="">
                                            <tr>
                                                <th>Sort Order</th>
                                                <th>Amount (ml)</th>
                                                <th>Medication</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($medications as $index => $medication)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="number" name="sort_order[{{ $index }}]" class="form-control text-center" style="max-width: 80px;" value="">
                                                </td>
                                                <td class="text-center">
                                                    <input type="number" name="amount[{{ $index }}]" class="form-control text-center" style="max-width: 100px;" value="">
                                                </td>

                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="rowboxes[]" value="{{ $medication }}" id="{{ Str::slug($medication, '_') }}" class="form-check-input">
                                                        <label for="{{ Str::slug($medication, '_') }}" class="form-check-label">{{ $medication }}</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="flm_active" value="0">
                                        <input type="checkbox" name="flm_active" id="flm_active" value="1" checked class="form-check-input">
                                        <label for="flm_active" class="form-check-label">Active</label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add Fuild Drug Mixture</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="col-12 mt-2">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">

                            <button type="button" class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#signup-modal">
                                <i class="fas fa-plus"></i> Add Fuild Drug Mixture
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Common Name</th>
                                    <th>Description</th>
                                    <th>Bill Code</th>
                                    <th>Drug Name</th>
                                    <th>From Location</th>
                                    <th>To Location</th>
                                    <th>Display</th>
                                    <th>Amount</th>
                                    <th>Quick</th>
                                    <th>Prime</th>
                                    <th>Cardioplegia</th>
                                    <th>Row Boxes</th>
                                    <th>Active</th>
                                    <th>Inserted By</th>
                                    <th>Status</th>
                                    <th>Close</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($fluidDrugMixtures as $mixture)
                                <tr id="row-{{ $mixture->flm_id }}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $mixture->flm_name }}</td>
                                    <td>{{ $mixture->flm_cname }}</td>
                                    <td>{{ $mixture->flm_desc }}</td>
                                    <td>{{ $mixture->flm_billcode }}</td>
                                    <td>{{ $mixture->flm_dname }}</td>
                                    <td>{{ $mixture->fromLocation->fl_name ?? 'N/A' }}</td> <!-- From Location Name -->
                                    <td>{{ $mixture->toLocation->fl_type ?? 'N/A' }}</td> <!-- To Location Name -->
                                    <td>{{ $mixture->flm_display }}</td>
                                    <td>{{ $mixture->flm_amount }}</td>
                                    <td>{{ $mixture->flm_quick ? 'Yes' : 'No' }}</td>
                                    <td>{{ $mixture->flm_prime ? 'Yes' : 'No' }}</td>
                                    <td>{{ $mixture->flm_cardioplegia ? 'Yes' : 'No' }}</td>
                                    <td id="truncated-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; cursor: pointer;" onclick="expandText(this)">
                                        {{ implode(', ', json_decode($mixture->rowboxes, true)) }}
                                    </td>
                                    <td>{{ $mixture->flm_active ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $mixture->flm_insertby }}</td>
                                    <td>{{ $mixture->status }}</td>
                                    <td>{{ $mixture->close ? 'Closed' : 'Open' }}</td>
                                    <td>
                                        <a onclick="editFDMForm({{ json_encode($mixture, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }})"
                                            href="javascript:void(0);">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete('{{ route('delete-FDmixture', $mixture->flm_id) }}', '{{ $mixture->flm_id }}')"

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
    {{-- /* --------------------------- edit Fuild Drug Mixture modal -------------------------- */ --}}
    <div id="editFDMixture" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Edit Fuild Drug Mixture</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('update-FDmixture') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="flm_id" id="flm_id" value="{{ $fluidDrugMixture->flm_id ?? '' }}">

                        <div class="row">
                            <!-- Name -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_name">Name</label>
                                    <input type="text" name="flm_name" class="form-control" id="editflm_name" value="{{ old('flm_name') }}" required>
                                </div>
                            </div>

                            <!-- Common Name -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_cname">Common name</label>
                                    <input type="text" name="flm_cname" class="form-control" id="editflm_cname" value="{{ old('flm_cname') }}">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="flm_desc">Description</label>
                                    <textarea name="flm_desc" class="form-control" rows="3" id="editflm_desc">{{ old('flm_desc') }}</textarea>
                                </div>
                            </div>

                            <!-- Billing Code -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_billcode">Billing code</label>
                                    <input type="text" name="flm_billcode" class="form-control" id="editflm_billcode" value="{{ old('flm_billcode') }}">
                                </div>
                            </div>

                            <!-- Default Note -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_dname">Default Note</label>
                                    <input type="text" name="flm_dname" class="form-control" id="editflm_dname" value="{{ old('flm_dname') }}">
                                </div>
                            </div>

                            <!-- From Location -->
                            <!-- From Location -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_ftype">From</label>
                                    <select name="flm_ftype" class="form-select">
                                        <option value="">Select Mixture</option>
                                        @foreach ($fluidLocations as $location)
                                        <option value="{{ $location->fl_id }}"
                                            {{ isset($fluidDrugMixture) && $fluidDrugMixture->flm_ftype == $location->fl_id ? 'selected' : '' }}>
                                            {{ $location->fl_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- To Location -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_ttype">To</label>
                                    <select name="flm_ttype" class="form-select">
                                        <option value="">Select Mix</option>
                                        @foreach ($fluidLocations as $location)
                                        <option value="{{ $location->fl_id }}"
                                            {{ isset($fluidDrugMixture) && $fluidDrugMixture->flm_ttype == $location->fl_id ? 'selected' : '' }}>
                                            {{ $location->fl_type }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <!-- Display -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_display">Display</label>
                                    <input type="text" name="flm_display" class="form-control" id="editflm_display" value="{{ old('flm_display') }}">
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="flm_amount">Amount</label>
                                    <input type="text" name="flm_amount" class="form-control" id="editflm_amount" value="{{ old('flm_amount') }}">
                                </div>
                            </div>

                            <!-- Quick Checkbox -->
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="flm_quick" value="0">
                                    <input type="checkbox" role="switch" name="flm_quick" id="editflm_quick"
                                        value="1" class="form-check-input"
                                        {{ old('flm_quick') ? 'checked' : '' }}>
                                    <label for="editflm_quick" class="form-check-label">Quick</label>
                                </div>
                            </div>

                            <!-- Prime Checkbox -->
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="flm_prime" value="0">
                                    <input type="checkbox" role="switch" name="flm_prime" id="editflm_prime"
                                        value="1" class="form-check-input"
                                        {{ old('flm_prime') ? 'checked' : '' }}>
                                    <label for="editflm_prime" class="form-check-label">Prime</label>
                                </div>
                            </div>

                            <!-- Cardioplegia Checkbox -->
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="flm_cardioplegia" value="0">
                                    <input type="checkbox" role="switch" name="flm_cardioplegia" id="editflm_cardioplegia"
                                        value="1" class="form-check-input"
                                        {{ old('flm_cardioplegia') ? 'checked' : '' }}>
                                    <label for="editflm_cardioplegia" class="form-check-label">Cardioplegia</label>
                                </div>
                            </div>
                            -

                            <div class="col-lg-12">
                                <table class=" w-100">
                                    <thead class="">
                                        <tr>
                                            <th>Sort Order</th>
                                            <th>Amount (ml)</th>
                                            <th>Medication</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                        // Decode JSON data safely
                                        $selectedMedications = json_decode($checklistg->rowboxes ?? '[]', true);
                                        $sortOrderData = json_decode($checklistg->sort_order ?? '{}', true);
                                        $amountData = json_decode($checklistg->amount ?? '{}', true);

                                        // Ensure they are valid arrays
                                        if (!is_array($selectedMedications)) {
                                        $selectedMedications = [];
                                        }
                                        if (!is_array($sortOrderData)) {
                                        $sortOrderData = [];
                                        }
                                        if (!is_array($amountData)) {
                                        $amountData = [];
                                        }
                                        @endphp

                                        @foreach ($medications as $medication)
                                        <tr>
                                            <td class="text-center">
                                                <input type="number" name="sort_order[{{ $medication }}]" class="form-control text-center"
                                                    value="{{ old('sort_order.' . $medication, $sortOrderData[$medication] ?? '') }}">
                                            </td>
                                            <td class="text-center">
                                                <input type="number" name="amount[{{ $medication }}]" class="form-control text-center"
                                                    value="{{ old('amount.' . $medication, $amountData[$medication] ?? '') }}">
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="rowboxes[]" value="{{ $medication }}"
                                                        class="form-check-input"
                                                        {{ in_array($medication, (array) $selectedMedications) ? 'checked' : '' }}>
                                                    <label class="form-check-label">{{ $medication }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                            </div>

                            <!-- Active Checkbox -->
                            <div class="col-lg-12">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="flm_active" value="0">
                                    <input type="checkbox" role="switch" name="flm_active" id="editflm_active"
                                        value="1" class="form-check-input"
                                        {{ old('flm_active') ? 'checked' : '' }}>
                                    <label for="editflm_active" class="form-check-label">Active</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark">Update Fluid Drug Mixture</button>
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
    function editFDMForm(FDMdata) {
    console.log("Received FDMdata:", FDMdata);

    // Set values in the form
    document.getElementById("flm_id").value = FDMdata.flm_id || '';
    document.getElementById("editflm_name").value = FDMdata.flm_name || '';
    document.getElementById("editflm_cname").value = FDMdata.flm_cname || '';
    document.getElementById("editflm_desc").value = FDMdata.flm_desc || '';
    document.getElementById("editflm_billcode").value = FDMdata.flm_billcode || '';
    document.getElementById("editflm_dname").value = FDMdata.flm_dname || '';
    document.getElementById("editflm_display").value = FDMdata.flm_display || '';
    document.getElementById("editflm_amount").value = FDMdata.flm_amount || '';

    // Checkboxes
    document.getElementById("editflm_quick").checked = FDMdata.flm_quick == 1;
    document.getElementById("editflm_prime").checked = FDMdata.flm_prime == 1;
    document.getElementById("editflm_cardioplegia").checked = FDMdata.flm_cardioplegia == 1;
    document.getElementById("editflm_active").checked = FDMdata.flm_active == 1;

    // Parse rowboxes safely
    let selectedBoxes = [];
    try {
        selectedBoxes = Array.isArray(FDMdata.rowboxes) ? FDMdata.rowboxes : JSON.parse(FDMdata.rowboxes || '[]');
    } catch (error) {
        console.error("Error parsing rowboxes:", error);
    }

    // Select checkboxes
    document.querySelectorAll("input[name='rowboxes[]']").forEach((checkbox) => {
        checkbox.checked = selectedBoxes.includes(checkbox.value);
    });

    // Parse sort_order and amount safely
    let sortOrderData = {};
    let amountData = {};

    try {
        sortOrderData = typeof FDMdata.sort_order === 'string' ? JSON.parse(FDMdata.sort_order) : FDMdata.sort_order || {};
        amountData = typeof FDMdata.amount === 'string' ? JSON.parse(FDMdata.amount) : FDMdata.amount || {};
    } catch (error) {
        console.error("Error parsing sort_order or amount:", error);
        sortOrderData = {};
        amountData = {};
    }

    // Populate sort order and amount fields
    document.querySelectorAll("input[name^='sort_order']").forEach((input) => {
        let medication = input.name.match(/\[(.*?)\]/)[1]; // Extract key
        input.value = sortOrderData[medication] || '';
    });

    document.querySelectorAll("input[name^='amount']").forEach((input) => {
        let medication = input.name.match(/\[(.*?)\]/)[1];
        input.value = amountData[medication] || '';
    });

    // Show the modal
    var editModal = new bootstrap.Modal(document.getElementById("editFDMixture"));
    editModal.show();
}

</script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     document.addEventListener("submit", function(event) {
    //         const activeModal = document.querySelector(".modal.show");
    //         if (!activeModal) return;

    //         const form = activeModal.querySelector("form");
    //         if (!form) return;

    //         const inputs = form.querySelectorAll("input:not([type='hidden'])");
    //         const submitBtn = form.querySelector("button[type='submit']");

    //         let isValid = true;

    //         inputs.forEach(input => {
    //             if (input.type !== "checkbox" && input.value.trim() === "") {
    //                 input.classList.add("is-invalid");
    //                 isValid = false;
    //             } else {
    //                 input.classList.remove("is-invalid");
    //             }
    //         });

    //         if (!isValid) {
    //             event.preventDefault();
    //         } else {
    //             submitBtn.innerHTML =
    //                 '<span class="spinner-border spinner-border-sm"></span> Processing...';
    //             submitBtn.disabled = true;
    //         }
    //     });
    //     document.addEventListener("input", function(event) {
    //         const input = event.target;
    //         if (input.value.trim() !== "") {
    //             input.classList.remove("is-invalid");
    //         }
    //     });
    // });
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