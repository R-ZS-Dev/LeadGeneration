@extends('sitemaster.master-layout')
@section('title', 'Data Device Log')
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
                                    <h4 class="mb-0"><b>Add Data Device Log</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('add-data-device-log') }}" class="mt-4">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="">Configuration Name</label>
                                            <Select class="form-select" name="config_name">
                                                <option value="">Select Configuration Name</option>
                                            </Select>
                                        </div>
                                        <button type="submit" class="btn btn-dark w-100">Add Data Device Log</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                <i class="fas fa-plus"></i> Add Data Device Log
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                {{-- @foreach ($log as $index => $cpl)
                                    <tr id="row-{{ $cpl->cpl_id }}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cpl->cpl_time)->format('h:i A') }}</td>
                                        <td>{{ $cpl->cpl_cpgtype }}</td>
                                        <td>{{ $cpl->cpl_dose }}</td>
                                        <td>{{ $cpl->cpl_temp }}</td>
                                        <td>{{ $cpl->transfusion_time }}</td>
                                        <td>{{ $cpl->ischemic_time }}</td>
                                        <td>{{ $cpl->cpl_mixture }}</td>
                                        <td>{{ $cpl->svgperfcount }}</td>
                                        <td align="center">
                                            <a onclick="editCPL({{ json_encode($cpl) }})" href="javascript:void(0);">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach --}}
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
                        <h4 class="mb-0"><b>Edit Coronary Perfusion Log</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-coronary-perfusion-log') }}" class="mt-4">
                        @csrf
                      <div class="row"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    </div>
@endsection
@section('script')
    <script>
        function editData(cpl) {
            document.getElementById("cpl_id").value = cpl.cpl_id;
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
