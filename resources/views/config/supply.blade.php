@extends('sitemaster.master-layout')
@section('title', 'All Supplies')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">


            <!-- Success Message -->
            <div id="successMessage" class="alert alert-success" style="display: none;"></div>

            <!-- Signup modal content -->
            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Supply</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-supplies') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Select Supply Group</label>
                                            <select name="sp_type" id="" class="form-select" required>
                                                <option value="">Select Supply Group</option>
                                                {{-- @foreach ($spg as $item)
                                                    <option value="{{ $item->spg_id }}">{{ $item->spg_name }}</option>
                                                @endforeach --}}
                                                <option value="Ballon">Ballon</option>
                                                <option value="Ballon Kit">Ballon Kit</option>
                                                <option value="Cell Saver Bowl">Cell Saver Bowl</option>
                                                <option value="Oxygenator">Oxygenator</option>
                                                <option value="Arterial Filter">Arterial Filter</option>
                                                <option value="Inline Sat. Sensor">Inline Sat. Sensor</option>
                                                <option value="Pump Pack">Pump Pack</option>
                                                <option value="Cardioplegia Devlivery">Cardioplegia Devlivery</option>
                                                <option value="Cardiotomay">Cardiotomy</option>
                                                <option value="Hemoconcentrator">Hemoconcentrator</option>
                                                <option value="Inline PO2 Sensor">Inline PO2 Senso</option>
                                                <option value="Arterial Cannula">Arterial Cannula</option>
                                                <option value="Left Vent Catheter">Left Vent Catheter</option>
                                                <option value="Sump/Vent">Sump/Vent</option>
                                                <option value="Multiple Perf Set">Multiple Perf Set</option>
                                                <option value="Venous Cannula">Venous Cannula</option>
                                                <option value="Aortic Vent">Aortic Vent</option>
                                                <option value="Suction Tubing">Suction Tubing</option>
                                                <option value="Femoral Venous">Femoral Venous</option>
                                                <option value="Cell Saver Cardiotomy">Cell Saver Cardiotomy</option>
                                                <option value="Biomedicus">Biomedicus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Manufacturer</label>
                                            <input type="text" name="sp_manufacturer" class="form-control" id=""
                                                placeholder="Manufacturer">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="sp_name" class="form-control" id=""
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Lot Number</label>
                                            <input type="text" name="sp_lotno" class="form-control" id=""
                                                placeholder="Lot Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Expiration Date</label>
                                            <input type="date" name="sp_expdate" class="form-control"
                                                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Billing Code</label>
                                            <input type="text" name="sp_billingcode" class="form-control" id=""
                                                placeholder="Billing Code">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Add Notes</label>
                                            <textarea name="sp_notes" id="" rows="3" placeholder="Add notes" class="form-control">
                                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="" class="mb-2">Select Group</label>
                                        @foreach ($spg as $item)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="spg_ids[]"
                                                    value="{{ $item->spg_id }}" id="spg_{{ $item->spg_id }}">
                                                <label class="form-check-label"
                                                    for="spg_{{ $item->spg_id }}">{{ $item->spg_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mt-2 mb-3">
                                            <input type="hidden" name="eq_active" value="0">
                                            <input type="checkbox" role="switch" name="eq_active" id="active"
                                                checked value="1" class="form-check-input"
                                                {{ old('active') ? 'checked' : '' }}>
                                            <label for="active" class="form-check-label">Active</label>
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

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">

                                <button type="button" class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#signup-modal">
                                    <i class="fas fa-plus"></i> Add Supply
                                </button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Manufacturer</th>
                                        <th>Name</th>
                                        <th>Lot Number</th>
                                        <th>Expiration date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($sp as $index => $item)
                                        <tr id="row-{{ $item->sp_id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->sp_type }}</td>
                                            <td>{{ $item->sp_manufacturer }}</td>
                                            <td>{{ $item->sp_name }}</td>
                                            <td>{{ $item->sp_lotno }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->sp_expdate)->format('d-m-Y') }}</td>

                                            <td>
                                                @if ($item->sp_active == '1')
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
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-supplies', $item->sp_id) }}','{{ $item->sp_id }}')"
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

                        <form method="POST" action="{{ route('update-supplies') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="sp_id" id="sp_id">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Select Supply Group</label>
                                        <select name="sp_type" id="edit_type" class="form-select">
                                            <option value="">Select Supply Group</option>
                                            <option value="Ballon">Ballon</option>
                                            <option value="Ballon Kit">Ballon Kit</option>
                                            <option value="Cell Saver Bowl">Cell Saver Bowl</option>
                                            <option value="Oxygenator">Oxygenator</option>
                                            <option value="Arterial Filter">Arterial Filter</option>
                                            <option value="Inline Sat. Sensor">Inline Sat. Sensor</option>
                                            <option value="Pump Pack">Pump Pack</option>
                                            <option value="Cardioplegia Devlivery">Cardioplegia Devlivery</option>
                                            <option value="Cardiotomay">Cardiotomy</option>
                                            <option value="Hemoconcentrator">Hemoconcentrator</option>
                                            <option value="Inline PO2 Sensor">Inline PO2 Senso</option>
                                            <option value="Arterial Cannula">Arterial Cannula</option>
                                            <option value="Left Vent Catheter">Left Vent Catheter</option>
                                            <option value="Sump/Vent">Sump/Vent</option>
                                            <option value="Multiple Perf Set">Multiple Perf Set</option>
                                            <option value="Venous Cannula">Venous Cannula</option>
                                            <option value="Aortic Vent">Aortic Vent</option>
                                            <option value="Suction Tubing">Suction Tubing</option>
                                            <option value="Femoral Venous">Femoral Venous</option>
                                            <option value="Cell Saver Cardiotomy">Cell Saver Cardiotomy</option>
                                            <option value="Biomedicus">Biomedicus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Manufacturer</label>
                                        <input type="text" name="sp_manufacturer" class="form-control"
                                            id="edit_manufacturer" placeholder="Manufacturer">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="sp_name" class="form-control" id="edit_name"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Lot Number</label>
                                        <input type="text" name="sp_lotno" class="form-control" id="edit_lotno"
                                            placeholder="lot Number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Expiration Date</label>
                                        <input type="date" name="sp_expdate" class="form-control"
                                            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder=""
                                            id="sp_expdate">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Billing Code</label>
                                        <input type="text" name="sp_billingcode" class="form-control"
                                            id="edit_billing" placeholder="Billing Code">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Add Notes</label>
                                        <textarea name="sp_notes" id="edit_notes" rows="3" placeholder="Add notes" class="form-control">
                                                </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="mb-2">Select Group</label>
                                    @foreach ($spg as $item)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="spg_ids[]"
                                                value="{{ $item->spg_id }}" id="spg_{{ $item->spg_id }}">
                                            <label class="form-check-label"
                                                for="spg_{{ $item->spg_id }}">{{ $item->spg_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">

                                        <input type="hidden" name="eq_active" value="0">
                                        <input type="checkbox" role="switch" name="eq_active" id="edit-active"
                                            value="1" class="form-check-input" {{ old('active') ? 'checked' : '' }}>
                                        <label for="edit-active" class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Update
                                        Supply</button>
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
        function editEqg(sp) {
            console.log(sp.sp_groups);
            document.getElementById("sp_id").value = sp.sp_id;
            document.getElementById("edit_type").value = sp.sp_type;
            document.getElementById("edit_manufacturer").value = sp.sp_manufacturer;
            document.getElementById("edit_name").value = sp.sp_name;
            document.getElementById("edit_lotno").value = sp.sp_lotno;
            document.getElementById("edit_billing").value = sp.sp_billingcode;
            document.getElementById("edit_notes").value = sp.sp_notes;
            document.getElementById("edit-active").checked = sp.sp_active == 1;
            let selectedIds = sp.sp_groups ? sp.sp_groups.split(',') : [];
            document.querySelectorAll('input[name="spg_ids[]"]').forEach(checkbox => {
                checkbox.checked = selectedIds.includes(checkbox.value);
            });
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
