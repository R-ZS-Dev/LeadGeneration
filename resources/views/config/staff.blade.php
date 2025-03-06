@extends('sitemaster.master-layout')
@section('title','All Staff Members')
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

                            <form method="POST" action="{{ route('add-staff') }}" class="mt-4">
                                @csrf
                                <div class="row">

                                    <!-- Staff Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="st_name" class="form-control"
                                                placeholder="Name" required>
                                        </div>
                                    </div>

                                    <!-- First Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="st_first_name" class="form-control"
                                                placeholder="First Name" required>
                                        </div>
                                    </div>

                                    <!-- Middle Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Middle Name (optional)</label>
                                            <input type="text" name="st_middle_name" class="form-control"
                                                placeholder="Middle Name (Optional)">
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="st_last_name" class="form-control"
                                                placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="st_phone" class="form-control"
                                                placeholder="Phone Number" required>
                                        </div>
                                    </div>

                                    <!-- Specialties (Checkboxes) -->
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">

                                            <input type="hidden" name="anesthesiologist" value="0">
                                            <input type="checkbox" role="switch" name="anesthesiologist"
                                                id="anesthesiologist" value="1" class="form-check-input">
                                            <label for="anesthesiologist" class="form-check-label">Anesthesiologist</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="cardiologist" value="0">
                                            <input type="checkbox" role="switch" name="cardiologist" id="cardiologist"
                                                value="1" class="form-check-input">
                                            <label for="cardiologist" class="form-check-label">Cardiologist</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">

                                            <input type="hidden" name="crna" value="0">
                                            <input type="checkbox" name="crna" id="crna" value="1"
                                                class="form-check-input" role="switch">
                                            <label for="crna" class="form-check-label">CRNA</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">

                                            <input type="hidden" name="family_md" value="0">
                                            <input type="checkbox" name="family_md" id="family_md" value="1"
                                                class="form-check-input" role="switch">
                                            <label for="family_md" class="form-check-label">Family MD</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="perfusionist" value="0">
                                            <input type="checkbox" role="switch" name="perfusionist" id="perfusionist"
                                                value="1" class="form-check-input">
                                            <label for="perfusionist" class="form-check-label">Perfusionist</label>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">

                                            <input type="hidden" name="physician_assistant" value="0">
                                            <input type="checkbox" role="switch" name="physician_assistant"
                                                id="physician_assistant" value="1" class="form-check-input">
                                            <label for="physician_assistant" class="form-check-label">Physician
                                                Assistant</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="surgeon" value="0">
                                            <input type="checkbox" role="switch" name="surgeon" id="surgeon"
                                                value="1" class="form-check-input">
                                            <label for="surgeon" class="form-check-label">Surgeon</label>
                                        </div>
                                    </div>

                                    <!-- Staff Active (Checkbox) -->
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="st_active" value="0">
                                            <input type="checkbox" name="st_active" id="st_active" value="1" checked
                                                class="form-check-input" role="switch" >
                                            <label for="st_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                            Staff</button>
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
                                        <th>Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $index => $item)
                                        <tr id="row-{{ $item->st_id }}">
                                            <td>{{ $item->st_id }}</td>
                                            <td>{{ $item->st_name }}</td>
                                            <td>{{ $item->st_first_name }}</td>
                                            <td>{{ $item->st_middle_name ?? '-' }}</td>
                                            <td>{{ $item->st_last_name }}</td>
                                            <td>{{ $item->st_phone }}</td>
                                            <td>
                                                @if ($item->st_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="editStaff({{ json_encode($item) }})"
                                                    href="javascript:void(0);" class="text-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-staff', $item->st_id) }}' ,'{{ $item->st_id }}')"
                                                    class="text-danger">
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
        {{-- /* --------------------------- edit hospital modal -------------------------- */ --}}
        <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Edit Staff</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('edit-staff') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="st_id" id="st_id">
                            <div class="row">
                                <!-- Staff Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="st_name" class="form-control"
                                            placeholder="Full Name" required id="st_name">
                                    </div>
                                </div>

                                <!-- First Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="st_first_name" class="form-control"
                                            placeholder="First Name" required id="st_fn">
                                    </div>
                                </div>

                                <!-- Middle Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Middle Name (optional)</label>
                                        <input type="text" name="st_middle_name" class="form-control"
                                            placeholder="Middle Name (Optional)" id="st_mn">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="st_last_name" class="form-control"
                                            placeholder="Last Name" required id="st_ln">
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="st_phone" class="form-control"
                                            placeholder="Phone Number" id="phone" required>
                                    </div>
                                </div>

                                <!-- Specialties (Checkboxes) -->
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="anesthesiologist" value="0">
                                        <input type="checkbox" role="switch" name="anesthesiologist"
                                            id="anesthesiologist1" value="1" class="form-check-input">
                                        <label for="anesthesiologist1" class="form-check-label">Anesthesiologist</label>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="cardiologist" value="0">
                                        <input type="checkbox" role="switch" name="cardiologist" id="cardiologist1"
                                            value="1" class="form-check-input">
                                        <label for="cardiologist1" class="form-check-label">Cardiologist</label>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="crna" value="0">
                                        <input type="checkbox" role="switch" name="crna" id="crna1"
                                            value="1" class="form-check-input">
                                        <label for="crna1" class="form-check-label">CRNA</label>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">

                                        <input type="hidden" name="family_md" value="0">
                                        <input type="checkbox" role="switch" name="family_md" id="family_md1"
                                            value="1" class="form-check-input">
                                        <label for="family_md1" class="form-check-label">Family MD</label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="perfusionist" value="0">
                                        <input type="checkbox" role="switch" name="perfusionist" id="perfusionist1"
                                            value="1" class="form-check-input">
                                        <label for="perfusionist1" class="form-check-label">Perfusionist</label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">

                                        <input type="hidden" name="physician_assistant" value="0">
                                        <input type="checkbox" role="switch" name="physician_assistant"
                                            id="physician_assistant1" value="1" class="form-check-input">
                                        <label for="physician_assistant1" class="form-check-label">Physician
                                            Assistant</label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="surgeon" value="0">
                                        <input type="checkbox" name="surgeon" id="surgeon1" value="1"
                                            class="form-check-input">
                                        <label for="surgeon1" class="form-check-label">Surgeon</label>
                                    </div>
                                </div>

                                <!-- Staff Active (Checkbox) -->
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="st_active" value="0">
                                        <input type="checkbox" role="switch" name="st_active" id="st_active1"
                                            value="1" class="form-check-input">
                                        <label for="st_active1" class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Update Staff</button>
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
   
    <script>
        function editStaff(staff) {
            console.log(staff);
            document.getElementById("st_id").value = staff.st_id;
            document.getElementById("st_name").value = staff.st_name;
            document.getElementById("st_fn").value = staff.st_first_name;
            document.getElementById("st_mn").value = staff.st_middle_name ?? "";
            document.getElementById("st_ln").value = staff.st_last_name;
            document.getElementById("phone").value = staff.st_phone;

            // Checkboxes for specialties
            document.getElementById("anesthesiologist1").checked = staff.anesthesiologist == 1;
            document.getElementById("cardiologist1").checked = staff.cardiologist == 1;
            document.getElementById("crna1").checked = staff.crna == 1;
            document.getElementById("family_md1").checked = staff.family_md == 1;
            document.getElementById("perfusionist1").checked = staff.perfusionist == 1;
            document.getElementById("physician_assistant1").checked = staff.physician_assistant == 1;
            document.getElementById("surgeon1").checked = staff.surgeon == 1;
            // Active checkbox
            document.getElementById("st_active1").checked = staff.st_active == 1;
            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
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
