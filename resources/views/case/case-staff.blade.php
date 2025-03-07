@extends('sitemaster.master-layout')
@section('title','Case staff')
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

                        <form method="POST" action="" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Select Surgeon</label>
                                        <select name="surgeon" class="form-select">
                                            <option value="">Select Surgeon</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select 2nd Surgeon</label>
                                        <select name="second_surgeon" class="form-select">
                                            <option value="">Select 2nd Surgeon</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select PA/1st Assistant</label>
                                        <select name="pa_first_assistant" class="form-select">
                                            <option value="">Select PA/1st Assistant</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Anesthesiologist</label>
                                        <select name="anesthesiologist" class="form-select">
                                            <option value="">Select Anesthesiologist</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select CRNA/RES</label>
                                        <select name="crna_res" class="form-select">
                                            <option value="">Select CRNA/RES</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Cardiologist</label>
                                        <select name="cardiologist" class="form-select">
                                            <option value="">Select Cardiologist</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Family MD</label>
                                        <select name="family_md" class="form-select">
                                            <option value="">Select Family MD</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Perfusionist</label>
                                        <select name="perfusionist" class="form-select">
                                            <option value="">Select Perfusionist</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Perfusionist Category</label>
                                        <select name="perfusionist_category" class="form-select">
                                            <option value="">Select Perfusionist Category</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select Perfusionist Status</label>
                                        <select name="perfusionist_status" class="form-select">
                                            <option value="">Select Perfusionist Status</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select 2nd Perfusionist</label>
                                        <select name="second_perfusionist" class="form-select">
                                            <option value="">Select 2nd Perfusionist</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Select 2nd Perfusionist Category</label>
                                        <select name="second_perfusionist_category" class="form-select">
                                            <option value="">Select 2nd Perfusionist Category</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                        Supply</button>
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
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a onclick="editButtonCstaff()"
                                            href="javascript:void(0);">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>


                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete()"

                                            class="edit-icon delete-user-btn text-danger">
                                            <i class="fa-solid fa-trash-can-arrow-up"></i>
                                        </a>
                                    </td>
                                </tr>
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

                    <form method="POST" action="" class="mt-4">
                        @csrf
                        <input type="hidden" name="sp_id" id="sp_id">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Select Surgeon</label>
                                    <select name="surgeon" id="edit_surgeon" class="form-select">
                                        <option value="">Select Surgeon</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select 2nd Surgeon</label>
                                    <select name="second_surgeon" class="form-select">
                                        <option value="">Select 2nd Surgeon</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select PA/1st Assistant</label>
                                    <select name="pa_first_assistant" class="form-select">
                                        <option value="">Select PA/1st Assistant</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Anesthesiologist</label>
                                    <select name="anesthesiologist" class="form-select">
                                        <option value="">Select Anesthesiologist</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select CRNA/RES</label>
                                    <select name="crna_res" class="form-select">
                                        <option value="">Select CRNA/RES</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Cardiologist</label>
                                    <select name="cardiologist" class="form-select">
                                        <option value="">Select Cardiologist</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Family MD</label>
                                    <select name="family_md" class="form-select">
                                        <option value="">Select Family MD</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Perfusionist</label>
                                    <select name="perfusionist" class="form-select">
                                        <option value="">Select Perfusionist</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Perfusionist Category</label>
                                    <select name="perfusionist_category" class="form-select">
                                        <option value="">Select Perfusionist Category</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select Perfusionist Status</label>
                                    <select name="perfusionist_status" class="form-select">
                                        <option value="">Select Perfusionist Status</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select 2nd Perfusionist</label>
                                    <select name="second_perfusionist" class="form-select">
                                        <option value="">Select 2nd Perfusionist</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Select 2nd Perfusionist Category</label>
                                    <select name="second_perfusionist_category" class="form-select">
                                        <option value="">Select 2nd Perfusionist Category</option>
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
        document.getElementById("edit_type").value = sp.sp_type;

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