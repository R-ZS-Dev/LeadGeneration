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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style>
        td {
            height: 27px;
        }

        .gender-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }

        input[name='gender'] {
            -webkit-appearance: none;
            -moz-appearance: none;
            -o-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: none;
            cursor: pointer;
        }

        input[name='gender']:after {
            font-family: 'FontAwesome';
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 50px;
            width: 70px;
            height: 70px;
            line-height: 100px;
            content: attr(data-icon);
            border-radius: 50%;
            border: 2px solid rgba(0, 0, 0, 0.3);
            color: rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
        }

        input[name='gender']:checked:after {
            box-shadow: 2px 2px 14px rgba(0, 0, 0, 0.4);
            color: white;
            background-color: #793268;
        }
    </style>
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
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                @include('layouts.SideBar')
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <!-- Signup modal content -->
                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="text-center mt-2 mb-4">
                                        <h5 id="modal-title">Add New User</h5>
                                    </div>

                                    <form id="userForm" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" id="form-method" value="POST">
                                        <input type="hidden" name="user_id" id="user_id">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="">First Name</label>
                                                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="">Last Name</label>
                                                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="">Email</label>
                                                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6" id="password-fields">
                                                <div class="form-group mb-3">
                                                    <label for="">Password</label>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                                    <small id="password-error" class="text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" id="confirm-password-fields">
                                                <div class="form-group mb-3">
                                                    <label for="">Confirm Password</label>
                                                    <input class="form-control" type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm password" required>
                                                    <small id="confirm-password-error" class="text-danger"></small>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 text-start">
                                                    <div class="gender-container">
                                                        <label>
                                                            <input type="radio" name="gender" value="Male" id="gender-male" data-icon="" required>
                                                            <div class="text-center">
                                                                <label for="">Male</label>
                                                            </div>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="gender" value="Female" id="gender-female" data-icon="" required>
                                                            <div class="text-center">
                                                                <label for="">Female</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="Phone number"></label>
                                                    <input class="form-control" type="text" name="phone_number" id="phone_number" placeholder="Phone number" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3 text-start">
                                                    <label for="">Role</label>
                                                    <select class="form-select" name="role" id="role" required>
                                                        <option disabled selected>Role</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark" id="submit-button">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

                    <div class="col-12 mt-2">
                        <div class="card m-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-end">
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
                                                @if(Auth::user()->role === 'admin') {{-- Only show Action column for admins --}}
                                                <th>Action</th>
                                                @endif
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

                                                @if(Auth::user()->role == 'admin') {{-- Only show delete button for admins --}}
                                                <td class="text-center d-flex">
                                                    @if($index != 0)
                                                    <button type="button" class="edit-user mx-2 p-0 border" data-bs-toggle="modal" data-bs-target="#signup-modal" data-id="{{ $user->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-1 border">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                                @endif
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
        // document.addEventListener("DOMContentLoaded", function() {
        //     const form = document.getElementById("userForm");
        //     const firstName = document.getElementById("first_name");
        //     const lastName = document.getElementById("last_name");
        //     const email = document.getElementById("email");
        //     const password = document.getElementById("password");
        //     const confirmPassword = document.getElementById("confirm-password");
        //     const phoneNumber = document.getElementById("phone_number");
        //     const role = document.getElementById("role");
        //     const submitButton = document.getElementById("submit-button");

        //     function showError(input, message) {
        //         let errorElement = input.nextElementSibling;
        //         if (!errorElement || !errorElement.classList.contains("text-danger")) {
        //             errorElement = document.createElement("small");
        //             errorElement.classList.add("text-danger");
        //             input.parentNode.appendChild(errorElement);
        //         }
        //         errorElement.textContent = message;
        //     }

        //     function clearError(input) {
        //         let errorElement = input.nextElementSibling;
        //         if (errorElement && errorElement.classList.contains("text-danger")) {
        //             errorElement.textContent = "";
        //         }
        //     }

        //     function validateEmail(email) {
        //         const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //         return re.test(email);
        //     }

        //     function validateForm() {
        //         let valid = true;

        //         if (firstName.value.trim() === "") {
        //             showError(firstName, "First name is required");
        //             valid = false;
        //         } else {
        //             clearError(firstName);
        //         }

        //         if (lastName.value.trim() === "") {
        //             showError(lastName, "Last name is required");
        //             valid = false;
        //         } else {
        //             clearError(lastName);
        //         }

        //         if (email.value.trim() !== "" && !validateEmail(email.value.trim())) {
        //             showError(email, "Invalid email format");
        //             valid = false;
        //         } else {
        //             clearError(email);
        //         }

        //         if (password.value.trim() !== "" || confirmPassword.value.trim() !== "") {
        //             if (password.value.trim() !== confirmPassword.value.trim()) {
        //                 showError(confirmPassword, "Passwords do not match");
        //                 valid = false;
        //             } else {
        //                 clearError(confirmPassword);
        //             }
        //         }

        //         return valid;
        //     }

        //     form.addEventListener("input", function(event) {
        //         validateForm();
        //     });

        //     form.addEventListener("submit", function(event) {
        //         if (!validateForm()) {
        //             event.preventDefault();
        //         }
        //     });
        // });
    </script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            let passwordField = document.getElementById('password');
            let confirmPasswordField = document.getElementById('confirm-password');
            let passwordError = document.getElementById('password-error');
            let confirmPasswordError = document.getElementById('confirm-password-error');
            let submitButton = document.getElementById('submit-button');

            let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            function validatePassword() {
                if (!passwordPattern.test(passwordField.value)) {
                    passwordError.textContent = "Password must have at least 8 characters, an uppercase letter, a lowercase letter, a number, and a special character.";
                    return false;
                } else {
                    passwordError.textContent = "";
                    return true;
                }
            }

            function validateConfirmPassword() {
                if (confirmPasswordField.value !== passwordField.value) {
                    confirmPasswordError.textContent = "Passwords do not match.";
                    return false;
                } else {
                    confirmPasswordError.textContent = "";
                    return true;
                }
            }

            passwordField.addEventListener('input', validatePassword);
            confirmPasswordField.addEventListener('input', validateConfirmPassword);

            document.getElementById('userForm').addEventListener('submit', function(event) {
                let isPasswordValid = validatePassword();
                let isConfirmPasswordValid = validateConfirmPassword();

                if (!isPasswordValid || !isConfirmPasswordValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script> -->

    <script>
        $(document).ready(function() {
            $("#userForm").submit(function(e) {
                let valid = true;
                $(".text-danger").text(""); // Clear previous errors

                // Validate all inputs
                $("#userForm input, #userForm select, #userForm textarea").each(function() {
                    let field = $(this);
                    let value = field.val().trim();

                    // Ignore hidden fields like CSRF token
                    if (field.is(":hidden") || field.attr("type") === "hidden") return;

                    // Required fields validation
                    if (field.prop("required") && value === "") {
                        field.next(".text-danger").text("This field is required.");
                        valid = false;
                    }

                    // Email validation
                    if (field.attr("type") === "email" && value !== "" &&
                        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                        field.next(".text-danger").text("Invalid email format.");
                        valid = false;
                    }

                    // Password confirmation check
                    if (field.attr("name") === "password_confirmation") {
                        if ($("#password").val().trim() !== value) {
                            field.next(".text-danger").text("Passwords do not match.");
                            valid = false;
                        }
                    }
                });

                // If validation fails, prevent submission
                if (!valid) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".edit-user").forEach(button => {
                button.addEventListener("click", function() {
                    let userId = this.getAttribute("data-id");

                    fetch(`/users/${userId}/edit`)
                        .then(response => response.json())
                        .then(user => {
                            document.getElementById("modal-title").innerText = "Edit User";
                            document.getElementById("userForm").setAttribute("action", `/users/${userId}`);
                            document.getElementById("form-method").value = "PUT";

                            document.getElementById("user_id").value = user.id;
                            document.getElementById("first_name").value = user.first_name;
                            document.getElementById("last_name").value = user.last_name;
                            document.getElementById("email").value = user.email;
                            document.getElementById("phone_number").value = user.phone_number;
                            document.getElementById("address").value = user.address;
                            document.getElementById("role").value = user.role;

                            // Set gender
                            if (user.gender === "Male") {
                                document.getElementById("gender-male").checked = true;
                            } else if (user.gender === "Female") {
                                document.getElementById("gender-female").checked = true;
                            }

                            document.getElementById("submit-button").innerText = "Update";

                            // Hide password fields for edit
                            document.getElementById("password-fields").style.display = "none";
                            document.getElementById("confirm-password-fields").style.display = "none";
                        });
                });
            });

            // Reset form when modal is closed
            document.getElementById("signup-modal").addEventListener("hidden.bs.modal", function() {
                document.getElementById("modal-title").innerText = "Add New User";
                document.getElementById("userForm").setAttribute("action", "{{ route('register') }}");
                document.getElementById("form-method").value = "POST";

                document.getElementById("first_name").value = "";
                document.getElementById("last_name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("phone_number").value = "";
                document.getElementById("address").value = "";
                document.getElementById("role").value = "";

                // Reset gender
                document.getElementById("gender-male").checked = false;
                document.getElementById("gender-female").checked = false;

                document.getElementById("submit-button").innerText = "Register";

                // Show password fields again for new user
                document.getElementById("password-fields").style.display = "block";
                document.getElementById("confirm-password-fields").style.display = "block";
            });
        });
    </script>
</body>

</html>