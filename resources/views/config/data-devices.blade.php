@extends('sitemaster.master-layout')
@section('title', 'All Data Devices')
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
                                    <h4 class="mb-0"><b>Add Data Devices</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-data-devices') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="dd_name" id="" value="{{ old('dd_name') }}"
                                                class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <textarea name="dd_desc" id="" rows="3" class="form-control" placeholder="Description">{{ old('dd_desc') ?? '' }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Select Type</label>
                                            <select name="dd_type" id="" class="form-control">
                                                <option value="">Select Type</option>
                                                <option value="Califia Simulator">Califia Simulator</option>
                                                <option value="Casmed Fore-Sight">Casmed Fore-Sight</option>
                                                <option value="CDI 500">CDI 500</option>
                                                <option value="CDI 550">CDI 550</option>
                                                <option value="Century 2020">Century 2020</option>
                                                <option value="Century HLM">Century HLM</option>
                                                <option value="Medtrronic 560">Medtrronic 560</option>
                                                <option value="Quest MPS">Quest MPS</option>
                                                <option value="Sarns 8000">Sarns 8000</option>
                                                <option value="Sorin S3">Sorin S3</option>
                                                <option value="Sorin S5">Sorin S5</option>
                                                <option value="Terumo System 1">Terumo System 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Select Connection</label>
                                            <select name="dd_con" id="" class="form-control">
                                                <option value="">Select Connection</option>
                                                <option value="Green">Green</option>
                                                <option value="Orange">Orange</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Black">Black</option>
                                                <option value="Testing Port">Testing Port</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Select Hand Shake</label>
                                            <select name="dd_handshake" id="" class="form-control">
                                                <option value="">Select Hand Shake</option>
                                                <option value="RequestToSend">RequestToSend</option>
                                                <option value="RequestToSendXOnXOff">RequestToSendXOnXOff</option>
                                                <option value="XOnXOff">XOnXOff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Baud Rate</label>
                                            <input type="text" name="dd_baudrate" id="" class="form-control"
                                                oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Date Bits</label>
                                            <input type="text" name="dd_databit" id="" class="form-control"
                                                oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="dd_active" value="0">
                                            <input type="checkbox" role="switch" name="dd_active" id="active"
                                                checked value="1" class="form-check-input"
                                                {{ old('active') ? 'checked' : '' }}>
                                            <label for="active" class="form-check-label">Active</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-dark" id="submitBtn">Add
                                            Data Device</button>

                                            <button type="button" class="btn btn-dark" id="" disabled>Start Collect</button>

                                            <button type="button" class="btn btn-dark" id="" disabled>Stop Collect</button>
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
                                <i class="fas fa-plus"></i> Add Data Devices
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Rate</th>
                                    <th>Hand Shake</th>
                                    <th>Port</th>
                                    <th>Data Bits</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($devices as $index => $item)
                                    <tr id="row-{{ $item->dd_id }}">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->dd_name }}</td>
                                        <td>{{ $item->dd_baudrate }}</td>
                                        <td>{{ $item->dd_handshake }}</td>
                                        <td>{{ $item->dd_con }}</td>
                                        <td>{{ $item->dd_databit }}</td>
                                        <td>{{ $item->dd_type }}</td>
                                        <td>
                                            @if ($item->dd_active == '1')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="editEqg({{ json_encode($item) }})" href="javascript:void(0);">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('delete-data-devices', $item->dd_id) }}', '{{ $item->dd_id }}')"
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
                        <h4 class="mb-0"><b>Edit Data Devices</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-data-devices') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="dd_id" id="dd_id">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="dd_name" id="edit-name" value="{{ old('dd_name') }}"
                                        class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Description</label>
                                    <textarea name="dd_desc" id="edit-desc" rows="3" class="form-control" placeholder="Description">{{ old('dd_desc') ?? '' }}</textarea>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Select Type</label>
                                    <select name="dd_type" id="edit-type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="Califia Simulator">Califia Simulator</option>
                                        <option value="Casmed Fore-Sight">Casmed Fore-Sight</option>
                                        <option value="CDI 500">CDI 500</option>
                                        <option value="CDI 550">CDI 550</option>
                                        <option value="Century 2020">Century 2020</option>
                                        <option value="Century HLM">Century HLM</option>
                                        <option value="Medtrronic 560">Medtrronic 560</option>
                                        <option value="Quest MPS">Quest MPS</option>
                                        <option value="Sarns 8000">Sarns 8000</option>
                                        <option value="Sorin S3">Sorin S3</option>
                                        <option value="Sorin S5">Sorin S5</option>
                                        <option value="Terumo System 1">Terumo System 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Select Connection</label>
                                    <select name="dd_con" id="edit-con" class="form-control">
                                        <option value="">Select Connection</option>
                                        <option value="Green">Green</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Black">Black</option>
                                        <option value="Testing Port">Testing Port</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Select Hand Shake</label>
                                    <select name="dd_handshake" id="edit-handshake" class="form-control">
                                        <option value="">Select Hand Shake</option>
                                        <option value="RequestToSend">RequestToSend</option>
                                        <option value="RequestToSendXOnXOff">RequestToSendXOnXOff</option>
                                        <option value="XOnXOff">XOnXOff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Baud Rate</label>
                                    <input type="text" name="dd_baudrate" id="edit-baudrate" class="form-control"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="">Date Bits</label>
                                    <input type="text" name="dd_databit" id="edit-databit" class="form-control"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group form-switch mb-3">
                                    <input type="hidden" name="dd_active" value="0">
                                    <input type="checkbox" role="switch" name="dd_active" id="edit-active" checked
                                        value="1" class="form-check-input" {{ old('active') ? 'checked' : '' }}>
                                    <label for="edit-active" class="form-check-label">Active</label>

                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Update
                                    Data Device</button>

                                <button type="button" class="btn btn-dark" id="" disabled>Start Collect</button>

                                <button type="button" class="btn btn-dark" id="" disabled>Stop Collect</button>
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
        function editEqg(dd) {
            document.getElementById("dd_id").value = dd.dd_id;
            document.getElementById("edit-name").value = dd.dd_name;
            document.getElementById("edit-desc").value = dd.dd_desc;
            document.getElementById("edit-type").value = dd.dd_type;
            document.getElementById("edit-con").value = dd.dd_con;
            document.getElementById("edit-handshake").value = dd.dd_handshake;
            document.getElementById("edit-baudrate").value = dd.dd_baudrate;
            document.getElementById("edit-databit").value = dd.dd_databit;
            document.getElementById("edit-active").checked = dd.dd_active == 1;
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
