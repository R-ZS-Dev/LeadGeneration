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

    <style>
        /* Align the search bar and pagination to the right */
        .dataTables_filter {
            float: right;
        }

        .dataTables_paginate {
            float: right;
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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <!-- @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif -->

                    <!-- Success Message -->
                    <!-- <div id="successMessage" class="alert alert-success" style="display: none;"></div> -->

                    <!-- Signup modal content -->
                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="text-center mt-2 mb-4">
                                        Add New User
                                    </div>

                                    <form id="registerForm" method="POST" action="{{ route('register') }}" class="mt-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="text" name="first_name" placeholder="First name" value="{{ old('first_name') }}">
                                                    @error('first_name')
                                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="text" name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                                    @error('email')
                                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                                    <small id="password-error" class="text-danger d-block text-start"></small>
                                                    @error('password')
                                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm password" required>
                                                    <small id="confirm-password-error" class="text-danger d-block text-start"></small>
                                                    @error('password_confirmation')
                                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 text-start">Gender
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input type="radio" id="radio1" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} checked> Male
                                                        </label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" value="Female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female
                                                        </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <input class="form-control" type="number" name="phone_number" placeholder="phone number" value="{{ old('phone_number') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3 text-start">
                                                    <select class="form-select mr-sm-2" name="role" id="inlineFormCustomSelect">
                                                        <option disabled selected>Role</option>
                                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control" rows="3" name="address" placeholder="Address" value="{{ old('address') }}"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark">Register</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <div class="col-12 mt-2">
                        <div class="card m-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <!-- <button type="button" class="btn waves-effect waves-light btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">
                                            <i class="fas fa-plus"></i> Add user
                                        </button> -->
                                        @if(session('role') === 'admin')
                                        <button type="button" class="btn waves-effect waves-light btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">
                                            <i class="fas fa-plus"></i> Add user
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach($users as $index => $user)
                                            @if($user->status == 1)
                                            @if(Auth::user()->role == 'admin' || $user->role != 'admin')
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td class="text-center">
                                                    @if($index != 0)
                                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-action="Delete" data-alert="Are you sure you want to delete this user?" class="btn btn-danger btn-circle">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let passwordField = document.getElementById('password');
            let confirmPasswordField = document.getElementById('confirm-password');
            let passwordError = document.getElementById('password-error');
            let confirmPasswordError = document.getElementById('confirm-password-error');

            let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            passwordField.addEventListener('input', function() {
                if (!passwordPattern.test(passwordField.value)) {
                    passwordError.textContent = "Password must have at least 8 characters, an uppercase letter, a lowercase letter, a number, and a special character.";
                } else {
                    passwordError.textContent = "";
                }
            });

            confirmPasswordField.addEventListener('input', function() {
                confirmPasswordError.textContent = confirmPasswordField.value === passwordField.value ? "" : "Passwords do not match.";
            });

            document.querySelector('form').addEventListener('submit', function(event) {
                if (!passwordPattern.test(passwordField.value)) {
                    event.preventDefault(); // Prevent form submission if password is invalid
                    passwordError.textContent = "Password does not meet requirements.";
                }
                if (confirmPasswordField.value !== passwordField.value) {
                    event.preventDefault();
                    confirmPasswordError.textContent = "Passwords do not match.";
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#registerForm").submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                let formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    type: "POST",
                    url: "{{ route('register') }}",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Store success message in sessionStorage
                            sessionStorage.setItem('successMessage', response.message);

                            // Redirect user to all-users page
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $(".text-danger").text(""); // Clear previous errors

                        $.each(errors, function(key, value) {
                            $("input[name=" + key + "]").next(".text-danger").text(value);
                        });
                    }
                });
            });
        });

        // Display success message on all-users page if available
        $(document).ready(function() {
            let successMessage = sessionStorage.getItem('successMessage');
            if (successMessage) {
                $("#successMessage").text(successMessage).show();
                sessionStorage.removeItem('successMessage'); // Clear the stored message
            }
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
</body>

</html>