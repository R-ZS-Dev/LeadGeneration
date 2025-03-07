@extends('sitemaster.master-layout')
@section('title', 'All Live Line')
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
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Live Line</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-live-line') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="ll_gname">Group Name</label>
                                            <input type="text" name="ll_gname" id="ll_gname"
                                                value="{{ old('ll_gname') }}" class="form-control"
                                                placeholder="Enter Group Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="ll_label">Label</label>
                                            <input type="text" name="ll_label" id="ll_label"
                                                value="{{ old('ll_label') }}" class="form-control"
                                                placeholder="Enter Label">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="ll_displayorder">Display Order</label>
                                            <input type="number" name="ll_displayorder" id="ll_displayorder"
                                                value="{{ old('ll_displayorder') }}" class="form-control"
                                                placeholder="Enter Display Order">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="ll_removetime">Time to remove value if not changed</label>
                                            <input type="number" name="ll_removetime" id="ll_removetime"
                                                value="{{ old('ll_removetime') }}" class="form-control"
                                                placeholder="Enter minutes">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="ll_removetime">Time to show reminder after previous entry</label>
                                            <input type="number" name="ll_showremind" id="ll_showremind"
                                                value="{{ old('ll_showremind') }}" class="form-control"
                                                placeholder="Enter minutes">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group ">
                                            <input type="hidden" name="ll_manuallog" value="0">
                                            <input type="checkbox" name="ll_manuallog" id="ll_manuallog" value="1"
                                                class="form-check-input" {{ old('ll_manuallog') ? 'checked' : '' }}>
                                            <label for="ll_manuallog" class="form-check-label">Manual Log Only</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group">
                                            <input type="hidden" name="ll_pumpoff" value="0">
                                            <input type="checkbox" name="ll_pumpoff" id="ll_pumpoff" value="1"
                                                class="form-check-input" {{ old('ll_pumpoff') ? 'checked' : '' }}>
                                            <label for="ll_pumpoff" class="form-check-label">Clear at Pump Off</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group ">
                                            <input type="hidden" name="ll_linechart" value="0">
                                            <input type="checkbox" name="ll_linechart" id="ll_linechart" value="1"
                                                class="form-check-input" {{ old('ll_linechart') ? 'checked' : '' }}>
                                            <label for="ll_linechart" class="form-check-label">Show Line Chart</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group  mb-3">
                                            <input type="hidden" name="ll_skip" value="0">
                                            <input type="checkbox" name="ll_skip" id="ll_skip" value="1"
                                                class="form-check-input" {{ old('ll_skip') ? 'checked' : '' }}>
                                            <label for="ll_skip" class="form-check-label">Skip</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="ll_highlimit">High Limit</label>
                                            <input type="number" name="ll_highlimit" id="ll_highlimit"
                                                value="{{ old('ll_highlimit') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="ll_highcritical">High Critical</label>
                                            <input type="number" name="ll_highcritical" id="ll_highcritical"
                                                value="{{ old('ll_highcritical') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="ll_highwarn">High Warn</label>
                                            <input type="number" name="ll_highwarn" id="ll_highwarn"
                                                value="{{ old('ll_highwarn') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Good Range From</label>
                                                <div class="form-group mb-3">
                                                    <input type="number" name="ll_goodfrom" id=""
                                                        value="{{ old('ll_from') }}" class="form-control"
                                                        placeholder="Good Range From">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Good Range To</label>
                                                <div class="form-group mb-3">
                                                    <input type="number" name="ll_goodto" id=""
                                                        value="{{ old('ll_to') }}" class="form-control"
                                                        placeholder="Good Range To">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="ll_highlimit">low Limit</label>
                                            <input type="number" name="ll_lowlimit" id="ll_lowlimit"
                                                value="{{ old('ll_lowlimit') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="ll_lowcritical">low Critical</label>
                                            <input type="number" name="ll_lowcritical" id="ll_lowcritical"
                                                value="{{ old('ll_lowcritical') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="ll_lowwarn">low Warn</label>
                                            <input type="number" name="ll_lowwarn" id="ll_lowwarn"
                                                value="{{ old('ll_lowwarn') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="ll_active" value="0">
                                            <input type="checkbox" role="switch" name="ll_active" id="ll_active"
                                                checked value="1" class="form-check-input"
                                                {{ old('ll_active') ? 'checked' : '' }}>
                                            <label for="ll_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add Live
                                            Line</button>
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
                                    <i class="fas fa-plus"></i> Add Live Line
                                </button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Group Name</th>
                                        <th>Label</th>
                                        <th>Time To Remove Value</th>
                                        <th>Time To Show Reminder</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($live as $index => $ll)
                                        <tr id="row-{{ $ll->ll_id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $ll->ll_gname }}</td>
                                            <td>{{ $ll->ll_label }}</td>
                                            <td>{{ $ll->ll_removetime }}</td>
                                            <td>{{ $ll->ll_showremind }}</td>
                                            <td>
                                                @if ($ll->ll_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="editLive({{ json_encode($ll) }})" href="javascript:void(0);">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-live-line', $ll->ll_id) }}', '{{ $ll->ll_id }}')"
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
            {{-- /* --------------------------- edit hospital modal -------------------------- */ --}}
            <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content ">
                        <div class="modal-body ">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Edit Live Line</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('edit-live-line') }}" class="mt-4">
                                @csrf
                                <input type="hidden" name="ll_id" id="ll_id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_gname">Group Name</label>
                                            <input type="text" name="ll_gname" id="edit-ll_gname"
                                                value="{{ old('ll_gname') }}" class="form-control"
                                                placeholder="Enter Group Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_label">Label</label>
                                            <input type="text" name="ll_label" id="edit-ll_label"
                                                value="{{ old('ll_label') }}" class="form-control"
                                                placeholder="Enter Label">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_displayorder">Display Order</label>
                                            <input type="number" name="ll_displayorder" id="edit-ll_displayorder"
                                                value="{{ old('ll_displayorder') }}" class="form-control"
                                                placeholder="Enter Display Order">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_removetime">Time to remove value if not changed</label>
                                            <input type="number" name="ll_removetime" id="edit-ll_removetime"
                                                value="{{ old('ll_removetime') }}" class="form-control"
                                                placeholder="Enter minutes">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_showremind">Time to show reminder after previous
                                                entry</label>
                                            <input type="number" name="ll_showremind" id="edit-ll_showremind"
                                                value="{{ old('ll_showremind') }}" class="form-control"
                                                placeholder="Enter minutes">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group ">
                                            <input type="hidden" name="ll_manuallog" value="0">
                                            <input type="checkbox" name="ll_manuallog" id="edit-ll_manuallog"
                                                value="1" class="form-check-input"
                                                {{ old('ll_manuallog') ? 'checked' : '' }}>
                                            <label for="edit-ll_manuallog" class="form-check-label">Manual Log
                                                Only</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group">
                                            <input type="hidden" name="ll_pumpoff" value="0">
                                            <input type="checkbox" name="ll_pumpoff" id="edit-ll_pumpoff" value="1"
                                                class="form-check-input" {{ old('ll_pumpoff') ? 'checked' : '' }}>
                                            <label for="edit-ll_pumpoff" class="form-check-label">Clear at Pump
                                                Off</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3">
                                        <div class="form-group ">
                                            <input type="hidden" name="ll_linechart" value="0">
                                            <input type="checkbox" name="ll_linechart" id="edit-ll_linechart"
                                                value="1" class="form-check-input"
                                                {{ old('ll_linechart') ? 'checked' : '' }}>
                                            <label for="edit-ll_linechart" class="form-check-label">Show Line
                                                Chart</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group  mb-3">
                                            <input type="hidden" name="ll_skip" value="0">
                                            <input type="checkbox" name="ll_skip" id="edit-ll_skip" value="1"
                                                class="form-check-input" {{ old('ll_skip') ? 'checked' : '' }}>
                                            <label for="edit-ll_skip" class="form-check-label">Skip</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_highlimit">High Limit</label>
                                            <input type="number" name="ll_highlimit" id="edit-ll_highlimit"
                                                value="{{ old('ll_highlimit') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_highcritical">High Critical</label>
                                            <input type="number" name="ll_highcritical" id="edit-ll_highcritical"
                                                value="{{ old('ll_highcritical') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_highwarn">High Warn</label>
                                            <input type="number" name="ll_highwarn" id="edit-ll_highwarn"
                                                value="{{ old('ll_highwarn') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Good Range From</label>
                                                <div class="form-group mb-3">
                                                    <input type="number" name="ll_goodfrom" id="edit-ll_goodfrom"
                                                        value="{{ old('ll_from') }}" class="form-control"
                                                        placeholder="Good Range From">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Good Range To</label>
                                                <div class="form-group mb-3">
                                                    <input type="number" name="ll_goodto" id="edit-ll_goodto"
                                                        value="{{ old('ll_to') }}" class="form-control"
                                                        placeholder="Good Range To">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_lowlimit">low Limit</label>
                                            <input type="number" name="ll_lowlimit" id="edit-ll_lowlimit"
                                                value="{{ old('ll_lowlimit') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_lowcritical">low Critical</label>
                                            <input type="number" name="ll_lowcritical" id="edit-ll_lowcritical"
                                                value="{{ old('ll_lowcritical') }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="edit-ll_lowwarn">low Warn</label>
                                            <input type="number" name="ll_lowwarn" id="edit-ll_lowwarn"
                                                value="{{ old('ll_lowwarn') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="ll_active" value="0">
                                            <input type="checkbox" role="switch" name="ll_active" id="edit-ll_active"
                                                checked value="1" class="form-check-input"
                                                {{ old('ll_active') ? 'checked' : '' }}>
                                            <label for="edit-ll_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Update Live
                                            Line</button>
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
            function editLive(liveLine) {
                document.getElementById("ll_id").value = liveLine.ll_id;
                document.getElementById("edit-ll_gname").value = liveLine.ll_gname;
                document.getElementById("edit-ll_label").value = liveLine.ll_label;
                document.getElementById("edit-ll_displayorder").value = liveLine.ll_displayorder;
                document.getElementById("edit-ll_removetime").value = liveLine.ll_removetime;
                document.getElementById("edit-ll_showremind").value = liveLine.ll_showremind;

                document.getElementById("edit-ll_manuallog").checked = liveLine.ll_manuallog == 1;
                document.getElementById("edit-ll_pumpoff").checked = liveLine.ll_pumpoff == 1;
                document.getElementById("edit-ll_linechart").checked = liveLine.ll_linechart == 1;
                document.getElementById("edit-ll_skip").checked = liveLine.ll_skip == 1;

                document.getElementById("edit-ll_highlimit").value = liveLine.ll_highlimit;
                document.getElementById("edit-ll_highcritical").value = liveLine.ll_highcritical;
                document.getElementById("edit-ll_highwarn").value = liveLine.ll_highwarn;

                document.getElementById("edit-ll_goodfrom").value = liveLine.ll_goodfrom;
                document.getElementById("edit-ll_goodto").value = liveLine.ll_goodto;

                document.getElementById("edit-ll_lowlimit").value = liveLine.ll_lowlimit;
                document.getElementById("edit-ll_lowcritical").value = liveLine.ll_lowcritical;
                document.getElementById("edit-ll_lowwarn").value = liveLine.ll_lowwarn;

                document.getElementById("edit-ll_active").checked = liveLine.ll_active == 1;

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
