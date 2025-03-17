@extends('sitemaster.master-layout')
@section('title', 'Case check list')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="successMessage" class="alert alert-success" style="display: none;"></div>
        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Add Check List</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <label for="pat_id">Select Patient</label>
                                    <select name="pat_id" id="pat_id" class="form-control" required>
                                        <option value="">Select Patient</option>
                                        @foreach ($patients as $item)
                                        <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="">Select List</label>
                                    <select name="config_checklist" id="config_checklist" class="form-control" required>
                                        <option value="">Select List</option>
                                        @foreach ($cchecklists as $cchecklist)
                                        <option value="{{ $cchecklist->c_id }}">{{ $cchecklist->l_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Accordion Section -->
                                <div class="mt-4">
                                    <div class="accordion" id="accordionExample">
                                        <!-- Dynamic content will be injected here -->
                                    </div>
                                </div>


                                <!-- 
                                <div class="col-lg-12 mb-2">
                                    <label for="">Select List</label>
                                    <select name="config_checklist" id="" class="form-control" required>
                                        <option value="">Select List</option>
                                        @foreach ($cchecklists as $cchecklist)
                                        <option value="{{ $cchecklist->c_id }}">{{ $cchecklist->l_name }}</option>
                                        @endforeach
                                    </select>
                                </div>                              
                                
                                <div class="mt-4">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($ccheckgroup as $gIndex => $group)
                                        <div class="accordion-item border rounded-0 mb-3">
                                            <div class="row align-items-center">
                                                <h2 class="accordion-header" id="heading{{ $gIndex }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $gIndex }}" aria-expanded="true" aria-controls="collapse{{ $gIndex }}">
                                                        <div class="col-md-8"> {{ $group->clg_name }} </div>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapse{{ $gIndex }}" class="accordion-collapse collapse {{ $gIndex == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $gIndex }}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    @php
                                                    $rowboxes = json_decode($group->rowboxes, true); // JSON ko decode karna
                                                    @endphp

                                                    @if(!empty($rowboxes))
                                                    <form>
                                                        @foreach($rowboxes as $key => $rowbox)
                                                        <div class="row mb-2 align-items-center">
                                                            <div class="col-md-8 fw-bold">{{ $rowbox }}</div>
                                                            <div class="col-md-2">
                                                                <label>
                                                                    <input type="radio" name="rowbox_{{ $gIndex }}_{{ $key }}" value="1" id="rowbox_{{ $gIndex }}_{{ $key }}_yes" />
                                                                    <span>Yes</span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label>
                                                                    <input type="radio" name="rowbox_{{ $gIndex }}_{{ $key }}" value="0" id="rowbox_{{ $gIndex }}_{{ $key }}_no" checked />
                                                                    <span>No</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </form>
                                                    @else
                                                    <p>No items available.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div> -->

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

                            <button type="button"
                                class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#signup-modal">
                                <i class="fas fa-plus"></i> Add Check List
                            </button>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                <tr id="">
                                    <td>{{ ++$i }}</td>

                                    <td>
                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete()"
                                            class="edit-icon delete-user-btn text-danger">
                                            <i class="fa-solid fa-trash-can-arrow-up"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        function editCLEvent(CList) {
            // console.log(CList);
            document.getElementById("cl_id").value = CList.cl_id;

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
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#config_checklist').change(function() {
                var c_id = $(this).val(); 

                if (c_id) {
                    $.ajax({
                        url: "{{ route('get.rowboxes.groups') }}",
                        type: "GET",
                        data: {
                            c_id: c_id
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response.success) {
                                var accordionHtml = "";
                                var groups = response.groups || []; 

                                if (groups.length > 0) {
                                    groups.forEach(function(group, groupIndex) {
                                        var groupCollapseId = "groupCollapse" + groupIndex;

                                        accordionHtml += `
                                <div class="accordion-item border rounded-0 mb-3">
                                    <h2 class="accordion-header" id="heading${groupIndex}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#${groupCollapseId}" aria-expanded="true" aria-controls="${groupCollapseId}">
                                            <div class="col-md-8 fw-bold">${group.clg_name}</div>
                                        </button>
                                    </h2>
                                    <div id="${groupCollapseId}" class="accordion-collapse collapse" aria-labelledby="heading${groupIndex}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            ${generateRowboxes(group.rowboxes, groupIndex)}
                                        </div>
                                    </div>
                                </div>`;
                                    });
                                } else {
                                    accordionHtml = `<div class="text-danger">No groups found</div>`;
                                }

                                $('#accordionExample').html(accordionHtml);
                            } else {
                                $('#accordionExample').html('<div class="text-danger">Error fetching data</div>');
                            }
                        }
                    });
                } else {
                    $('#accordionExample').html('');
                }
            });

            function generateRowboxes(rowboxes, groupIndex) {
                if (!rowboxes || rowboxes.length === 0) {
                    return '<div class="text-danger">No rowboxes available in this group</div>';
                }

                var rowboxesHtml = "<form>";

                rowboxes.forEach(function(box, boxIndex) {
                    rowboxesHtml += `
            <div class="row mb-2 align-items-center">
                <div class="col-md-8 fw-bold">${box}</div>
                <div class="col-md-2">
                    <label>
                        <input type="radio" name="response_${groupIndex}_${boxIndex}" value="1" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-2">
                    <label>
                        <input type="radio" name="response_${groupIndex}_${boxIndex}" value="0" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>`;
                });

                rowboxesHtml += "</form>";

                return rowboxesHtml;
            }
        });
    </script>



    @endsection