@extends('sitemaster.master-layout')
@section('title','All Supply Groups')
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
                                            <h4 class="mb-0"><b>Add Supply Group</b></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('add-supply-group') }}" class="mt-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Supply Group Name</label>
                                                    <input type="text" name="spg_name" id="eqgname"
                                                        value="{{ old('spg_name') }}" class="form-control"
                                                        placeholder="Supply Group Name" required>

                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="spg_active" value="0">
                                                    <input type="checkbox" role="switch" name="spg_active" id="active" checked
                                                        value="1" class="form-check-input"
                                                        {{ old('active') ? 'checked' : '' }}
                                                        >
                                                    <label for="active" class="form-check-label">Active</label>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                                    Supply Group</button>
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

                                        <button type="button"
                                            class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                            data-bs-toggle="modal" data-bs-target="#signup-modal">
                                            <i class="fas fa-plus"></i> Add Supply Group
                                        </button>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($spg as $index => $item)
                                                <tr id="row-{{ $item->spg_id }}">
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $item->spg_name }}</td>
                                                    <td>
                                                        @if ($item->spg_active == '1')
                                                        <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a onclick="editEqg({{ json_encode($item) }})"
                                                            href="javascript:void(0);">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ route('delete-supply-group', $item->spg_id) }}','{{ $item->spg_id }}')"
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
                {{-- /* --------------------------- edit hospital modal -------------------------- */ --}}
                <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-body ">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Edit Supply Group</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form method="POST" action="{{ route('edit-supply-group') }}" class="mt-4">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="spg_id" id="spg_id">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Supply Group Name</label>
                                                <input type="text" name="spg_name" id="edit-spgname"
                                                    value="{{ old('eqg_name') }}" class="form-control"
                                                    placeholder="Supply Group nName" required>

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="spg_active" value="0">
                                                <input type="checkbox" role="switch" name="spg_active" id="edit-spgactive"
                                                    value="1" class="form-check-input"
                                                    {{ old('active') ? 'checked' : '' }}
                                                    >
                                                <label for="active" class="form-check-label">Active</label>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn w-100 btn-dark">Update
                                                Supply Group</button>
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
        function editEqg(spg) {
            document.getElementById("spg_id").value = spg.spg_id;
            document.getElementById("edit-spgname").value = spg.spg_name;
            document.getElementById("edit-spgactive").checked = spg.spg_active == 1;
            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
            editModal.show();
        }
    </script>
       <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener("submit", function (event) {
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
            document.addEventListener("input", function (event) {
                const input = event.target;
                if (input.value.trim() !== "") {
                    input.classList.remove("is-invalid");
                }
            });
        });
    </script>
@endsection
