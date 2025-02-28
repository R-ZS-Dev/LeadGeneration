@extends('layouts.app')
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .is-invalid {
                border: 1px solid red !important;
                background-color: #ffe6e6;
            }
        </style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            @include('layouts.TopNav')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                @include('layouts.SideBar')
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        {{-- <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">All Hospitals</h4> --}}
                        {{-- <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">All Hospitals</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
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
                                                    <input type="text" name="hos_name" id="hosname"
                                                        value="{{ old('hos_name') }}" class="form-control"
                                                        placeholder="Name" required>
                                                    @error('hos_name')
                                                        <small
                                                            class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="zip_code" id="zipcode"
                                                        value="{{ old('zip_code') }}" class="form-control"
                                                        placeholder="Zip code">
                                                    @error('zip_code')
                                                        <small
                                                            class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="region" id="region"
                                                        value="{{ old('region') }}" class="form-control"
                                                        placeholder="region">

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="national_pro_id" id="nationalPro"
                                                        value="{{ old('national_pro_id') }}" class="form-control"
                                                        placeholder="National Provider Identifier">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-2">
                                                    <input type="hidden" name="active" value="0">
                                                    <input type="checkbox" role="switch" name="active" id="active"
                                                        value="1" class="form-check-input"
                                                        {{ old('active') ? 'checked' : '' }}
                                                        >
                                                    <label for="active" class="form-check-label">Active</label>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-end">

                                        <button type="button"
                                            class="btn waves-effect waves-light mb-2 btn-outline-primary"
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
                                                <tr>
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
                                                            onclick="confirmDelete('{{ route('delete-hospital', $hos->hos_id) }}')"
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
                                                <input type="text" name="hos_name" id="edithosname"
                                                    value="{{ old('hos_name') }}" class="form-control"
                                                    placeholder="Name" required>
                                                @error('hos_name')
                                                    <small
                                                        class="text-danger d-block text-start">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="zip_code" id="editzipcode"
                                                    value="{{ old('zip_code') }}" class="form-control"
                                                    placeholder="Zip code">
                                                @error('zip_code')
                                                    <small
                                                        class="text-danger d-block text-start">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="region" id="editregion"
                                                    value="{{ old('region') }}" class="form-control"
                                                    placeholder="region">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="national_pro_id" id="editnationalproid"
                                                    value="{{ old('national_pro_id') }}" class="form-control"
                                                    placeholder="National Provider Identifier">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="active" value="0">
                                                <input type="checkbox" name="active" id="editactive" value="1"
                                                    class="form-check-input" {{ old('active') ? 'checked' : '' }} role="switch"
                                                    >
                                                <label for="active" class="form-check-label">Active</label>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn w-100 btn-dark ">Edit Hospital</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                @include('layouts.Footer')
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include jQuery and DataTables CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
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
        function editHospital(hospital) {
            document.getElementById("hos_id").value = hospital.hos_id;
            document.getElementById("edithosname").value = hospital.hos_name;
            document.getElementById("editzipcode").value = hospital.zip_code;
            document.getElementById("editregion").value = hospital.region;
            document.getElementById("editnationalproid").value = hospital.national_pro_id;
            document.getElementById("editactive").value = hospital.active;
            document.getElementById("editactive").checked = hospital.active == 1;
            // Show modal
            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
            editModal.show();
        }
    </script>
    <script>
        function confirmDelete(url) {
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
                    window.location.href = url; // Redirect to delete route
                }
            });
        }
    </script>
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener("submit", function (event) {
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
            document.addEventListener("input", function (event) {
                const input = event.target;
                if (input.value.trim() !== "") {
                    input.classList.remove("is-invalid");
                }
            });
        });
    </script>
</body>

</html>
