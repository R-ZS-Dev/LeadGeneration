@extends('sitemaster.master-layout')
@section('title','Profile Settings')
@section('content')
</style>
<div class="container-fluid">
    <div class="card p-3 m-3">
        <!-- Navigation Tabs -->
        <!-- <ul class="nav nav-tabs" id="settingsTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#company">Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#password">Password</a>
            </li>
            @if(Auth::user()->role === 'admin') {{-- Hide for users --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#email">Email</a>
            </li>
            @endif
        </ul> -->

        <ul class="nav p-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn tabButton active" id="tab1-tab" data-bs-toggle="tab"
                    data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1"
                    aria-selected="true">
                    Profile
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn tabButton" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                    type="button" role="tab" aria-controls="tab2" aria-selected="false">
                    Company
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn tabButton" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                    type="button" role="tab" aria-controls="tab3" aria-selected="false">
                    Password
                </button>
            </li>
            @if(Auth::user()->role === 'admin')
            <li class="nav-item" role="presentation">
                <button class="btn tabButton" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                    type="button" role="tab" aria-controls="tab4" aria-selected="false">
                    Email
                </button>
            </li>
            @endif
        </ul>

        <div class="tab-content mt-4">
            <!-- Profile Tab -->
            <section id="tab1" class="tab-pane fade show active">
                <form id="profileSettingsForm" action="{{ route('settings.updateProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-4">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" disabled name="name" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label><span class="text-danger">*</span>
                                        <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label><span class="text-danger">*</span>
                                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label><span class="text-danger">*</span>
                                        <input type="text" name="phoneno" class="form-control" value="{{ Auth::user()->phoneno }}"
                                            pattern="^[+]?[0-9()\-_ ]*$"
                                            title="Only numbers (0-9), +, -, _, ( ) and spaces are allowed">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3 text-center p-3">
                                <label class="form-label">Profile Photo</label>
                                <input type="file" name="profile_photo" id="profileFileInput" class="d-none" accept="image/*" onchange="previewImage(event, 'profileImagePreview')">

                                <div class="preview-container">
                                    <img id="profileImagePreview"
                                        src="{{ Auth::user()->profile_photo ? asset('uploads/' . Auth::user()->profile_photo) : asset('default.jpg') }}"
                                        alt="Profile Photo"
                                        class="border rounded-4 p-1" style="max-width: 120px; cursor: pointer;"
                                        onclick="document.getElementById('profileFileInput').click();">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>
                </form>
            </section>

            <!-- Company Tab -->
            <section id="tab2" class="tab-pane fade">
                <form id="companySettingsForm" action="{{ route('settings.updateCompany') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Company Logo Upload -->
                        <div class="col-lg-6">
                            <div class="mb-3 text-center p-3">
                                <label class="form-label">Company Logo</label>
                                <input type="file" name="company_image" id="fileInput" class="d-none" accept="image/*" onchange="validateImage(this, 'imagePreview')">
                                <div class="preview-container">
                                    <img id="imagePreview"
                                        src="{{ old('company_image', optional(Auth::user()->company)->company_image ? asset('uploads/' . Auth::user()->company->company_image) : asset('uploads/default.jpg')) }}"
                                        alt="Company Logo"
                                        class="border rounded-4 p-1"
                                        style="max-width: 200px; cursor: pointer;"
                                        onclick="document.getElementById('fileInput').click();">
                                    <div id="fileError" class="text-danger small"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Fav Icon Upload -->
                        <div class="col-lg-6">
                            <div class="mb-3 text-center p-3">
                                <label class="form-label">Fav Icon</label>
                                <input type="file" name="fav_photo" id="favFileInput" class="d-none" accept="image/*" onchange="validateImage(this, 'favImagePreview')">
                                <div class="preview-container">
                                    <img id="favImagePreview"
                                        src="{{ old('fav_photo', optional(Auth::user()->company)->fav_photo ? asset('uploads/' . Auth::user()->company->fav_photo) : asset('uploads/default.jpg')) }}"
                                        alt="Fav Icon"
                                        class="border rounded-4 p-1"
                                        style="max-width: 200px; cursor: pointer;"
                                        onclick="document.getElementById('favFileInput').click();">
                                    <div id="favFileError" class="text-danger small"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Company Details -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="company_name">Company Name</label>
                                <input type="text" id="company_name" name="company_name" class="form-control"
                                    value="{{ old('company_name', Auth::user()->company->company_name ?? '') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="company_email">Company Email</label>
                                <input type="email" id="company_email" name="company_email" class="form-control"
                                    value="{{ old('company_email', Auth::user()->company->company_email ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="company_phone">Company Phone</label>
                                <input type="text" id="company_phone" name="company_phone" class="form-control"
                                    value="{{ old('company_phone', Auth::user()->company->company_phone ?? '') }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="company_mobile">Company Mobile</label>
                                <input type="text" id="company_mobile" name="company_mobile" class="form-control"
                                    value="{{ old('company_mobile', Auth::user()->company->company_mobile ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="company_address">Company Address</label>
                                <textarea id="company_address" name="company_address" class="form-control">{{ old('company_address', Auth::user()->company->company_address ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>
                </form>

            </section>

            <!-- Password Tab -->
            <section id="tab3" class="tab-pane fade">
                <form action="{{ route('settings.updatePassword') }}" method="POST" id="passwordForm">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                            <small class="text-danger d-none" id="currentPasswordError">Incorrect current password.</small>
                        </div>

                        <div class="mb-3 col-lg-4">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required disabled>
                            <small class="text-danger d-none" id="passwordError">Password must be at least 8 characters, include uppercase, lowercase, number & special character.</small>
                        </div>

                        <div class="mb-3 col-lg-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" id="confirm_password" class="form-control" required disabled>
                            <small class="text-danger d-none" id="confirmError">Passwords do not match.</small>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" id="submitBtn" class="btn btn-dark" disabled>Update Password</button>
                    </div>
                </form>

            </section>

            <!-- Email Tab -->
            <section id="tab4" class="tab-pane fade">
                <form id="emailSettingsForm" action="{{ route('settings.updateEmail') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="mail_from_name" class="form-control" value="{{ old('mail_from_name', Auth::user()->settings->mail_from_name ?? '') }}">
                            <div class="invalid-feedback">Name is required.</div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Email Address</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email', Auth::user()->settings->email ?? '') }}">
                            <div class="invalid-feedback">Valid email is required.</div>
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password', Auth::user()->settings->password ?? '') }}">
                            <div class="invalid-feedback">Password is required.</div>
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label class="form-label">Port</label>
                            <input type="text" name="port" class="form-control" value="{{ old('port', Auth::user()->settings->port ?? '') }}">
                            <div class="invalid-feedback">Port is required.</div>
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label class="form-label">SMTP</label>
                            <input type="text" name="smtp" class="form-control" value="{{ old('smtp', Auth::user()->settings->smtp ?? '') }}">
                            <div class="invalid-feedback">SMTP is required.</div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>
                </form>
            </section>

        </div>
    </div>

    @endsection
    @section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var triggerTabList = [].slice.call(document.querySelectorAll('#settingsTabs a'));
            triggerTabList.forEach(function(triggerEl) {
                triggerEl.addEventListener('click', function(event) {
                    event.preventDefault();
                    var tab = new bootstrap.Tab(triggerEl);
                    tab.show();
                });
            });
        });
    </script>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('imagePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        function previewImage(event, previewId) {
            var input = event.target;
            var preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     document.querySelectorAll("button[type='submit']").forEach(button => {
        //         button.addEventListener("click", function() {
        //             this.closest("form").submit(); // Directly submit the form
        //         });
        //     });
        // });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("profileSettingsForm");

            if (!form) return;

            form.addEventListener("submit", function(event) {
                let isValid = true;

                // Select required fields (EXCLUDE profile_photo)
                const requiredFields = form.querySelectorAll("input[name='last_name'], input[name='email']");

                requiredFields.forEach(field => {
                    if (field.value.trim() === "") {
                        field.classList.add("is-invalid");
                        isValid = false;
                    } else {
                        field.classList.remove("is-invalid");
                    }
                });

                // Validate Phone Number (Only allows 0-9, +, -, _, (), space)
                const phoneInput = form.querySelector("input[name='phoneno']");
                const phonePattern = /^[+]?[0-9()\-_ ]*$/;

                if (phoneInput.value.trim() === "") {
                    phoneInput.classList.add("is-invalid");
                    isValid = false;
                } else if (!phonePattern.test(phoneInput.value.trim())) {
                    phoneInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    phoneInput.classList.remove("is-invalid");
                }

                // Validate Profile Photo Size (Max 2MB)
                const profileFileInput = document.getElementById("profileFileInput");
                if (profileFileInput && profileFileInput.files.length > 0) {
                    const fileSize = profileFileInput.files[0].size / 1024 / 1024; // Convert bytes to MB
                    if (fileSize > 2) {
                        alert("Profile photo must be less than 2MB.");
                        profileFileInput.classList.add("is-invalid");
                        isValid = false;
                    } else {
                        profileFileInput.classList.remove("is-invalid");
                    }
                }

                if (!isValid) {
                    event.preventDefault(); // Stop form submission if validation fails
                    return;
                }

                // Disable button and show spinner
                const submitBtn = form.querySelector("button[type='submit']");
                if (submitBtn) {
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Updating...';
                    submitBtn.disabled = true;
                }
            });

            // Remove red border when user starts typing
            document.addEventListener("input", function(event) {
                if (event.target.classList.contains("is-invalid")) {
                    event.target.classList.remove("is-invalid");
                }
            });

            // Remove error when a new image is selected
            const profileFileInput = document.getElementById("profileFileInput");
            if (profileFileInput) {
                profileFileInput.addEventListener("change", function() {
                    this.classList.remove("is-invalid");
                });
            }
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("companySettingsForm");
            const submitButton = form.querySelector("button[type='submit']");

            if (!form || !submitButton) return;

            form.addEventListener("submit", function(event) {
                let isValid = true;

                // Required Fields (excluding images)
                const requiredFields = form.querySelectorAll("input[type='text'], input[type='email'], textarea");
                requiredFields.forEach(field => {
                    if (field.value.trim() === "") {
                        field.classList.add("is-invalid");
                        isValid = false;
                    } else {
                        field.classList.remove("is-invalid");
                    }
                });

                // Validate Phone Number Format
                const phoneFields = form.querySelectorAll("input[name='company_phone'], input[name='company_mobile']");
                const phonePattern = /^[+]?[0-9()\-_ ]*$/;

                phoneFields.forEach(field => {
                    if (field.value.trim() === "") {
                        field.classList.add("is-invalid");
                        isValid = false;
                    } else if (!phonePattern.test(field.value.trim())) {
                        field.classList.add("is-invalid");
                        isValid = false;
                    } else {
                        field.classList.remove("is-invalid");
                    }
                });

                // Prevent form submission if validation fails
                if (!isValid) {
                    event.preventDefault();
                    return;
                }

                // ✅ Show Spinner and Disable Button after Successful Validation
                submitButton.disabled = true;
                submitButton.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...`;
            });

            // Remove "is-invalid" class on input change
            document.addEventListener("input", function(event) {
                if (event.target.classList.contains("is-invalid")) {
                    event.target.classList.remove("is-invalid");
                }
            });
        });

        // Function to Validate Image Size
        function validateImage(input, previewId) {
            const file = input.files[0];
            const errorContainer = input.id === "fileInput" ? document.getElementById("fileError") : document.getElementById("favFileError");

            if (file) {
                if (file.size > 2 * 1024 * 1024) { // 2MB Limit
                    errorContainer.textContent = "File size must be less than 2MB.";
                    input.value = ""; // Clear file input
                    return;
                } else {
                    errorContainer.textContent = ""; // Clear error if valid
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("passwordForm"); // Replace with your actual form ID
            const currentPassword = document.getElementById("current_password");
            const newPassword = document.getElementById("new_password");
            const confirmPassword = document.getElementById("confirm_password");
            const submitBtn = document.getElementById("submitBtn");

            const currentPasswordError = document.getElementById("currentPasswordError");
            const passwordError = document.getElementById("passwordError");
            const confirmError = document.getElementById("confirmError");

            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            function validateForm() {
                let isValid = true;

                // Validate new password pattern
                if (newPassword.value.trim() !== "" && !passwordPattern.test(newPassword.value.trim())) {
                    passwordError.classList.remove("d-none");
                    isValid = false;
                } else {
                    passwordError.classList.add("d-none");
                }

                // Check if passwords match
                if (confirmPassword.value.trim() !== "" && newPassword.value.trim() !== confirmPassword.value.trim()) {
                    confirmError.classList.remove("d-none");
                    isValid = false;
                } else {
                    confirmError.classList.add("d-none");
                }

                // Enable submit button only if all conditions are met
                submitBtn.disabled = !isValid;
            }

            // AJAX Request to Verify Current Password
            currentPassword.addEventListener("input", function() {
                const passwordValue = currentPassword.value.trim();

                if (passwordValue === "") {
                    newPassword.disabled = true;
                    confirmPassword.disabled = true;
                    currentPasswordError.classList.add("d-none");
                    return;
                }

                fetch("{{ route('settings.checkPassword') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Include CSRF token
                        },
                        body: JSON.stringify({
                            current_password: passwordValue
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.valid) {
                            newPassword.disabled = false;
                            confirmPassword.disabled = false;
                            currentPasswordError.classList.add("d-none");
                        } else {
                            newPassword.disabled = true;
                            confirmPassword.disabled = true;
                            currentPasswordError.classList.remove("d-none");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });

            // Event Listeners for New Password Validation
            newPassword.addEventListener("input", validateForm);
            confirmPassword.addEventListener("input", validateForm);

            // **Form Submission Event Listener to Show Spinner**
            form.addEventListener("submit", function(event) {
                // Disable button and show spinner
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Updating...';
                submitBtn.disabled = true;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("emailSettingsForm");
            const submitBtn = document.getElementById("submitBtn");

            form.addEventListener("submit", function(event) {
                let isValid = true;

                // Validate required fields
                const inputs = form.querySelectorAll("input");
                inputs.forEach(input => {
                    if (input.value.trim() === "") {
                        input.classList.add("is-invalid");
                        isValid = false;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                // Validate email format
                const emailField = form.querySelector("input[name='email']");
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailField.value.trim())) {
                    emailField.classList.add("is-invalid");
                    isValid = false;
                } else {
                    emailField.classList.remove("is-invalid");
                }

                if (!isValid) {
                    event.preventDefault(); // Stop form submission if validation fails
                    return;
                }

                // Disable button and show spinner
                const submitBtn = form.querySelector("button[type='submit']");
                if (submitBtn) {
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Updating...';
                    submitBtn.disabled = true;
                }
            });

            // Remove validation error when user types
            form.addEventListener("input", function(event) {
                if (event.target.classList.contains("is-invalid")) {
                    event.target.classList.remove("is-invalid");
                }
            });
        });
    </script>

    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Retrieve last active tab from localStorage
        //     let activeTab = localStorage.getItem("activeTab");

        //     if (activeTab) {
        //         // Remove 'active' class from all tabs and tab panes
        //         document.querySelectorAll('.nav-link, .tab-pane').forEach(tab => {
        //             tab.classList.remove('active', 'show');
        //         });

        //         // Activate the stored tab
        //         document.querySelector(`[href="${activeTab}"]`).classList.add('active');
        //         document.querySelector(activeTab).classList.add('active', 'show');
        //     }

        //     // Store clicked tab in localStorage
        //     document.querySelectorAll('.nav-link').forEach(tab => {
        //         tab.addEventListener("click", function() {
        //             localStorage.setItem("activeTab", this.getAttribute("href"));
        //         });
        //     });
        // });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tabButton');
            const tabContents = document.querySelectorAll('.tab-pane');

            function deactivateTabs() {
                tabButtons.forEach(button => {
                    button.classList.remove('active');
                    button.setAttribute('aria-selected', 'false');
                });

                tabContents.forEach(content => {
                    content.classList.remove('show', 'active');
                });
            }
            const activeTab = sessionStorage.getItem('activeTab');
            if (activeTab) {
                const activeButton = document.getElementById(activeTab);
                if (activeButton) {
                    deactivateTabs();
                    activeButton.classList.add('active');
                    activeButton.setAttribute('aria-selected', 'true');
                    const targetTab = document.querySelector(activeButton.getAttribute('data-bs-target'));
                    targetTab.classList.add('show', 'active');
                }
            }
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    sessionStorage.setItem('activeTab', this.id);
                });
            });
        });
    </script>
    @endsection
