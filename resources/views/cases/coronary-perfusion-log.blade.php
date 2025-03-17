@extends('sitemaster.master-layout')
@section('title', 'Coronary Perfusion Log')
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
                                    <h4 class="mb-0"><b>Add Coronary Fusion Log</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            @if (!session('pat_id'))
                                <div class="alert alert-danger">
                                    Case is missing. Please add a case first to add coronary perfusion log.
                                </div>
                            @else
                                <form method="POST" action="{{ route('add-coronary-perfusion-log') }}" class="mt-4">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="date">Date</label>
                                                <input type="date" id="date" name="cpl_date" class="form-control"
                                                    value="{{ now()->toDateString() }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="time">Time</label>
                                                <input type="time" id="time" class="form-control" name="cpl_time"
                                                    value="{{ now()->format('H:i') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label for="cpg_type">CPG Type</label>
                                                <select id="cpg_type" class="form-select" name="cpl_cpgtype" required>
                                                    <option value="">CPG Type</option>
                                                    <option value="Antegrade">Antegrade</option>
                                                    <option value="Retrograde">Retrograde</option>
                                                    <option value="Antegrade/Retrograde">Antegrade/Retrograde</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="dose">Dose (mL)</label>
                                                <input type="number" id="dose" class="form-control" name="cpl_dose"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="temp">Temp (°C)</label>
                                                <input type="number" id="temp" class="form-control" name="cpl_temp"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="transfusion_time">Transfusion Time (minutes)</label>
                                                <input type="number" class="form-control" id="transfusion_time"
                                                    name="transfusion_time">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="ischemic_time">Ischemic Time (minutes)</label>
                                                <input type="number" class="form-control" id="ischemic_time"
                                                    name="ischemic_time">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label for="mixture">Mixture</label>
                                                <select id="mixture" class="form-select" name="cpl_mixture">
                                                    <option value="">Select Mixture</option>
                                                    <option value="4:1">4:1</option>
                                                    <option value="Microplegia">Microplegia</option>
                                                    <option value="5:1">5:1</option>
                                                    <option value="2:1">2:1</option>
                                                    <option value="7:1">7:1</option>
                                                    <option value="10:1">10:1</option>
                                                    <option value="Guest MPS">Guest MPS</option>
                                                    <option value="Blood">Blood</option>
                                                    <option value="1:1">1:1</option>
                                                    <option value="9:1">9:1</option>
                                                    <option value="Crystalloid">Crystalloid</option>
                                                    <option value="6:1">6:1</option>
                                                    <option value="3:1">3:1</option>
                                                    <option value="8:1">8:1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label for="svg_perf_count">SVG Perfusion Count</label>
                                                <input type="number" class="form-control" id="svgperfcount"
                                                    name="svgperfcount">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label for="note">Note</label>
                                                <select id="note" name="cpl_note" class="form-select">
                                                    <option value="">Select</option>
                                                    <option value="Note 1">Note 1</option>
                                                    <option value="Note 2">Note 2</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-dark w-100 mt-2">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
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
                                <i class="fas fa-plus"></i> Add Coronary Perfusion Log
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time</th>
                                    <th>CPG Type</th>
                                    <th>Dose</th>
                                    <th>Temperature</th>
                                    <th>Transfusion</th>
                                    <th>Ischemic</th>
                                    <th>Mixture</th>
                                    <th>SVG</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($log as $index => $cpl)
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
                                            {{--
                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('delete-equipment-group', $cpl->cpl_id) }}', '{{ $cpl->cpl_id }}')"
                                                class="edit-icon delete-user-btn text-danger">
                                                <i class="fa-solid fa-trash-can-arrow-up"></i>
                                            </a> --}}
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
                        <h4 class="mb-0"><b>Edit Coronary Perfusion Log</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-coronary-perfusion-log') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="cpl_id" id="cpl_id">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="date">Date</label>
                                    <input type="date" id="edit-date" name="cpl_date" class="form-control"
                                        value="{{ now()->toDateString() }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="time">Time</label>
                                    <input type="time" id="edit-time" class="form-control" name="cpl_time"
                                        value="{{ now()->format('H:i') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="cpg_type">CPG Type</label>
                                    <select id="edit-cpgtype" class="form-select" name="cpl_cpgtype" required>
                                        <option value="">CPG Type</option>
                                        <option value="Antegrade">Antegrade</option>
                                        <option value="Retrograde">Retrograde</option>
                                        <option value="Antegrade/Retrograde">Antegrade/Retrograde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="dose">Dose (mL)</label>
                                    <input type="number" id="edit-dose" class="form-control" name="cpl_dose"
                                        step="0.1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="temp">Temp (°C)</label>
                                    <input type="number" id="edit-temp" class="form-control" name="cpl_temp"
                                        step="0.1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="transfusion_time">Transfusion Time (minutes)</label>
                                    <input type="number" class="form-control" id="edit-transfusion"
                                        name="transfusion_time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="ischemic_time">Ischemic Time (minutes)</label>
                                    <input type="number" class="form-control" id="edit-ischemic"
                                        name="ischemic_time">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="mixture">Mixture</label>
                                    <select class="form-select" id="edit-mixture" name="cpl_mixture">
                                        <option value="">Select Mixture</option>
                                        <option value="4:1">4:1</option>
                                        <option value="Microplegia">Microplegia</option>
                                        <option value="5:1">5:1</option>
                                        <option value="2:1">2:1</option>
                                        <option value="7:1">7:1</option>
                                        <option value="10:1">10:1</option>
                                        <option value="Guest MPS">Guest MPS</option>
                                        <option value="Blood">Blood</option>
                                        <option value="1:1">1:1</option>
                                        <option value="9:1">9:1</option>
                                        <option value="Crystalloid">Crystalloid</option>
                                        <option value="6:1">6:1</option>
                                        <option value="3:1">3:1</option>
                                        <option value="8:1">8:1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="svg_perf_count">SVG Perfusion Count</label>
                                    <input type="number" class="form-control" id="edit-svg"
                                        name="svgperfcount">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="note">Note</label>
                                    <select id="edit-note" name="cpl_note" class="form-select">
                                        <option value="">Select</option>
                                        <option value="Note 1">Note 1</option>
                                        <option value="Note 2">Note 2</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 mt-2">Update Coronary Prfusion Log</button>
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
    function editCPL(cpl) {
        document.getElementById("cpl_id").value = cpl.cpl_id;
        document.getElementById("edit-date").value = cpl.cpl_date;
        document.getElementById("edit-time").value = cpl.cpl_time;
        document.getElementById("edit-cpgtype").value = cpl.cpl_cpgtype;
        document.getElementById("edit-dose").value = cpl.cpl_dose;
        document.getElementById("edit-temp").value = cpl.cpl_temp;
        document.getElementById("edit-transfusion").value = cpl.transfusion_time;
        document.getElementById("edit-ischemic").value = cpl.ischemic_time;
        document.getElementById("edit-mixture").value = cpl.cpl_mixture;
        document.getElementById("edit-svg").value = cpl.svgperfcount;
        document.getElementById("edit-note").value = cpl.cpl_note;
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
