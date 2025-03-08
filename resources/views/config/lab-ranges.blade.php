@extends('sitemaster.master-layout')
@section('content')
<div class="container-fluid">

    <div class="row">

    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Add Lab Ranges</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('add-lab-range') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Lab</label>
                                    <select name="lab_id" id="" class="form-control">
                                        <option value="">Select Lab</option>
                                        @foreach ($lab as $item)
                                        <option value="{{ $item->l_id }}">{{ $item->l_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Lab Result</label>
                                    <select name="lab_result" id="" class="form-control">
                                        <option value="">Select Lab Results</option>
                                        @foreach ($result as $item)
                                        <option value="{{ $item->lr_id }}">{{ $item->lr_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Gender</label>
                                    <select name="lrng_sex" id="" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group form-switch mb-2">
                                    <input type="hidden" name="is_child" value="0">
                                    <input type="checkbox" role="switch" name="is_child" id="is_child" checked
                                        value="1" class="form-check-input"
                                        {{ old('is_child') ? 'checked' : '' }}>
                                    <label for="is_child" class="form-check-label">Child</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Source</label>
                                    <select name="lrng_source" id="" class="form-control">
                                        <option value="">Select Source</option>
                                        <option value="Any">Any</option>
                                        <option value="Arterial">Arterial</option>
                                        <option value="Venous">Venous</option>
                                        <option value="Mixed">Mixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Temperature</label>
                                    <select name="lrng_temp" id="" class="form-control">
                                        <option value="">Select Temperature</option>
                                        <option value="Any">Any</option>
                                        <option value="Alpha-Stat">Alpha-Stat</option>
                                        <option value="pH-Stat">pH-Stat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Expected Low</label>

                                    <input type="text" name="lrng_explow" id="" class="form-control" maxlength="10">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Expected High</label>
                                    <input type="text" name="lrng_exphigh" id="" class="form-control" maxlength="10">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Minimum</label>
                                    <input type="text" name="lrng_min" id="" class="form-control" maxlength="10">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Maximum</label>
                                    <input type="text" name="lrng_max" id="" class="form-control" maxlength="10">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                    Add Lab Range
                                </button>
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

                        <button type="button"
                            class="btn waves-effect waves-light mb-2 btn-outline-primary"
                            data-bs-toggle="modal" data-bs-target="#signup-modal">
                            <i class="fas fa-plus"></i> Add Lab Ranges
                        </button>

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lab</th>
                                <th>Lab Result</th>
                                <th>Gender</th>
                                <th>Source</th>
                                <th>Temperature</th>
                                <th>Expected High</th>
                                <th>Expected Low</th>
                                <th>Maximum</th>
                                <th>Minimum</th>
                                <th>Child</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($labrange as $item)
                            <tr id="row-{{ $item->lrng_id }}">
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->lab->l_name }}</td>
                                <td>{{ $item->result->lr_name }}</td>
                                <td>{{ $item->lrng_sex }}</td>
                                <td>{{ $item->lrng_source }}</td>
                                <td>{{ $item->lrng_temp }}</td>
                                <td>{{ $item->lrng_exphigh }}</td>
                                <td>{{ $item->lrng_explow }}</td>
                                <td>{{ $item->lrng_max }}</td>
                                <td>{{ $item->lrng_min }}</td>
                                <td>
                                    @if ($item->is_child == '1')
                                        <span class="badge bg-success">Have Child</span>
                                    @else
                                        <span class="badge bg-danger">No Child</span>
                                    @endif
                                </td>

                                <td>
                                    <a onclick='editlabrang(@json($item))'
                                        href="javascript:void(0);" class="text-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete('{{ route('delete-lab-range', $item->lrng_id) }}' , {{ $item->lrng_id }})"
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

{{-- /* --------------------------- edit general modal -------------------------- */ --}}
<div id="editGeneralEventModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body ">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h4 class="mb-0"><b>Edit Lab Ranges</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('edit-lab-range') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="lrng_id" id="lrng_id">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="">Lab</label>
                                <select name="lab_id" id="edit-lab" class="form-control">
                                    <option value="">Select Lab</option>
                                    @foreach ($lab as $item)
                                    <option value="{{ $item->l_id }}">{{ $item->l_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="">Lab Result</label>
                                <select name="lab_result" id="edit-result" class="form-control">
                                    <option value="">Select Lab Results</option>
                                    @foreach ($result as $item)
                                    <option value="{{ $item->lr_id }}">{{ $item->lr_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="">Gender</label>
                                <select name="lrng_sex" id="edit-gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group form-switch mb-2">
                                <input type="hidden" name="is_child" value="0">
                                <input type="checkbox" role="switch" name="is_child" id="is_child1" checked
                                    value="1" class="form-check-input"
                                    {{ old('is_child') ? 'checked' : '' }}>
                                <label for="is_child1" class="form-check-label">Child</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="">Source</label>
                                <select name="lrng_source" id="edit-source" class="form-control">
                                    <option value="">Select Source</option>
                                    <option value="Any">Any</option>
                                    <option value="Arterial">Arterial</option>
                                    <option value="Venous">Venous</option>
                                    <option value="Mixed">Mixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="">Temperature</label>
                                <select name="lrng_temp" id="edit-temp" class="form-control">
                                    <option value="">Select Temperature</option>
                                    <option value="Any">Any</option>
                                    <option value="Alpha-Stat">Alpha-Stat</option>
                                    <option value="pH-Stat">pH-Stat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="">Expected Low</label>

                                <input type="text" name="lrng_explow" id="edit-explow" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="">Expected High</label>
                                <input type="text" name="lrng_exphigh" id="edit-exphigh" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="">Minimum</label>
                                <input type="text" name="lrng_min" id="edit-min" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="">Maximum</label>
                                <input type="text" name="lrng_max" id="edit-max" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                Update Lab Range
                            </button>
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
    function editlabrang(labrang) {
        console.log(labrang);
        document.getElementById("lrng_id").value = labrang.lrng_id;
        document.getElementById("edit-lab").value = labrang.lab_id;
        document.getElementById("edit-result").value = labrang.lab_result;
        document.getElementById("edit-gender").value = labrang.lrng_sex;
        document.getElementById("edit-source").value = labrang.lrng_source;
        document.getElementById("edit-temp").value = labrang.lrng_temp;
        document.getElementById("edit-explow").value = labrang.lrng_explow;
        document.getElementById("edit-exphigh").value = labrang.lrng_exphigh;
        document.getElementById("edit-min").value = labrang.lrng_min;
        document.getElementById("edit-max").value = labrang.lrng_max;
        document.getElementById("is_child1").checked = labrang.is_child == '1';
        var editModal = new bootstrap.Modal(document.getElementById("editGeneralEventModal"));
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
