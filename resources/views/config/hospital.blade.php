@extends('sitemaster.master-layout')
@section('title','All Hospitals')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            {{-- @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif --}}

            <!-- Success Message -->
            <div id="successMessage" class="alert alert-success" style="display: none;"></div>

            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Hospital</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-hospital') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Hospital Name</label>
                                            <input type="text" name="hos_name" id="hosname"
                                                value="{{ old('hos_name') }}" class="form-control" placeholder="Name"
                                                required>
                                            @error('hos_name')
                                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Zipcode</label>
                                            <input type="text" name="zip_code" id="zipcode"
                                                value="{{ old('zip_code') }}" class="form-control" placeholder="Zip code">
                                            @error('zip_code')
                                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Region</label>
                                            <input type="text" name="region" id="region" value="{{ old('region') }}"
                                                class="form-control" placeholder="region">

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">National Provider Identifier</label>
                                            <input type="text" name="national_pro_id" id="nationalPro"
                                                value="{{ old('national_pro_id') }}" class="form-control"
                                                placeholder="National Provider Identifier">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-2">

                                            <input type="hidden" name="active" value="0">
                                            <input type="checkbox" role="switch" name="active" id="active" checked
                                                value="1" class="form-check-input"
                                                {{ old('active') ? 'checked' : '' }}>
                                            <label for="active" class="form-check-label status-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                            Add Hospital
                                        </button>
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
                                    <i class="fas fa-plus"></i> Add Hospital
                                </button>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Zip Code</th>
                                        <th>Region</th>
                                        <th>National Provider Identifier</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($hospital as $index => $hos)
                                    <tr id="row-{{ $hos->hos_id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $hos->hos_name }}</td>
                                            <td>{{ $hos->zip_code }}</td>
                                            <td>{{ $hos->region }}</td>
                                            <td>{{ $hos->national_pro_id }}</td>
                                            <td>
                                                @if ($hos->active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick="editHospital({{ json_encode($hos) }})"
                                                    href="javascript:void(0);">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <a href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('delete-hospital', $hos->hos_id) }}', '{{ $hos->hos_id }}')"
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
                            <h4 class="mb-0"><b>Edit Hospital</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('edit-hospital') }}" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="hos_id" id="hos_id">
                                    <div class="form-group mb-3">
                                        <label for="">Hospital Name</label>
                                        <input type="text" name="hos_name" id="edithosname"
                                            value="{{ old('hos_name') }}" class="form-control" placeholder="Name"
                                            required>
                                        @error('hos_name')
                                            <small class="text-danger d-block text-start">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Zipcode</label>
                                        <input type="text" name="zip_code" id="editzipcode"
                                            value="{{ old('zip_code') }}" class="form-control" placeholder="Zip code">
                                        @error('zip_code')
                                            <small class="text-danger d-block text-start">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Region</label>
                                        <input type="text" name="region" id="editregion"
                                            value="{{ old('region') }}" class="form-control" placeholder="region">

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">National Provider Identifier</label>
                                        <input type="text" name="national_pro_id" id="editnationalproid"
                                            value="{{ old('national_pro_id') }}" class="form-control"
                                            placeholder="National Provider Identifier">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" name="active" id="editactive" value="1"
                                            class="form-check-input" {{ old('active') ? 'checked' : '' }} role="switch">
                                        <label for="active" class="form-check-label status-label">Active</label>

                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark ">Update Hospital</button>
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
        function editHospital(hospital) {
            document.getElementById("hos_id").value = hospital.hos_id;
            document.getElementById("edithosname").value = hospital.hos_name;
            document.getElementById("editzipcode").value = hospital.zip_code;
            document.getElementById("editregion").value = hospital.region;
            document.getElementById("editnationalproid").value = hospital.national_pro_id;
            document.getElementById("editactive").value = hospital.active;
            document.getElementById("editactive").checked = hospital.active == 1;
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
