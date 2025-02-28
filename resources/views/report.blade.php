@extends('layouts.app')
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            @include('layouts.TopNav')
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                @include('layouts.SideBar')
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <!-- modal start -->
                    <div id="report-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="text-center mt-2 mb-4">
                                        Add New Report
                                    </div>


                                    <form method="POST" action="{{ route('reports.store') }}" class="mt-4" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="text" name="report_name" placeholder="Report name" value="{{ old('report_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="text" name="address1" placeholder="Address1" value="{{ old('address1') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="text" name="address2" placeholder="Address2" value="{{ old('address2') }}" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <label class="form-label">Header Image</label>
                                                        <input type="file" name="header_image" id="headerfileInput" class="d-none" accept="image/*" onchange="previewImage(event, 'headerPreview')" required>
                                                        <div class="preview-container">
                                                            <img id="headerPreview"
                                                                src="{{ optional(Auth::user()->company)->header_image ? asset('storage/uploads/' . Auth::user()->company->header_image) : asset('storage/uploads/default.jpg') }}"
                                                                alt="Header Image"
                                                                class="img-fluid rounded mt-2"
                                                                style="max-width: 200px; cursor: pointer;"
                                                                onclick="document.getElementById('headerfileInput').click();">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <label class="form-label">Footer Image</label>
                                                        <input type="file" name="footer_image" id="footerfileInput" class="d-none" accept="image/*" onchange="previewImage(event, 'footerPreview')" required>
                                                        <div class="preview-container">
                                                            <img id="footerPreview"
                                                                src="{{ optional(Auth::user()->company)->footer_image ? asset('storage/uploads/' . Auth::user()->company->footer_image) : asset('storage/uploads/default.jpg') }}"
                                                                alt="Footer Image"
                                                                class="img-fluid rounded mt-2"
                                                                style="max-width: 200px; cursor: pointer;"
                                                                onclick="document.getElementById('footerfileInput').click();">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark" data-action="Add new report" data-alert="Are you sure you want to add new report?">Add</button>
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
                                        <button type="button" class="btn waves-effect waves-light btn-outline-primary" data-bs-toggle="modal" data-bs-target="#report-modal">
                                            <i class="fas fa-plus"></i> Add Report
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <table id="reports-table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Report Name</th>
                                                <th>Address1</th>
                                                <th>Address2</th>
                                                <th>Header Image</th>
                                                <th>Footer Image</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach($reports as $report)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $report->report_name }}</td>
                                                <td>{{ $report->address1 }}</td>
                                                <td>{{ $report->address2 }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/uploads/' . $report->header_image) }}" alt="Header Image" class="img-thumbnail" width="80">
                                                </td>
                                                <td>
                                                    <img src="{{ asset('storage/uploads/' . $report->footer_image) }}" alt="Footer Image" class="img-thumbnail" width="80">
                                                </td>
                                                <td>{{ $report->created_at->format('Y-m-d H:i') }}</td>
                                                <td class="text-center d-flex">
                                                    <!-- Edit Button -->
                                                    <button type="button" class="edit-user mx-2 p-0 border" data-bs-toggle="modal" data-bs-target="#report-modal" data-id="{{ $report->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <!-- Delete Form -->
                                                    <form method="POST" action="{{ route('reports.destroy', $report->id) }}" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-1 border">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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
            </div>
            <footer class="footer text-center text-muted">
                @include('layouts.Footer')
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>

    <!-- Include jQuery and DataTables CDN -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize the DataTable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users-table').DataTable({
                "paging": true, // Enable pagination
                "lengthChange": false, // Allow user to change the number of records per page
                "searching": true, // Enable search functionality
                "ordering": true, // Enable column sorting
                "info": true, // Display info like "Showing 1 to 10 of 50 entries"
                "autoWidth": false // Disable automatic column width adjustment

            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("button[type='submit']").forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault(); // Stop form submission until confirmed

                    let form = this.closest("form"); // Get the nearest form
                    let actionName = this.getAttribute("data-action") || "Confirm Action"; // Get action name
                    let message = this.getAttribute("data-alert") || "Are you sure you want to proceed?";

                    Swal.fire({
                        title: `${actionName}`, // Dynamic title
                        text: message,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, proceed",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Processing...",
                                text: "Please wait while we update your data.",
                                icon: "info",
                                allowOutsideClick: false,
                                showConfirmButton: false
                            });

                            setTimeout(() => {
                                form.submit(); // Submit the form after alert closes
                            }, 2000); // Adjust delay as needed
                        }
                    });
                });
            });
        });
    </script>

    <script>
        function previewImage(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById(previewId).src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>