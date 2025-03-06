@extends('sitemaster.master-layout')
@section('title', 'All Equipment Groups')
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
                                    <h4 class="mb-0"><b>Add Fluid Drugs</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-fluid-drugs') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Generic Name</label>
                                            <input type="text" name="fd_gname" id=""
                                                value="{{ old('fd_gname') }}" class="form-control"
                                                placeholder="Generic Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Common Name</label>
                                            <input type="text" name="fd_cname" id=""
                                                value="{{ old('fd_cname') }}" class="form-control"
                                                placeholder="Common Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <textarea name="fd_desc" id="" rows="3" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Billing Code</label>
                                            <input type="text" name="fd_billcode" id="" maxlength="10"
                                                class="form-control" placeholder="Billing Code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Billing Amount</label>
                                            <input type="number" name="fd_billamount" id="" maxlength="10"
                                                class="form-control" placeholder="Billing Amount">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Units</label>
                                            <input type="text" name="fd_unit" maxlength="5" id=""
                                                class="form-control" placeholder="Units">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Concentration</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" name="fd_confrom" id=""
                                                        class="form-control" placeholder="Concentration Per" maxlength="10">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="fd_conto" id=""
                                                        class="form-control" placeholder="Concentration ML" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Default Notes</label>
                                            <textarea name="fd_defaultnote" id="" rows="2" class="form-control" placeholder="Default notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">From</label>
                                            <select name="fd_from" id="" class="form-control">
                                                <option value="">Select From</option>
                                                @foreach ($location as $item)
                                                    <option value="{{ $item->fl_id }}">{{ $item->fl_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">To</label>
                                            <select name="fd_to" id="" class="form-control">
                                                <option value="">Select To</option>
                                                @foreach ($location as $item)
                                                    <option value="{{ $item->fl_id }}">{{ $item->fl_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Hematocrit</label>
                                            <input type="text" name="fd_hematocrit" id=""
                                                class="form-control" placeholder="Hematocrit">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Display</label>
                                            <input type="text" name="fd_display" id="" class="form-control"
                                                placeholder="Display">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="">Amount</label>
                                            <input type="text" name="fd_amount" id="" class="form-control"
                                                placeholder="Amount">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_prime" value="0">
                                            <input type="checkbox" role="switch" name="fd_prime" id="prime"
                                                value="1" class="form-check-input">
                                            <label for="prime" class="form-check-label">Prime</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_drug" value="0">
                                            <input type="checkbox" role="switch" name="fd_drug" id="fd_drug"
                                                value="1" class="form-check-input">
                                            <label for="drug" class="form-check-label">Drug</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_amountforunit" value="0">
                                            <input type="checkbox" role="switch" name="fd_amountforunit"
                                                id="amount_unit" value="1" class="form-check-input">
                                            <label for="amount_unit" class="form-check-label">Enter amount for
                                                unit</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_cardioplegia" value="0">
                                            <input type="checkbox" role="switch" name="fd_cardioplegia"
                                                id="cardioplegia" value="1" class="form-check-input">
                                            <label for="cardioplegia" class="form-check-label">Cardioplegia</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_blood" value="0">
                                            <input type="checkbox" role="switch" name="fd_blood" id="blood"
                                                value="1" class="form-check-input">
                                            <label for="blood" class="form-check-label">Blood</label>
                                        </div>
                                    </div>

                                    {{-- <div class="row"> --}}
                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_quick" value="0">
                                            <input type="checkbox" role="switch" name="fd_quick" id="quick" checked
                                                value="1" class="form-check-input"
                                                {{ old('active') ? 'checked' : '' }}>
                                            <label for="quick" class="form-check-label">Quick</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="fd_active" value="0">
                                            <input type="checkbox" role="switch" name="fd_active" id="active"
                                                checked value="1" class="form-check-input"
                                                {{ old('active') ? 'checked' : '' }}>
                                            <label for="active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                            Fluid Drugs</button>
                                    </div>
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
                                <i class="fas fa-plus"></i> Add Fluid Drugs
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Generic Name</th>
                                    <th>Common Name</th>
                                    <th>Units</th>
                                    <th>Concentration</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Quick</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($drugs as $index => $item)
                                    <tr id="row-{{ $item->fd_id }}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->fd_gname }}</td>
                                        <td>{{ $item->fd_cname }}</td>
                                        <td>{{ $item->fd_units }}</td>
                                        <td>{{ $item->fd_confrom }} Per {{ $item->fd_conto }} ML</td>
                                        <td>{{ $item->lFrom->fl_name }}</td>
                                        <td>{{ $item->lTo->fl_name }}</td>
                                        <td>
                                            @if ($item->fd_quick == '1')
                                                <span class="badge bg-success">True</span>
                                            @else
                                                <span class="badge bg-danger">False</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($item->fd_active == '1')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="editDrug({{ json_encode($item) }})" href="javascript:void(0);">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('delete-fluid-drugs', $item->fd_id) }}', '{{ $item->fd_id }}')"
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Edit Equipment Group</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-fluid-drugs') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="fd_id" name="fd_id">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_gname">Generic Name</label>
                                    <input type="text" name="fd_gname" id="edit-fd_gname" class="form-control"
                                        placeholder="Generic Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_cname">Common Name</label>
                                    <input type="text" name="fd_cname" id="edit-fd_cname" class="form-control"
                                        placeholder="Common Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_desc">Description</label>
                                    <textarea name="fd_desc" id="edit-fd_desc" rows="3" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_billcode">Billing Code</label>
                                    <input type="text" name="fd_billcode" id="edit-fd_billcode" class="form-control"
                                        placeholder="Billing Code">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_billamount">Billing Amount</label>
                                    <input type="number" name="fd_billamount" id="edit-fd_billamount"
                                        class="form-control" placeholder="Billing Amount">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_units">Units</label>
                                    <input type="text" name="fd_unit" id="edit-fd_units" class="form-control"
                                        placeholder="Units">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Concentration</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="fd_confrom" id="edit-fd_confrom"
                                                class="form-control" placeholder="Concentration Per">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="fd_conto" id="edit-fd_conto"
                                                class="form-control" placeholder="Concentration ML">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_defaultnote">Default Notes</label>
                                    <textarea name="fd_defaultnote" id="edit-fd_defaultnote" rows="2" class="form-control"
                                        placeholder="Default notes"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_from">From</label>
                                    <select name="fd_from" id="edit-fd_from" class="form-control">
                                        <option value="">Select From</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->fl_id }}">{{ $item->fl_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_to">To</label>
                                    <select name="fd_to" id="edit-fd_to" class="form-control">
                                        <option value="">Select From</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->fl_id }}">{{ $item->fl_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="">Hematocrit</label>
                                    <input type="text" name="fd_hematocrit" id="edit-fd_hematocrit"
                                        class="form-control" placeholder="Hematocrit">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="">Display</label>
                                    <input type="text" name="fd_display" id="edit-fd_display" class="form-control"
                                        placeholder="Display">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="edit-fd_amount">Amount</label>
                                    <input type="text" name="fd_amount" id="edit-fd_amount" class="form-control"
                                        placeholder="Amount">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_prime" value="0">
                                    <input type="checkbox" role="switch" name="fd_prime" id="edit-fd_prime"
                                        value="1" class="form-check-input">
                                    <label for="edit-fd_prime" class="form-check-label">Prime</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_drug" value="0">
                                    <input type="checkbox" role="switch" name="fd_drug" id="edit-fd_drug"
                                        value="1" class="form-check-input">
                                    <label for="edit-fd_drug" class="form-check-label">Drug</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_amountforunit" value="0">
                                    <input type="checkbox" role="switch" name="fd_amountforunit"
                                        id="edit-fd_amountforunit" value="1" class="form-check-input">
                                    <label for="edit-fd_amountforunit" class="form-check-label">Enter amount for
                                        unit</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_cardioplegia" value="0">
                                    <input type="checkbox" role="switch" name="fd_cardioplegia"
                                        id="edit-fd_cardioplegia" value="1" class="form-check-input">
                                    <label for="edit-fd_cardioplegia" class="form-check-label">Cardioplegia</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_blood" value="0">
                                    <input type="checkbox" role="switch" name="fd_blood" id="edit-fd_blood"
                                        value="1" class="form-check-input">
                                    <label for="edit-fd_blood" class="form-check-label">Blood</label>
                                </div>
                            </div>

                            {{-- <div class="row"> --}}
                            <div class="col-lg-4">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_quick" value="0">
                                    <input type="checkbox" role="switch" name="fd_quick" id="edit-fd_quick"
                                        value="1" class="form-check-input" {{ old('fd_quick') ? 'checked' : '' }}>
                                    <label for="edit-fd_quick" class="form-check-label">Quick</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="fd_active" value="0">

                                    <input type="checkbox" role="switch" name="fd_active" id="edit-fd_active" value="1" {{ old('fd_active') ? 'checked' : '' }}
                                        class="form-check-input">
                                    <label for="edit-fd_active">Active</label>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Update
                                    Fluid Drugs</button>
                            </div>
                        </div>
                {{-- </div> --}}
                </form>
            </div>
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
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script>
        function editDrug(fluidDrug) {
            document.getElementById("fd_id").value = fluidDrug.fd_id;
            document.getElementById("edit-fd_gname").value = fluidDrug.fd_gname;
            document.getElementById("edit-fd_cname").value = fluidDrug.fd_cname;
            document.getElementById("edit-fd_desc").value = fluidDrug.fd_desc;
            document.getElementById("edit-fd_billcode").value = fluidDrug.fd_billcode;
            document.getElementById("edit-fd_billamount").value = fluidDrug.fd_billamount;
            document.getElementById("edit-fd_units").value = fluidDrug.fd_units;
            document.getElementById("edit-fd_confrom").value = fluidDrug.fd_confrom;
            document.getElementById("edit-fd_conto").value = fluidDrug.fd_conto;
            document.getElementById("edit-fd_defaultnote").value = fluidDrug.fd_defaultnote;
            document.getElementById("edit-fd_from").value = fluidDrug.fd_from;
            document.getElementById("edit-fd_to").value = fluidDrug.fd_to;
            document.getElementById("edit-fd_amount").value = fluidDrug.fd_amount;
            document.getElementById("edit-fd_prime").checked = fluidDrug.fd_prime == 1;
            document.getElementById("edit-fd_drug").checked = fluidDrug.fd_drug == 1;
            document.getElementById("edit-fd_amountforunit").checked = fluidDrug.fd_amountforunit == 1;
            document.getElementById("edit-fd_cardioplegia").checked = fluidDrug.fd_cardioplegia == 1;
            document.getElementById("edit-fd_blood").checked = fluidDrug.fd_blood == 1;
            document.getElementById("edit-fd_hematocrit").value = fluidDrug.fd_hematocrit;
            document.getElementById("edit-fd_display").value = fluidDrug.fd_display;
            document.getElementById("edit-fd_active").checked = fluidDrug.fd_active == 1;
            document.getElementById("edit-fd_quick").checked = fluidDrug.fd_quick == 1;

            // Bootstrap modal open karna
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
