@extends('sitemaster.master-layout')
@section('title','All Reports')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- modal start -->
            <div id="report-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Add Report</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <form method="POST" action="{{ route('add-report') }}" class="mt-4"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input class="form-control" type="text" name="report_name"
                                                placeholder="Report name" value="{{ old('report_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input class="form-control" type="text" name="address1"
                                                placeholder="Address1" value="{{ old('address1') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input class="form-control" type="text" name="address2"
                                                placeholder="Address2" value="{{ old('address2') }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <div class="row mx-auto justify-content-center">
                                                    <center>
                                                        <label for="" class="mx-auto">Header Image</label>
                                                    </center>
                                                    <label class="upload-container mx-auto">
                                                        <input type="file" accept="file/*" class=""
                                                            onchange="displayPreview(this, 'previewImage1', 'uploadText1', 'fileName1')"
                                                            name="rep_headimage" />
                                                        <img class="preview-image-1" id="previewImage1" alt=""
                                                            src="{{ asset('uploads/' . 'default.png') }}">

                                                        <div class="upload-text-1" id="uploadText1">
                                                            <div class="row">
                                                                <i class="fe fe-image imgicn"></i>
                                                            </div>
                                                            Upload your media
                                                        </div>
                                                        <button class="button edit-button"> <i
                                                                class="fe fe-edit-3"></i></button>
                                                    </label>
                                                    <div class="file-name text-center" id="fileName1">
                                                        <p>
                                                        <div class="file-name-1" id="fileName1">No file selected</div>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <div class="row mx-auto justify-content-center">
                                                    <center>
                                                        <label for="" class="mx-auto">Footer Image</label>
                                                    </center>
                                                    <label class="upload-container">
                                                        <input type="file" accept="image/*"
                                                            onchange="displayPreview(this, 'previewImage', 'uploadText', 'fileName')"
                                                            name="rep_footimage" />
                                                        <img src="{{ asset('uploads/' . 'default.png') }}"
                                                            class="preview-image" id="previewImage" alt="">
                                                        <div class="upload-text" id="uploadText">
                                                            <div class="row">
                                                                <i class="fe fe-image imgicn"></i>
                                                            </div>
                                                            select photo
                                                        </div>
                                                        <button class="button edit-button"> <i
                                                                class="fe fe-edit-3"></i></button>
                                                    </label>
                                                    <div class="file-name text-center" id="fileName">
                                                        <p>
                                                        <div class="file-name" id="fileName">No file selected</div>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="rep_active" value="0">
                                            <input type="checkbox" name="rep_active" id="active" value="1"
                                                class="form-check-input" checked role="switch">
                                            <label for="active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn w-100 btn-dark">Add Report</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- modal end -->

            <div class="col-12 mt-2">
                <div class="card m-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button type="button" class="btn waves-effect waves-light btn-outline-primary mb-2"
                                    data-bs-toggle="modal" data-bs-target="#report-modal">
                                    <i class="fas fa-plus"></i> Add Report
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Report Name</th>
                                        <th>Address1</th>
                                        <th>Address2</th>
                                        <th>Header Image</th>
                                        <th>Footer Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($reports as $report)
                                        <tr id="row-{{ $report->rep_id }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $report->report_name }}</td>
                                            <td>{{ $report->rep_address1 }}</td>
                                            <td>{{ $report->rep_address2 }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $report->rep_headimage) }}"
                                                    alt="Header Image" class="img-thumbnail" width="80">
                                            </td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $report->rep_footimage) }}"
                                                    alt="Footer Image" class="img-thumbnail" width="80">
                                            </td>
                                            <td>
                                                @if ($report->rep_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick='editReport(@json($report))'
                                                    href="javascript:void(0);" class="text-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-report', $report->rep_id) }}','{{ $report->rep_id }}')"
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
        <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Edit Report</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('edit-report') }}" class="mt-4"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="rep_id" id="rep_id">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="report_name"
                                            placeholder="Report name" value="{{ old('report_name') }}" id="edit-name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="address1"
                                            placeholder="Address1" value="{{ old('address1') }}" id="edit-address1"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="address2"
                                            placeholder="Address2" value="{{ old('address2') }}" id="edit-address2"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <div class="row mx-auto justify-content-center">
                                                <center>
                                                    <label for="" class="mx-auto">Header Image</label>
                                                </center>
                                                <label class="upload-container">
                                                    <input type="file" accept="image/*"
                                                        onchange="displayPreview(this, 'edit_previewImage2', 'edit_uploadText2', 'edit_fileName2')"
                                                        name="rep_headimage" />
                                                    <img src="" class="preview-image" id="edit_previewImage2"
                                                        alt="">
                                                    <div class="upload-text" id="edit_uploadText2">
                                                        <div class="row">
                                                            <i class="fe fe-image imgicn"></i>
                                                        </div>
                                                        Upload header image
                                                    </div>
                                                    <button class="button edit-button"> <i
                                                            class="fe fe-edit-3"></i></button>
                                                </label>
                                                <div class="file-name text-center" id="edit_fileName2">
                                                    <p>
                                                    <div class="file-name">No file selected</div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <div class="row mx-auto justify-content-center">
                                                <center>
                                                    <label for="" class="mx-auto">Footer Image</label>
                                                </center>
                                                <label class="upload-container mx-auto">
                                                    <input type="file" accept="file/*" class=""
                                                        onchange="displayPreview(this, 'edit_previewImage1', 'edit_uploadText1', 'edit_fileName1')"
                                                        name="rep_footimage" />
                                                    <img class="preview-image-1" id="edit_previewImage1" alt="">

                                                    <div class="upload-text-1" id="edit_uploadText1">
                                                        <div class="row">
                                                            <i class="fe fe-image imgicn"></i>
                                                        </div>
                                                        Upload footer image
                                                    </div>
                                                    <button class="button edit-button"> <i
                                                            class="fe fe-edit-3"></i></button>
                                                </label>
                                                <div class="file-name text-center" id="edit_fileName1">
                                                    <p>
                                                    <div class="file-name-1" id="edit_fileName1">No file selected</div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="rep_active" value="0">
                                            <input type="checkbox" name="rep_active" id="edit-active" value="1"
                                                class="form-check-input" checked role="switch">
                                            <label for="edit-active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" data-action="Add new report">Update
                                        Report</button>
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
        function editReport(rep) {
            // console.log(res);
            document.getElementById("rep_id").value = rep.rep_id;
            document.getElementById("edit-name").value = rep.report_name;
            document.getElementById("edit-address1").value = rep.rep_address1;
            document.getElementById("edit-address2").value = rep.rep_address2;
            document.getElementById("edit-active").checked = rep.rep_active == 1;
            const imageElement = document.getElementById('edit_previewImage1');
            const fileNameDisplay = document.getElementById('edit_fileName1');
            const imageElement2 = document.getElementById('edit_previewImage2');
            const fileNameDisplay2 = document.getElementById('edit_fileName2');

            if (rep.rep_footimage) {
                // alert('dskj');
                const imagePath = `/uploads/${rep.rep_footimage}`;
                imageElement.src = imagePath;
                imageElement.alt =
                    `Preview of ${rep.rep_footimage || 'Image'}`;
                imageElement.style.display = 'block';
                fileNameDisplay.innerText = rep.rep_footimage;
            } else {
                imageElement.src = '';
                imageElement.alt = 'No preview available';
                imageElement.style.display = 'none';
            }
            if (rep.rep_headimage) {
                const imagePath = `/uploads/${rep.rep_headimage}`;
                imageElement2.src = imagePath;
                imageElement2.alt =
                    `Preview of ${rep.rep_headimage || 'Image'}`;
                imageElement2.style.display = 'block';
                fileNameDisplay2.innerText = rep.rep_headimage;
            } else {
                imageElement2.src = '';
                imageElement2.alt = 'No preview available';
                imageElement2.style.display = 'none';
            }
            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
            editModal.show();
        }
    </script>
    <script>
        function displayPreview(input, previewImageId, uploadTextId, fileNameId) {
            const previewImage = document.getElementById(previewImageId);
            const uploadText = document.getElementById(uploadTextId);
            const fileName = document.getElementById(fileNameId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    uploadText.style.display = 'none';
                    fileName.textContent = input.files[0].name;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                previewImage.style.display = 'none';
                uploadText.style.display = 'block';
                fileName.textContent = "No file selected";
            }
        }
    </script>
@endsection
