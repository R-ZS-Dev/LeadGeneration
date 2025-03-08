@extends('sitemaster.master-layout')
@section('title','All Users')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Signup modal content -->
            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0 mt-2"><b>Add New User</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form action="{{ route('add-user') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">First Name</label>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="First name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="">Last Name</label>
                                            <input class="form-control" type="text" name="last_name"
                                                placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" name="email" id="inputEmail"
                                                placeholder="abc@gmail.com" required>
                                            <span id="emailError" style="color: #fe6783;"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" id="password-fields">
                                        <div class="form-group mb-3">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="Password" required>
                                            <small id="password-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="confirm-password-fields">
                                        <div class="form-group mb-3">
                                            <label for="">Confirm Password</label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                placeholder="Confirm password" required>
                                            <small id="confirm-password-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 text-start">
                                            <div class="gender-container">
                                                <label>
                                                    <input type="radio" name="gender" value="Male" id="gender-male"
                                                        data-icon="" checked required>
                                                    <div class="text-center">
                                                        <label for="">Male</label>
                                                    </div>
                                                </label>
                                                <label>
                                                    <input type="radio" name="gender" value="Female" id="gender-female"
                                                        data-icon="" required>
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
                                            <input class="form-control" type="text" name="phoneno" id="phone_number"
                                                placeholder="Phone number" required>
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
                                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">Add
                                            User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

            <div class="col-12 mt-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card m-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                @if (Auth::check() && Auth::user()->role === 'admin')
                                    <button type="button" class="btn waves-effect waves-light btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#signup-modal">
                                        <i class="fas fa-plus"></i> Add user
                                    </button>
                                @endif

                            </div>
                        </div>
                        <div class="mt-3 table-responsive">
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
                                        @if (Auth::user()->role === 'admin')
                                            {{-- Only show Action column for admins --}}
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($users as $index => $user)
                                        @if ($user->status == 1)
                                            @if (Auth::user()->role == 'admin' || $user->role != 'admin')
                                                <tr id="row-{{ $user->id }}">
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phoneno }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                                    @if (Auth::user()->role == 'admin')
                                                        {{-- Only show delete button for admins --}}
                                                        <td class="text-center d-flex">

                                                            <a onclick="editUser({{ json_encode($user) }})"
                                                                href="javascript:void(0);" class="text-primary">
                                                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);"
                                                                onclick="confirmDelete('{{ route('delete-user', $user->id) }}','{{ $user->id }}')"
                                                                class="text-danger">
                                                                <i class="fa-solid fa-trash-can-arrow-up"></i>
                                                            </a>

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
        <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Edit User</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="{{ route('edit-user') }}" class="mt-4">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" id="id">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="">First Name</label>
                                        <input class="form-control" type="text" name="name"
                                            placeholder="First name" id="edit_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="">Last Name</label>
                                        <input class="form-control" type="text" name="last_name"
                                            placeholder="Last name" id="edit_lname" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input class="form-control" type="email" name="email" id="edit_email"
                                            placeholder="abc@gmail.com" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 text-start">
                                        <div class="gender-container">
                                            <label>
                                                <input type="radio" name="gender" value="Male" id="gender-male1"
                                                    data-icon="" required>
                                                <div class="text-center">
                                                    <label for="">Male</label>
                                                </div>
                                            </label>
                                            <label>
                                                <input type="radio" name="gender" value="Female" id="gender-female1"
                                                    data-icon="" required>
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
                                        <input class="form-control" type="text" name="phoneno" id="edit_phone"
                                            placeholder="Phone number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 text-start">
                                        <label for="">Role</label>
                                        <select class="form-select" name="role" id="edit_role" required>
                                            <option disabled selected>Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" rows="3" name="address" id="edit_address" placeholder="Address" required></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark" id="submit-button">Update
                                        User</button>
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
        function editUser(user) {
            document.getElementById("id").value = user.id;
            document.getElementById("edit_name").value = user.name;
            document.getElementById("edit_lname").value = user.last_name;
            document.getElementById("edit_phone").value = user.phoneno;
            document.getElementById("edit_email").value = user.email;
            document.getElementById("edit_address").value = user.address;
            document.getElementById("edit_role").value = user.role;
            document.getElementById("gender-female1").checked = (user.gender === 'Female');
            document.getElementById("gender-male1").checked = (user.gender === 'Male');
            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
            editModal.show();
        }
    </script>


    <script>
        $(document).ready(function() {
            const emailInput = $('#inputEmail');
            const emailError = $('#emailError');
            const passwordInput = $('input[name="password"]');
            const confirmPasswordInput = $('input[name="password_confirmation"]');
            const passwordError = $('#password-error');
            const confirmPasswordError = $('#confirm-password-error');
            const submitBtn = $('#submitBtn'); // Submit button ka ID ensure karein

            // Default disable submit button
            submitBtn.prop('disabled', true);

            // Email validation (same as before)
            emailInput.on('blur', function() {
                const email = emailInput.val().trim();
                emailError.text('');
                if (email) {
                    $.ajax({
                        url: '/check-email',
                        method: 'POST',
                        data: {
                            email: email,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (!response.success) {
                                emailError.text(response.message);
                                submitBtn.prop('disabled', true);
                            } else {
                                validateForm(); // Email sahi ho to form validate karein
                            }
                        },
                        error: function() {
                            emailError.text('Something went wrong. Please try again.');
                            submitBtn.prop('disabled', true);
                        }
                    });
                } else {
                    submitBtn.prop('disabled', true);
                }
            });

            function validatePasswords() {
                const password = passwordInput.val().trim();
                const confirmPassword = confirmPasswordInput.val().trim();

                if (password.length < 8) {
                    passwordError.text('Password must be at least 8 characters.');
                    submitBtn.prop('disabled', true);
                    return false;
                } else {
                    passwordError.text('');
                }

                if (password !== confirmPassword) {
                    confirmPasswordError.text('Passwords do not match.');
                    submitBtn.prop('disabled', true);
                    return false;
                } else {
                    confirmPasswordError.text('');
                }
                return true;
            }

            // Function to validate entire form
            function validateForm() {
                if (validatePasswords() && emailError.text() === '') {
                    submitBtn.prop('disabled', false);
                } else {
                    submitBtn.prop('disabled', true);
                }
            }

            // On input change, validate passwords
            passwordInput.on('input', validateForm);
            confirmPasswordInput.on('input', validateForm);
        });
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
                    submitBtn.innerHTML =
                        '<span class="spinner-border spinner-border-sm"></span> Processing...';
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
