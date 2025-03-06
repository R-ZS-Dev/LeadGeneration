@extends('sitemaster.master-layout')
@section('title','All Checklists')
@section('content')
    <div class="container-fluid">
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
                                    <h4 class="mb-0"><b>Add CheckList</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('add-clist') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="l_name">Name</label>
                                            <input type="text" name="l_name" id="l_name" value="{{ old('l_name') }}"
                                                class="form-control" placeholder="Check list name" required>
                                            @error('l_name')
                                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="l_description">Description</label>
                                            <textarea name="l_description" id="l_description" class="form-control" rows="4" placeholder="Enter Description..."
                                                required>{{ old('l_description') }}</textarea>
                                            @error('l_description')
                                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    @php
                                        $checkboxes = [
                                            'Anticoagulation',
                                            'Assisted Venous Return',
                                            'Backup',
                                            'Cardioplegia',
                                            'Components (Lines/Pump Tubing)',
                                            'Electrical',
                                            'Emergency Restart Bypass',
                                            'Gas Supply',
                                            'Monitoring',
                                            'Patient',
                                            'Post Bypass Checklist',
                                            'Pump',
                                            'Safety Mechanisms',
                                            'Standard 18: Maintenance',
                                            'Sterility/Cleanliness',
                                            'Supplies',
                                            'Temperature Control',
                                            'Termination Checklist',
                                        ];
                                    @endphp

                                    <div class="col-lg-12">Groups
                                        <div class="form-group mb-2">
                                            @foreach ($checkboxes as $checkbox)
                                                <label>
                                                    <input type="checkbox" name="rowboxes[]" value="{{ $checkbox }}">
                                                    {{ $checkbox }}
                                                </label><br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group form-switch mb-2">
                                            <input type="hidden" name="l_active" value="0">
                                            <input type="checkbox" role="switch" name="l_active" id="l_active" checked
                                                value="1" class="form-check-input"
                                                {{ old('l_active') ? 'checked' : '' }}>
                                            <label for="l_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                            Add check list
                                        </button>
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
                                    <i class="fas fa-plus"></i> Add check list
                                </button>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Check List</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($viewClists as $index => $viewClist)
                                        <tr id="row-{{ $viewClist->c_id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $viewClist->l_name }}</td>
                                            <td>{{ $viewClist->l_description }}</td>
                                            <td id="truncated-text"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; cursor: pointer;"
                                                onclick="expandText(this)">
                                                {{ implode(', ', json_decode($viewClist->rowboxes, true)) }}</td>
                                            <td>
                                                @if ($viewClist->l_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>

                                                <a onclick="editCLitem({{ json_encode($viewClist, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }})"
                                                    href="javascript:void(0);">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>


                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-clist', $viewClist->c_id) }}',{{ $viewClist->c_id }})"
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


            {{-- /* --------------------------- edit checklist modal -------------------------- */ --}}
            <div id="editCLModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content ">
                        <div class="modal-body ">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Edit Checklist</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('update-clist') }}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="c_id" id="c_id"
                                            value="{{ $checklist->c_id ?? '' }}">

                                        <div class="form-group mb-3">
                                            <label for="l_name">Name</label>
                                            <input type="text" name="l_name" id="editl_name"
                                                value="{{ old('l_name') }}" class="form-control" placeholder="Name"
                                                required>
                                            @error('l_name')
                                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="l_description">Description</label>
                                            <textarea name="l_description" id="editl_description" class="form-control" rows="4"
                                                placeholder="Enter Description...">{{ old('l_description') }}</textarea>
                                            @error('l_description')
                                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    @php
                                        $checkboxes = [
                                            'Anticoagulation',
                                            'Assisted Venous Return',
                                            'Backup',
                                            'Cardioplegia',
                                            'Components (Lines/Pump Tubing)',
                                            'Electrical',
                                            'Emergency Restart Bypass',
                                            'Gas Supply',
                                            'Monitoring',
                                            'Patient',
                                            'Post Bypass Checklist',
                                            'Pump',
                                            'Safety Mechanisms',
                                            'Standard 18: Maintenance',
                                            'Sterility/Cleanliness',
                                            'Supplies',
                                            'Temperature Control',
                                            'Termination Checklist',
                                        ];
                                        $selectedBoxes = json_decode($checklist->rowboxes ?? '[]', true);
                                    @endphp

                                    <div class="col-lg-12">
                                        <label>Groups</label>
                                        <div class="form-group mb-2">
                                            @foreach ($checkboxes as $checkbox)
                                                <label>
                                                    <input type="checkbox" name="rowboxes[]" value="{{ $checkbox }}"
                                                        {{ in_array($checkbox, $selectedBoxes) ? 'checked' : '' }}>
                                                    {{ $checkbox }}
                                                </label><br>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group form-switch mb-2">
                                            <input type="hidden" name="l_active" value="0">
                                            <input type="checkbox" role="switch" name="l_active" id="editl_active"
                                                value="1" class="form-check-input"
                                                {{ old('l_active') ? 'checked' : '' }}>
                                            <label for="editl_active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark ">Update check list</button>
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
            function editCLitem(clItem) {
                console.log(clItem);

                // Populate form fields
                document.getElementById("c_id").value = clItem.c_id;
                document.getElementById("editl_name").value = clItem.l_name;
                document.getElementById("editl_description").value = clItem.l_description;
                document.getElementById("editl_active").checked = clItem.l_active == 1;

                // Parse rowboxes safely (ensure it's an array)
                let selectedBoxes = [];
                if (clItem.rowboxes) {
                    try {
                        selectedBoxes = JSON.parse(clItem.rowboxes);
                    } catch (error) {
                        console.error("Error parsing rowboxes:", error);
                    }
                }

                // Select all checkboxes and update based on stored values
                let checkboxes = document.querySelectorAll("input[name='rowboxes[]']");
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = selectedBoxes.includes(checkbox.value);
                });

                // Show modal
                var editModal = new bootstrap.Modal(document.getElementById("editCLModal"));
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

        <script>
            function expandText(td) {
                // Toggle the width between 200px and auto
                if (td.style.maxWidth === '200px') {
                    td.style.maxWidth = 'none';
                    td.style.whiteSpace = 'normal'; // Allow text to wrap
                } else {
                    td.style.maxWidth = '200px';
                    td.style.whiteSpace = 'nowrap'; // Prevent text from wrapping
                }
            }
        </script>
    @endsection
