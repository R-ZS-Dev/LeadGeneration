@extends('sitemaster.master-layout')
@section('title', 'Case general event')
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
                                <h4 class="mb-0"><b>Add General Event</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('add-general-event') }}" class="mt-4">
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
                                    <label for="">Date</label>
                                    <input type="date" name="cge_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <label for="">Time</label>
                                    <input type="time" name="cge_time" class="form-control" value="{{ old('cge_time', date('H:i')) }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="">Select Note</label>
                                    <select name="cge_note" id="" class="form-control" required>
                                        <option value="">Select Note</option>
                                        @foreach ($cgevents as $cgevent)
                                        <option value="{{ $cgevent->g_id }}">{{ $cgevent->note }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                        Add general event
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
                                <i class="fas fa-plus"></i> Add General Event
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
                                @foreach ($caseGeneralEvents as $index => $caseGeneralEvent)
                                <tr id="row-{{ $caseGeneralEvent->cge_id }}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{$caseGeneralEvent->cge_date}}</td>
                                    <td>{{ \Carbon\Carbon::parse($caseGeneralEvent->cge_time)->format('H:i A') }}</td>
                                    <td>{{ optional($caseGeneralEvent->note)->note }}</td>

                                    <td>
                                        <a onclick="editGeneralEvent({{ json_encode($caseGeneralEvent) }})" href="javascript:void(0);">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete('{{ route('delete-general-event', $caseGeneralEvent->cge_id) }}', '{{ $caseGeneralEvent->cge_id }}')"
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

    {{-- /* --------------------------- edit case general event modal -------------------------- */ --}}
    <div id="editGeneralEventModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Edit General Event</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('edit-general-event') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="cge_id" id="cge_id">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <label for="pat_id">Select Patient</label>
                                <select name="pat_id" id="editpat_id" class="form-control" required>
                                    <option value="">Select Patient</option>
                                    @foreach ($patients as $item)
                                    <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label for="">Date</label>
                                <input type="date" name="cge_date" id="editcge_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label for="">Time</label>
                                <input type="time" name="cge_time" id="editcge_time" class="form-control" value="{{ old('cge_time', date('H:i')) }}">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Select Note</label>
                                <select name="cge_note" id="editcge_note" class="form-control" required>
                                    <option value="">Select Note</option>
                                    @foreach ($cgevents as $cgevent)
                                    <option value="{{ $cgevent->g_id }}">{{ $cgevent->note }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                                    Add general event
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        function editGeneralEvent(generalEvent) {
            // console.log(generalEvent);
            document.getElementById("cge_id").value = generalEvent.cge_id;
            document.getElementById("editpat_id").value = generalEvent.pat_id;
            document.getElementById("editcge_date").value = generalEvent.cge_date;
            document.getElementById("editcge_time").value = generalEvent.cge_time;
            document.getElementById("editcge_note").value = generalEvent.cge_note;
            
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
    @endsection