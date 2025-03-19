@extends('sitemaster.master-layout')
@section('title', 'Case check list')
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
                                <h4 class="mb-0"><b>Add Check List</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('add-check-list') }}" class="mt-4">
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
                                    <select name="cl_id" id="config_checklist" class="form-control" required>
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
                                    <th>Patient Name</th>
                                    <th>Checklist</th>
                                    <th>Checklist Group</th>
                                    <th>Checklist Items</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($viewCListrecords as $record)
                                <tr id="row-{{ $record->ccl_id }}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $record->patient->first_name ?? 'N/A' }}</td>
                                    <td>{{ $record->checklist->l_name ?? 'N/A' }}</td>
                                    <td>{{ $record->checklistGroup->clg_name ?? 'N/A' }}</td>
                                    <td id="truncated-text"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; cursor: pointer;"
                                        onclick="expandText(this)">

                                        @php
                                        $formattedItems = [];

                                        if (!empty($record->cl_items)) {
                                        // Decode the first level (array of JSON strings)
                                        $items = json_decode($record->cl_items, true);

                                        // Ensure $items is an array and decode the first element if necessary
                                        if (is_array($items) && isset($items[0]) && is_string($items[0])) {
                                        $decodedItems = json_decode($items[0], true);

                                        // If decoding was successful and resulted in an array
                                        if (is_array($decodedItems)) {
                                        foreach ($decodedItems as $key => $value) {
                                        $formattedItems[] = $key . ': ' . ($value ? 'Yes' : 'No');
                                        }
                                        }
                                        }
                                        }
                                        @endphp

                                        {{ $formattedItems ? implode(', ', $formattedItems) : 'N/A' }}
                                    </td>



                                    <td>
                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete('{{ route('delete-check-list', $record->ccl_id) }}', '{{ $record->ccl_id }}')"
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
    @endsection

    @section('script')

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
                            console.log(response);
                            if (response.success) {
                                var accordionHtml = "";
                                var cgIdInputs = ""; // ✅ Store hidden inputs separately
                                var groups = response.groups || [];

                                if (groups.length > 0) {
                                    groups.forEach(function(group, groupIndex) {
                                        var groupCollapseId = "groupCollapse" + groupIndex;

                                        // ✅ Add hidden input (but don't append yet)
                                        cgIdInputs += `<input type="hidden" name="cg_id" value="${group.clg_id}">`;

                                        accordionHtml += `
                                        <div class="accordion-item border rounded-0 mb-3">
                                            <h2 class="accordion-header" id="heading${groupIndex}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#${groupCollapseId}" aria-expanded="true"
                                                    aria-controls="${groupCollapseId}">
                                                    <div class="col-md-8 fw-bold">${group.clg_name}</div>
                                                </button>
                                            </h2>
                                            <div id="${groupCollapseId}" class="accordion-collapse collapse"
                                                aria-labelledby="heading${groupIndex}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    ${generateRowboxes(group.rowboxes, groupIndex)}
                                                </div>
                                            </div>
                                        </div>`;
                                    });

                                    // ✅ Append hidden inputs INSIDE the form
                                    $('form').append(cgIdInputs);

                                    $('#accordionExample').html(accordionHtml);
                                } else {
                                    $('#accordionExample').html(`<div class="text-danger">No groups found</div>`);
                                }
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

                var rowboxesHtml = `<form id="rowboxForm_${groupIndex}">`;

                // ✅ Correct JSON structure (store values as strings)
                var formattedData = {};

                rowboxes.forEach(function(box, boxIndex) {
                    formattedData[box] = "0"; // Default response as string "0"

                    rowboxesHtml += `
                    <div class="row mb-2 align-items-center">
                        <div class="col-md-8 fw-bold">${box}</div>
                        <div class="col-md-2">
                            <label>
                                <input type="radio" name="response_${groupIndex}_${boxIndex}" value="1" data-group="${groupIndex}" data-box="${box}" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label>
                                <input type="radio" name="response_${groupIndex}_${boxIndex}" value="0" checked data-group="${groupIndex}" data-box="${box}" />
                                <span>No</span>
                            </label>
                        </div>
                    </div>`;
                });

                // ✅ Convert JSON properly
                var formattedJson = JSON.stringify(formattedData);

                // ✅ Store formatted JSON inside hidden input
                rowboxesHtml += `<input type="hidden" name="cl_items[]" id="cl_items_${groupIndex}" value='${formattedJson}'>`;
                rowboxesHtml += `</form>`;

                return rowboxesHtml;
            }



            $(document).on('change', 'input[type=radio]', function() {
                var groupIndex = $(this).data('group');
                var boxName = $(this).data('box');
                var response = $(this).val();

                // ✅ Get existing JSON object
                var jsonData = JSON.parse($(`#cl_items_${groupIndex}`).val() || "{}");

                // ✅ Update only the relevant checkbox response
                jsonData[boxName] = parseInt(response);

                // ✅ Store updated JSON object
                $(`#cl_items_${groupIndex}`).val(JSON.stringify(jsonData));
            });



        });
    </script>



    @endsection