@extends('sitemaster.master-layout')
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
                            <h4 class="mb-0"><b>Add General Event</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('add-gevent') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="">Note</label>
                                    <input type="text" name="note" id="note" value="{{ old('note') }}" class="form-control" placeholder="Note" required>
                                    @error('note')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="g_description">Description</label>
                                    <textarea name="g_description" id="g_description" class="form-control" rows="4" placeholder="Enter Description..." required>{{ old('g_description') }}</textarea>
                                    @error('g_description')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="g_display">Display</label>
                                    <textarea name="g_display" id="g_display" class="form-control" rows="4" placeholder="Enter Display..." required>{{ old('g_display') }}</textarea>
                                    @error('g_display')
                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-2">
                                    <input type="hidden" name="g_quick" value="0">
                                    <input type="checkbox" role="switch" name="g_quick" id="g_quick" checked
                                        value="1" class="form-check-input"
                                        {{ old('g_quick') ? 'checked' : '' }}>
                                    <label for="g_quick" class="form-check-label">Quick</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-switch mb-2">
                                    <input type="hidden" name="g_active" value="0">
                                    <input type="checkbox" role="switch" name="g_active" id="g_active" checked
                                        value="1" class="form-check-input"
                                        {{ old('g_active') ? 'checked' : '' }}>
                                    <label for="g_active" class="form-check-label">Active</label>
                                </div>
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
                            <i class="fas fa-plus"></i> Add Event
                        </button>

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Note</th>
                                <th>Description</th>
                                <th>Display</th>
                                <th>Quick</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($showevents as $index => $showevent)
                            <tr id="row-{{ $showevent->g_id }}">
                                <td>{{ ++$i }}</td>
                                <td>{{ $showevent->note }}</td>
                                <td>{{ $showevent->g_description }}</td>
                                <td>{{ $showevent->g_display }}</td>
                                <td>
                                    @if ($showevent->g_quick == '1')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($showevent->g_active == '1')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="editGeneralEvent({{ json_encode($showevent) }})"
                                        href="javascript:void(0);">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    {{-- <a href="javascript:void(0);"
                                        onclick="confirmDelete('{{ route('delete-gevent', $showevent->g_id) }}', 'row-{{ $showevent->g_id }}')"
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

{{-- /* --------------------------- edit general modal -------------------------- */ --}}
<div id="editGeneralEventModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body ">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h4 class="mb-0"><b>Edit General Event</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('edit-gevent') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="g_id" id="g_id">
                            <div class="form-group mb-3">
                                <label for="">Note</label>
                                <input type="text" name="note" id="editnote"
                                    value="{{ old('note') }}" class="form-control"
                                    placeholder="Name" required>
                                @error('note')
                                <small
                                    class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="g_description">Description</label>
                                <textarea name="g_description" id="editg_description" class="form-control" rows="4" placeholder="Enter Description...">{{ old('g_description') }}</textarea>
                                @error('g_description')
                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="g_display">Display</label>
                                <textarea name="g_display" id="editg_display" class="form-control" rows="4" placeholder="Enter Display...">{{ old('g_display') }}</textarea>
                                @error('g_display')
                                <small class="text-danger d-block text-start">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group form-switch mb-2">
                                <input type="hidden" name="g_quick" value="0">
                                <input type="checkbox" role="switch" name="g_quick" id="editg_quick"
                                    value="1" class="form-check-input"
                                    {{ old('g_quick') ? 'checked' : '' }}>
                                <label for="editg_quick" class="form-check-label">Quick</label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group form-switch mb-2">
                                <input type="hidden" name="g_active" value="0">
                                <input type="checkbox" role="switch" name="g_active" id="editg_active"
                                    value="1" class="form-check-input"
                                    {{ old('g_active') ? 'checked' : '' }}>
                                <label for="editg_active" class="form-check-label">Active</label>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn w-100 btn-dark ">Update general event</button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
    function editGeneralEvent(generalEvent) {
        console.log(generalEvent);

        document.getElementById("g_id").value = generalEvent.g_id;
        document.getElementById("editnote").value = generalEvent.note;
        document.getElementById("editg_description").value = generalEvent.g_description;
        document.getElementById("editg_display").value = generalEvent.g_display;
        document.getElementById("editg_active").checked = generalEvent.g_active == 1;
        document.getElementById("editg_quick").checked = generalEvent.g_quick == 1;
        // Show modal
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

<script>
    function confirmDelete(url, rowId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: document.title + ' deleted successfully!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Fade out the deleted row
                            $("#" + rowId).fadeOut("slow", function() {
                                $(this).remove();
                            });
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Failed to delete the event.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the event.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>

<script>
    // function confirmDelete(url) {
    //     if (confirm('Are you sure you want to delete this event?')) {
    //         $.ajax({
    //             url: url,
    //             type: 'DELETE',
    //             data: {
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(response) {
    //                 if (response.success) {
    //                     alert('General Event deleted successfully!');
    //                     location.reload();
    //                 } else {
    //                     alert('Failed to delete the event.');
    //                 }
    //             },
    //             error: function(xhr) {
    //                 alert('An error occurred while deleting the event.');
    //             }
    //         });
    //     }
    // }
</script>
@endsection
