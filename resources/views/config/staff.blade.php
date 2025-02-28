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
</head>
<style>
    .is-invalid {
        border: 1px solid red !important;
        background-color: #ffe6e6;
    }
</style>
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

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Success Message -->
                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                    <!-- Signup modal content -->
                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                            <h4 class="mb-0"><b>Add Staff</b></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('add-staff') }}" class="mt-4">
                                        @csrf
                                        <div class="row">

                                            <!-- Staff Name -->
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="st_name" class="form-control" placeholder="Full Name" required >
                                                </div>
                                            </div>

                                            <!-- First Name -->
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="st_first_name" class="form-control" placeholder="First Name" required>
                                                </div>
                                            </div>

                                            <!-- Middle Name -->
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="st_middle_name" class="form-control" placeholder="Middle Name (Optional)" >
                                                </div>
                                            </div>

                                            <!-- Last Name -->
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="st_last_name" class="form-control" placeholder="Last Name" required >
                                                </div>
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="st_phone" class="form-control" placeholder="Phone Number" required>
                                                </div>
                                            </div>

                                            <!-- Specialties (Checkboxes) -->
                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">

                                                    <input type="hidden" name="anesthesiologist" value="0">
                                                    <input type="checkbox" role="switch" name="anesthesiologist" id="anesthesiologist" value="1" class="form-check-input">
                                                    <label for="anesthesiologist" class="form-check-label">Anesthesiologist</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="cardiologist" value="0">
                                                    <input type="checkbox" role="switch" name="cardiologist" id="cardiologist" value="1" class="form-check-input">
                                                    <label for="cardiologist" class="form-check-label">Cardiologist</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">

                                                    <input type="hidden" name="crna" value="0">
                                                    <input type="checkbox" name="crna" id="crna" value="1" class="form-check-input" role="switch">
                                                    <label for="crna" class="form-check-label">CRNA</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">

                                                    <input type="hidden" name="family_md" value="0">
                                                    <input type="checkbox" name="family_md" id="family_md" value="1" class="form-check-input" role="switch">
                                                    <label for="family_md" class="form-check-label">Family MD</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="perfusionist" value="0">
                                                    <input type="checkbox" role="switch" name="perfusionist" id="perfusionist" value="1" class="form-check-input">
                                                    <label for="perfusionist" class="form-check-label">Perfusionist</label>

                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">

                                                    <input type="hidden" name="physician_assistant" value="0">
                                                    <input type="checkbox" role="switch" name="physician_assistant" id="physician_assistant" value="1" class="form-check-input">
                                                    <label for="physician_assistant" class="form-check-label">Physician Assistant</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="surgeon" value="0">
                                                    <input type="checkbox" role="switch" name="surgeon" id="surgeon" value="1" class="form-check-input">
                                                    <label for="surgeon" class="form-check-label">Surgeon</label>
                                                </div>
                                            </div>

                                            <!-- Staff Active (Checkbox) -->
                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="st_active" value="0">
                                                    <input type="checkbox" name="st_active" id="st_active" value="1" class="form-check-input" role="switch">
                                                    <label for="st_active" class="form-check-label">Active</label>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add Staff</button>
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
                                            <i class="fas fa-plus"></i> Add Staff
                                        </button>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Phone</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff as $index => $item)
                                                <tr>
                                                    <td>{{ $item->st_id }}</td>
                                                    <td>{{ $item->st_name }}</td>
                                                    <td>{{ $item->st_first_name }}</td>
                                                    <td>{{ $item->st_middle_name ?? '-' }}</td>
                                                    <td>{{ $item->st_last_name }}</td>
                                                    <td>{{ $item->st_phone }}</td>
                                                    <td>
                                                        @if ($item->st_active == '1')
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a onclick="editStaff({{ json_encode($item) }})" href="javascript:void(0);" class="text-primary">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ route('delete-staff', $item->st_id) }}')" class="text-danger">
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
                                    <h4 class="mb-0"><b>Edit Staff</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form method="POST" action="{{ route('edit-staff') }}" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="st_id" id="st_id">
                                    <div class="row">


                                        <!-- Staff Name -->
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="st_name" class="form-control" placeholder="Full Name" required id="st_name">
                                            </div>
                                        </div>

                                        <!-- First Name -->
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="st_first_name" class="form-control" placeholder="First Name" required id="st_fn">
                                            </div>
                                        </div>

                                        <!-- Middle Name -->
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="st_middle_name" class="form-control" placeholder="Middle Name (Optional)" id="st_mn">
                                            </div>
                                        </div>

                                        <!-- Last Name -->
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="st_last_name" class="form-control" placeholder="Last Name" required id="st_ln">
                                            </div>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="st_phone" class="form-control" placeholder="Phone Number" id="phone" required>
                                            </div>
                                        </div>

                                        <!-- Specialties (Checkboxes) -->
                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="anesthesiologist" value="0">
                                                <input type="checkbox" role="switch" name="anesthesiologist" id="anesthesiologist1" value="1" class="form-check-input">
                                                <label for="anesthesiologist1" class="form-check-label">Anesthesiologist</label>

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="cardiologist" value="0">
                                                <input type="checkbox" role="switch" name="cardiologist" id="cardiologist1" value="1" class="form-check-input">
                                                <label for="cardiologist1" class="form-check-label">Cardiologist</label>

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="crna" value="0">
                                                <input type="checkbox" role="switch" name="crna" id="crna1" value="1" class="form-check-input">
                                                <label for="crna1" class="form-check-label">CRNA</label>

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">

                                                <input type="hidden" name="family_md" value="0">
                                                <input type="checkbox" role="switch" name="family_md" id="family_md1" value="1" class="form-check-input">
                                                <label for="family_md1" class="form-check-label">Family MD</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="perfusionist" value="0">
                                                <input type="checkbox" role="switch" name="perfusionist" id="perfusionist1" value="1" class="form-check-input">
                                                <label for="perfusionist1" class="form-check-label">Perfusionist</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">

                                                <input type="hidden" name="physician_assistant" value="0">
                                                <input type="checkbox" role="switch" name="physician_assistant" id="physician_assistant1" value="1" class="form-check-input">
                                                <label for="physician_assistant1" class="form-check-label">Physician Assistant</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="surgeon" value="0">
                                                <input type="checkbox" name="surgeon" id="surgeon1" value="1" class="form-check-input">
                                                <label for="surgeon1" class="form-check-label">Surgeon</label>
                                            </div>
                                        </div>

                                        <!-- Staff Active (Checkbox) -->
                                        <div class="col-lg-12">
                                            <div class="form-group form-switch mb-3">
                                                <input type="hidden" name="st_active" value="0">
                                                <input type="checkbox" role="switch" name="st_active" id="st_active1" value="1" class="form-check-input">
                                                <label for="st_active1" class="form-check-label">Active</label>
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn w-100 btn-dark">Edit Staff</button>
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
                "paging": true, // Enable pagination
                "lengthChange": true, // Allow user to change the number of records per page
                "searching": true, // Enable search functionality
                "ordering": true, // Enable column sorting
                "info": true, // Display info like "Showing 1 to 10 of 50 entries"
                "autoWidth": false // Disable automatic column width adjustment
            });
        });
    </script>
   <script>
    function editStaff(staff) {
        console.log(staff);
        document.getElementById("st_id").value = staff.st_id;
        document.getElementById("st_name").value = staff.st_name;
        document.getElementById("st_fn").value = staff.st_first_name;
        document.getElementById("st_mn").value = staff.st_middle_name ?? "";
        document.getElementById("st_ln").value = staff.st_last_name;
        document.getElementById("phone").value = staff.st_phone;

        // Checkboxes for specialties
        document.getElementById("anesthesiologist1").checked = staff.anesthesiologist == 1;
        document.getElementById("cardiologist1").checked = staff.cardiologist == 1;
        document.getElementById("crna1").checked = staff.crna == 1;
        document.getElementById("family_md1").checked = staff.family_md == 1;
        document.getElementById("perfusionist1").checked = staff.perfusionist == 1;
        document.getElementById("physician_assistant1").checked = staff.physician_assistant == 1;
        document.getElementById("surgeon1").checked = staff.surgeon == 1;
        // Active checkbox
        document.getElementById("st_active1").checked = staff.st_active == 1;
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
