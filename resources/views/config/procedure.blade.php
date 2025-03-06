@extends('sitemaster.master-layout')
@section('title','All Procedures')
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
                                    <h4 class="mb-0"><b>Add Procedure</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-procedure') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <!-- Staff Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Procedure Name</label>
                                            <input type="text" name="pro_name" class="form-control"
                                                placeholder="Procedure Name" required>
                                        </div>
                                    </div>
                                    <!-- First Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">CPT Code</label>
                                            <input type="text" name="pro_cptcode" class="form-control"
                                                placeholder="CPT Code" maxlength="5"
                                                oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                        </div>
                                    </div>
                                    <!-- Middle Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Display</label>
                                            <textarea name="pro_display" rows="3" class="form-control" placeholder="Display"></textarea>
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <textarea name="pro_desc" rows="3" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="pro_active" value="0">
                                            <input type="checkbox" name="pro_active" id="pro_active" value="1"
                                                class="form-check-input" role="switch" checked>
                                            <label for="pro_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                            Procedure</button>
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
                                    <i class="fas fa-plus"></i> Add Procedures
                                </button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>CPT Code</th>
                                        <th>Display</th>
                                        <th>Description</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pro as $index => $item)
                                        <tr id="row-{{ $item->pro_id }}">
                                            <td>{{ $item->pro_id }}</td>
                                            <td>{{ $item->pro_name }}</td>
                                            <td>{{ $item->pro_cptcode }}</td>
                                            <td>{{ $item->pro_display ?? '-' }}</td>
                                            <td>{{ $item->pro_desc }}</td>
                                            <td>
                                                @if ($item->pro_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="editPro({{ json_encode($item) }})" href="javascript:void(0);"
                                                    class="text-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-procedure', $item->pro_id) }}' , '{{ $item->pro_id }}')"
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
                            <h4 class="mb-0"><b>Edit Procedure</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('edit-procedure') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="pro_id" id="pro_id">
                            <div class="row">
                                <!-- Staff Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Procedure Name</label>
                                        <input type="text" name="pro_name" class="form-control"
                                            placeholder="Procedure Name" required id="edit_proname">
                                    </div>
                                </div>
                                <!-- First Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">CPT Code</label>
                                        <input type="text" name="pro_cptcode" class="form-control"
                                            placeholder="CPT Code" id="edit_cptcode" maxlength="5"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>
                                <!-- Middle Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Display</label>
                                        <textarea name="pro_display" rows="3" class="form-control" placeholder="Display" id="edit_display"></textarea>
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Description</label>
                                        <textarea name="pro_desc" rows="3" class="form-control" placeholder="Description" id="edit_desc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="pro_active" value="0">
                                        <input type="checkbox" name="pro_active" id="pro_active1" value="1"
                                            class="form-check-input" role="switch">
                                        <label for="pro_active1" class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Update
                                        Procedure</button>
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
        function editPro(pro) {
            document.getElementById("pro_id").value = pro.pro_id;
            document.getElementById("edit_proname").value = pro.pro_name;
            document.getElementById("edit_cptcode").value = pro.pro_cptcode;
            document.getElementById("edit_display").value = pro.pro_display
            document.getElementById("edit_desc").value = pro.pro_desc;
            document.getElementById("pro_active1").checked = pro.pro_active == 1;
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
