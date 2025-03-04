@extends('sitemaster.master-layout')
@section('title','All Equipments')
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
                                            <h4 class="mb-0"><b>Add Equipment</b></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('add-equipment') }}" class="mt-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Select Equipment Group</label>
                                                    <select name="eq_type" id="" class="form-select">
                                                        <option value="">Select Equipment Group</option>
                                                        @foreach ($eqg as $item)
                                                        <option value="{{ $item->eqg_id }}">{{ $item->eqg_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Manufacturer</label>
                                                    <input type="text" name="eq_manufacturer" class="form-control" id="" placeholder="Manufacturer">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="eq_name" class="form-control" id="" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Serial No</label>
                                                    <input type="text" name="eq_serial" class="form-control" id="" placeholder="Serial no">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Last Service</label>
                                                    <input type="date" name="eq_lastservice" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="Last Service">

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Next Service</label>
                                                    <input type="date" name="eq_nextservice" class="form-control" id="" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="Next Service">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Billing Code</label>
                                                    <input type="text" name="eq_billingcode" class="form-control" id="" placeholder="Billing code">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Add Notes</label>
                                                    <textarea name="eq_notes" id="" rows="3" placeholder="Add notes" class="form-control">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="eq_active" value="0">
                                                    <input type="checkbox" name="eq_active" checked
                                                        value="1" class="form-check-input" role="switch"
                                                        {{ old('active') ? 'checked' : '' }}
                                                        >
                                                    <label for="active" class="form-check-label">Active</label>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                                    Equipment</button>
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
                                            <i class="fas fa-plus"></i> Add Equipment
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
                                                <th>Last Service</th>
                                                <th>Next Service</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($eq as $index => $item)
                                                <tr id="row-{{ $item->eq_id }}">
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $item->equipmentGroup->eqg_name }}</td>
                                                    <td>{{ $item->eq_manufacturer }}</td>
                                                    <td>{{ $item->eq_name }}</td>
                                                    <td>{{ $item->eq_lastservice }}</td>
                                                    <td>{{ $item->eq_nextservice }}</td>
                                                    <td>
                                                        @if ($item->eq_active == '1')
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
                                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ route('delete-equipment', $item->eq_id) }}' , '{{ $item->eq_id }}')"
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form method="POST" action="{{ route('edit-equipment') }}" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="eq_id" id="eq_id">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Select Equipment Group</label>
                                                <select name="eq_type" id="edit_type" class="form-select">
                                                    <option value="">Select Equipment Group</option>
                                                    @foreach ($eqg as $item)
                                                    <option value="{{ $item->eqg_id }}">{{ $item->eqg_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Manufacturer</label>
                                                <input type="text" name="eq_manufacturer" class="form-control" id="edit_manufacturer" placeholder="Manufacturer">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Name</label>
                                                <input type="text" name="eq_name" class="form-control" id="edit_name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Serial No</label>
                                                <input type="text" name="eq_serial" class="form-control" id="edit_serial" placeholder="Serial no">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Last Service</label>
                                                <input type="date" name="eq_lastservice" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="Last Service" id="edit_lastservice" >

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Next Service</label>
                                                <input type="date" name="eq_nextservice" class="form-control"  value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="Next Service" id="edit_nextservice">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Billing Code</label>
                                                <input type="text" name="eq_billingcode" class="form-control" id="edit_billing" placeholder="Billing code">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Add Notes</label>
                                                <textarea name="eq_notes" id="edit_notes" rows="3" placeholder="Add notes" class="form-control">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="eq_active" value="0">
                                                <input type="checkbox" name="eq_active" id="active"
                                                    value="1" class="form-check-input" role="switch"
                                                    {{ old('active') ? 'checked' : '' }}
                                                    >
                                                <label for="active" class="form-check-label">Active</label>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn w-100 btn-dark">Update
                                                Equipment</button>
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
        function editEqg(eq) {
            document.getElementById("eq_id").value = eq.eq_id;
            document.getElementById("edit_type").value = eq.eq_type;
            document.getElementById("edit_manufacturer").value = eq.eq_manufacturer;
            document.getElementById("edit_name").value = eq.eq_name;
            document.getElementById("edit_serial").value = eq.eq_serial;
            document.getElementById("edit_billing").value = eq.eq_billingcode;
            document.getElementById("edit_lastservice").value = eq.eq_lastservice;
            document.getElementById("edit_nextservice").value = eq.eq_nextservice;
            document.getElementById("edit_notes").value = eq.eq_notes;
            document.getElementById("active").checked = eq.eq_active == 1;
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
