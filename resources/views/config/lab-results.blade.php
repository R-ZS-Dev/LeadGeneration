@extends('sitemaster.master-layout')
@section('title','All Lab Results')
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
                <div class="modal-dialog modal-lg  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Lab Results</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-lab-results') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <!-- Staff Name -->
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Lab Report Name</label>
                                            <input type="text" name="lr_name" class="form-control"
                                                placeholder="Lab Report Name" required>
                                        </div>
                                    </div>
                                    <!-- First Name -->
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Abbrivation</label>
                                            <input type="text" name="lr_abbrivate" class="form-control"
                                                placeholder="Lab Report Abbrivation" required maxlength="10">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Unit of measurment</label>
                                                <input type="text"  name="unit_of_measure" class="form-control"
                                                placeholder="Unit Of Measurment" maxlength="5">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="show_unit" value="0">
                                            <input type="checkbox" name="show_unit" id="unit" value="1"
                                                class="form-check-input" role="switch">
                                            <label for="unit" class="form-check-label">Show unit in report</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <textarea name="lr_desc" rows="3" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Expected Low</label>
                                            <input type="number" name="exp_low" class="form-control"
                                                placeholder="Expected Low">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Expected High</label>
                                            <input type="number" name="exp_high" class="form-control"
                                                placeholder="Expected High">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Maximum</label>
                                            <input type="number" name="maximum" class="form-control" placeholder="Maximum"
                                                maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">High Critical</label>
                                            <input type="number" name="high_critical" class="form-control"
                                                placeholder="High Critical">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">High Warn</label>
                                            <input type="number" name="high_warn" class="form-control"
                                                placeholder="High Warn">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="good_range_from">Good Range</label>
                                            <div class="d-flex">
                                                <input type="number" name="good_range_from" id="good_range_from"
                                                    class="form-control me-2" placeholder="From">
                                                <span class="align-self-center">to</span>
                                                <input type="number" name="good_range_to" id="good_range_to"
                                                    class="form-control ms-2" placeholder="To">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Minimum</label>
                                            <input type="text" name="minimum" class="form-control"
                                                placeholder="Minimum" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Low Critical</label>
                                            <input type="number" name="low_critical" class="form-control"
                                                placeholder="Low Critical">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Low Warn</label>
                                            <input type="number" name="low_warn" class="form-control"
                                                placeholder="Low Warn">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="lr_active" value="0">
                                            <input type="checkbox" name="lr_active" id="pro_active" value="1"  checked
                                                class="form-check-input" role="switch">
                                            <label for="pro_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add Lab
                                            Results</button>
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
                                    <i class="fas fa-plus"></i> Add Lab Results
                                </button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Abbrivation</th>
                                        <th>Unit of measurement</th>
                                        <th>Description</th>
                                        <th>Expected Low</th>
                                        <th>Expected High</th>
                                        <th>Maximum</th>
                                        <th>Minimum</th>
                                        <th>High Critical</th>
                                        <th>High Warn</th>
                                        <th>Good Range From </th>
                                        <th>Good Range To</th>
                                        <th>Low Critical</th>
                                        <th>Low Warn</th>
                                        <th>Unit</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($results as $index => $item)
                                        <tr id="row-{{ $item->lr_id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->lr_name }}</td>
                                            <td>{{ $item->lr_abbrivat }}</td>
                                            <td>{{ $item->unit_of_measure }}</td>
                                            <td>{{ $item->lr_desc }}</td>
                                            <td>{{ $item->expected_low }}</td>
                                            <td>{{ $item->expected_high }}</td>
                                            <td>{{ $item->maximum }}</td>
                                            <td>{{ $item->minimum }}</td>
                                            <td>{{ $item->high_critical }}</td>
                                            <td>{{ $item->high_warn }}</td>
                                            <td>{{ $item->lr_rangefrom }}</td>
                                            <td>{{ $item->lr_rangeto }}</td>
                                            <td>{{ $item->low_critical }}</td>
                                            <td>{{ $item->low_warn }}</td>
                                            <td>
                                                @if ($item->show_unit == '1')
                                                    <span class="badge bg-success">Show</span>
                                                @else
                                                    <span class="badge bg-danger">Hide</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->lr_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick='editPro(@json($item))'
                                                    href="javascript:void(0);" class="text-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-lab-results', $item->lr_id) }}' , {{ $item->lr_id }})"
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
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Edit Lab Result</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('edit-lab-results') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="lr_id" id="lr_id">
                            <div class="row">
                                <!-- Staff Name -->
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Lab Report Name</label>
                                        <input type="text" name="lr_name" class="form-control"
                                            placeholder="Lab Report Name" id="edit_name" required>
                                    </div>
                                </div>
                                <!-- First Name -->
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Abbrivation</label>
                                        <input type="text" name="lr_abbrivate" class="form-control"
                                        placeholder="Lab Report Abbrivation" id="abbrivate" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Unit Of Measurment</label>
                                        <input type="text" name="unit_of_measure" class="form-control"
                                            placeholder="Unit Of Measurment" id="edit_mou" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="show_unit" value="0">
                                        <input type="checkbox" name="show_unit" id="edit_unit" value="1"
                                            class="form-check-input" role="switch">
                                        <label for="edit_unit" class="form-check-label">Show unit in report</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Description</label>
                                        <textarea name="lr_desc" rows="3" class="form-control" placeholder="Description" id="edit_desc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Expected Low</label>
                                        <input type="number" name="exp_low" class="form-control"
                                            placeholder="Expected Low" id="edit_explow">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Expected High</label>
                                        <input type="number" name="exp_high" class="form-control"
                                            placeholder="Expected High" id="edit_exphigh">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Maximum</label>
                                        <input type="number" name="maximum" class="form-control" placeholder="Maximum"
                                            maxlength="10" id="edit_max">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">High Critical</label>
                                        <input type="number" name="high_critical" class="form-control"
                                            placeholder="High Critical" id="edit_highcrit">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">High Warn</label>
                                        <input type="number" name="high_warn" class="form-control"
                                            placeholder="High Warn" id="edit_highwarn">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="good_range_from">Good Range</label>
                                        <div class="d-flex">
                                            <input type="number" name="good_range_from" id="good_range_from1"
                                                class="form-control me-2" placeholder="From">
                                            <span class="align-self-center">to</span>
                                            <input type="number" name="good_range_to" id="good_range_to1"
                                                class="form-control ms-2" placeholder="To">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Minimum</label>
                                        <input type="text" name="minimum" class="form-control" placeholder="Minimum"
                                            maxlength="10" id="edit_min">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Low Critical</label>
                                        <input type="number" name="low_critical" class="form-control"
                                            placeholder="Low Critical" id="edit_lowcrit">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="">Low Warn</label>
                                        <input type="number" name="low_warn" class="form-control"
                                            placeholder="Low Warn" id="edit_lowwarn">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="lr_active" value="0">
                                        <input type="checkbox" name="lr_active" id="edit_active" value="1"
                                            class="form-check-input" role="switch">
                                        <label for="edit_active" class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Update Lab
                                        Results</button>
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
        function editPro(pro) {
            console.log(pro);
            abb = pro.lr_abbrivat;
            document.getElementById("lr_id").value = pro.lr_id;
            document.getElementById("edit_name").value = pro.lr_name;
            document.getElementById("abbrivate").value = abb;
            document.getElementById("edit_mou").value = pro.unit_of_measure;
            document.getElementById("edit_explow").value = pro.expected_low;
            document.getElementById("edit_exphigh").value = pro.expected_high;
            document.getElementById("edit_max").value = pro.maximum;
            document.getElementById("edit_highcrit").value = pro.high_critical;
            document.getElementById("edit_highwarn").value = pro.high_warn;
            document.getElementById("good_range_from1").value = pro.lr_rangefrom;
            document.getElementById("good_range_to1").value = pro.lr_rangeto;
            document.getElementById("edit_min").value = pro.minimum;
            document.getElementById("edit_lowcrit").value = pro.low_critical;
            document.getElementById("edit_lowwarn").value = pro.low_warn;
            document.getElementById("edit_desc").value = pro.lr_desc;
            document.getElementById("edit_active").checked = pro.lr_active == 1;
            document.getElementById("edit_unit").checked = pro.show_unit == 1;

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
