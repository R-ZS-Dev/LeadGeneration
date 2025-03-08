@extends('sitemaster.master-layout')
@section('title','Check list items')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="row">
        {{-- @if (session('success'))
            <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif --}}

    <!-- Success Message -->
    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Add Check List Item</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('add-clitem') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="cl_name">Name</label>
                                    <input type="text" name="cl_name" id="cl_name" value="{{ old('cl_name') }}" class="form-control" placeholder="Check list item" required>
                                    @error('cl_name')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="cl_description">Description</label>
                                    <textarea name="cl_description" id="cl_description" class="form-control" rows="4" placeholder="Enter Description..." required>{{ old('cl_description') }}</textarea>
                                    @error('cl_description')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-2">
                                    <input type="hidden" name="cl_active" value="0">
                                    <input type="checkbox" role="switch" name="cl_active" id="cl_active" checked
                                        value="1" class="form-check-input"
                                        {{ old('cl_active') ? 'checked' : '' }}>
                                    <label for="cl_active" class="form-check-label">Active</label>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                    Add Check List Item
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
                            <i class="fas fa-plus"></i> Add Item
                        </button>

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Note</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($viewClitems as $index => $viewClitem)
                            <tr id="row-{{ $viewClitem->cl_ids }}">
                                <td>{{ ++$i }}</td>
                                <td>{{ $viewClitem->cl_name }}</td>
                                <td>{{ $viewClitem->cl_description }}</td>
                                <td>
                                    @if ($viewClitem->cl_active == '1')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="editCL({{ json_encode($viewClitem) }})"
                                        href="javascript:void(0);">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete('{{ route('delete-clitem', $viewClitem->cl_id) }}', '{{ $viewClitem->cl_ids }}')"
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

{{-- /* --------------------------- edit checklist item modal -------------------------- */ --}}
<div id="editCLModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body ">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h4 class="mb-0"><b>Edit Checklist Item</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('edit-clitem') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="cl_id" id="cl_id">
                            <div class="form-group mb-3">
                                <label for="cl_name">Name</label>
                                <input type="text" name="cl_name" id="editcl_name"
                                    value="{{ old('cl_name') }}" class="form-control"
                                    placeholder="Name" required>
                                @error('cl_name')
                                <small
                                    class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="cl_description">Description</label>
                                <textarea name="cl_description" id="editcl_description" class="form-control" rows="4" placeholder="Enter Description...">{{ old('cl_description') }}</textarea>
                                @error('cl_description')
                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group form-switch mb-2">
                                <input type="hidden" name="cl_active" value="0">
                                <input type="checkbox" role="switch" name="cl_active" id="editcl_active"
                                    value="1" class="form-check-input"
                                    {{ old('cl_active') ? 'checked' : '' }}>
                                <label for="editcl_active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark ">Update Check List Item</button>
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
    function editCL(clItem) {
        console.log(clItem);

        document.getElementById("cl_id").value = clItem.cl_id;
        document.getElementById("editcl_name").value = clItem.cl_name;
        document.getElementById("editcl_description").value = clItem.cl_description;
        document.getElementById("editcl_active").checked = clItem.cl_active == 1;
        // Show modal
        var editModal = new bootstrap.Modal(document.getElementById("editCLModal"));
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
@endsection
