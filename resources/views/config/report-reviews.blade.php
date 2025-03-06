@extends('sitemaster.master-layout')
@section('title', 'All Report Reviews')
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

            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Report Review</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-report-review') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Select Report Type</label>
                                            <select name="report_type" id="" class="form-control">
                                                <option value="">Select Report Type</option>
                                                @foreach ($type as $item)
                                                    <option value="{{ $item->rep_id }}">{{ $item->report_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="rr_name" id="" value="{{ old('rr_name') }}"
                                                class="form-control" placeholder="Report Review Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <textarea name="rr_desc" id="" rows="3" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="rr_active" value="0">
                                            <input type="checkbox" role="switch" name="rr_active" id="active" checked
                                                value="1" class="form-check-input"
                                                {{ old('rr_active') ? 'checked' : '' }}>
                                            <label for="active" class="form-check-label">Active</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                            Report Review</button>
                                    </div>
                                </div>
                        </form>
                    </div>
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
                                <i class="fas fa-plus"></i> Add Report Reviews
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($report as $index => $item)
                                    <tr id="row-{{ $item->rr_id }}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->report->report_name }}</td>

                                        <td>{{ $item->rr_name }}</td>
                                        <td>{{ $item->rr_desc }}</td>

                                        <td>
                                            @if ($item->rr_active == '1')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="editReport({{ json_encode($item) }})" href="javascript:void(0);">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('delete-report-review', $item->rr_id) }}', '{{ $item->rr_id }}')"
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
                        <h4 class="mb-0"><b>Edit Equipment Group</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-report-review') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="rr_id" id="rr_id">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Select Report Type</label>
                                    <select name="report_type" id="edit_type" class="form-control">
                                        <option value="">Select Report Type</option>
                                        @foreach ($type as $item)
                                            <option value="{{ $item->rep_id }}">{{ $item->report_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="rr_name" id="edit_name" value="{{ old('rr_name') }}"
                                        class="form-control" placeholder="Report Review Name">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Description</label>
                                    <textarea name="rr_desc" id="edit_desc" rows="3" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="rr_active" value="0">
                                    <input type="checkbox" role="switch" name="rr_active" id="edit-active" checked
                                        value="1" class="form-check-input"
                                        {{ old('rr_active') ? 'checked' : '' }}>
                                    <label for="edit-active" class="form-check-label">Active</label>

                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Update
                                    Report Review</button>
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
        function editReport(rr) {
            document.getElementById("rr_id").value = rr.rr_id;
            document.getElementById("edit_name").value = rr.rr_name;
            document.getElementById("edit_type").value = rr.report_type;
            document.getElementById("edit_desc").value = rr.rr_desc;
            document.getElementById("edit-active").checked = rr.rr_active == 1;
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

            const inputs = form.querySelectorAll("input:not([type='hidden']), select");
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

        document.addEventListener("change", function(event) {
            const select = event.target;
            if (select.tagName === "SELECT" && select.value.trim() !== "") {
                select.classList.remove("is-invalid");
            }
        });
    });
</script>
@endsection
