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
                @include('layouts.SideBar')
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="card p-3 m-3">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs" id="settingsTabs">
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
                    </ul>

                    <div class="tab-content mt-4">
                        <!-- Profile Tab -->
                        <div class="tab-pane fade show active" id="profile">
                            <form action="{{ route('settings.updateProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row p-4">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 text-center p-3">
                                            <label class="form-label">Profile Photo</label>

                                            <!-- Hidden File Input -->
                                            <input type="file" name="profile_photo" id="profileFileInput" class="d-none" accept="image/*" onchange="previewImage(event, 'profileImagePreview')" required>

                                            <!-- Clickable Image Preview -->
                                            <div class="preview-container">
                                                <img id="profileImagePreview"
                                                    src="{{ Auth::user()->profile_photo ? asset('/storage/uploads/' . Auth::user()->profile_photo) : asset('storage/uploads/default.jpg') }}"
                                                    alt="Profile Photo"
                                                    class="img-fluid rounded text-center" style="max-width: 100px; cursor: pointer;"
                                                    onclick="document.getElementById('profileFileInput').click();">
                                            </div>

                                            <!-- <small class="text-muted">Upload profile photo in jpeg, png, jpg, gif, webp max-size:2048kb</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary" data-action="Update profile" data-alert="Are you sure you want to update profile?">Update</button>
                                </div>
                            </form>
                        </div>

                        <!-- Company Tab -->
                        <div class="tab-pane fade" id="company">
                            <form action="{{ route('settings.updateCompany') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Company Logo Upload -->
                                    <div class="col-lg-6">
                                        <div class="mb-3 text-center p-3">
                                            <label class="form-label">Company Logo</label>

                                            <!-- Hidden File Input -->
                                            <input type="file" name="company_image" id="fileInput" class="d-none" accept="image/*" onchange="previewImage(event, 'imagePreview')" required>

                                            <!-- Clickable Image Preview -->
                                            <div class="preview-container">
                                                <img id="imagePreview"
                                                    src="{{ optional(Auth::user()->company)->company_image ? asset('storage/uploads/' . Auth::user()->company->company_image) : asset('storage/uploads/default.jpg') }}"
                                                    alt="Company Logo"
                                                    class="img-fluid rounded mt-2"
                                                    style="max-width: 200px; cursor: pointer;"
                                                    onclick="document.getElementById('fileInput').click();">
                                            </div>

                                            <!-- <small class="text-muted">Upload company logo in jpeg, png, jpg, gif, webp max-size:2048kb</small> -->
                                        </div>
                                    </div>

                                    <!-- Fav Photo Upload -->
                                    <div class="col-lg-6">
                                        <div class="mb-3 text-center p-3">
                                            <label class="form-label">Fav Icon</label>

                                            <!-- Hidden File Input -->
                                            <input type="file" name="fav_photo" id="favFileInput" class="d-none" accept="image/*" onchange="previewImage(event, 'favImagePreview')">

                                            <!-- Clickable Image Preview -->
                                            <div class="preview-container">
                                                <img id="favImagePreview"
                                                    src="{{ optional(Auth::user()->company)->fav_photo ? asset('storage/uploads/' . Auth::user()->company->fav_photo) : asset('storage/uploads/default.jpg') }}"
                                                    alt="Fav Icon"
                                                    class="img-fluid rounded mt-2"
                                                    style="max-width: 200px; cursor: pointer;"
                                                    onclick="document.getElementById('favFileInput').click();">
                                            </div>

                                            <!-- <small class="text-muted">Upload favorite photo in jpeg, png, jpg, gif, webp max-size:2048kb</small> -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Company Details -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="company_name">Company Name</label>
                                            <input type="text" id="company_name" name="company_name" class="form-control" value="{{ Auth::user()->company->company_name ?? '' }}" required>
                                            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="company_email">Company Email</label>
                                            <input type="email" id="company_email" name="company_email" class="form-control" value="{{ Auth::user()->company->company_email ?? '' }}" required>
                                            @error('company_email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="company_phone">Company Phone</label>
                                            <input type="text" id="company_phone" name="company_phone" class="form-control" value="{{ Auth::user()->company->company_phone ?? '' }}" required>
                                            @error('company_phone') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="company_mobile">Company Mobile</label>
                                            <input type="text" id="company_mobile" name="company_mobile" class="form-control" value="{{ Auth::user()->company->company_mobile ?? '' }}" required>
                                            @error('company_mobile') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="company_address">Company Address</label>
                                            <textarea id="company_address" name="company_address" class="form-control" required>{{ Auth::user()->company->company_address ?? '' }}</textarea>
                                            @error('company_address') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary" data-action="Update company" data-alert="Are you sure you want to update comapny detail?">Update</button>
                                </div>
                            </form>
                        </div>

                        <!-- Password Tab -->
                        <div class="tab-pane fade" id="password">
                            <form action="{{ route('settings.updatePassword') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                        @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="new_password" class="form-control" required>
                                        @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="new_password_confirmation" class="form-control" required>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" data-action="Update Password" class="btn btn-primary" data-alert="Are you sure you want to update password?">Update</button>
                                </div>
                            </form>
                        </div>

                        <!-- Email Tab -->
                        <div class="tab-pane fade" id="email">
                            <form action="{{ route('settings.updateEmail') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="mail_from_name" class="form-control"
                                            value="{{ old('mail_from_name', Auth::user()->settings->mail_from_name ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', Auth::user()->settings->email ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Port</label>
                                        <input type="text" name="port" class="form-control"
                                            value="{{ old('port', Auth::user()->settings->port ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">SMTP</label>
                                        <input type="text" name="smtp" class="form-control"
                                            value="{{ old('smtp', Auth::user()->settings->smtp ?? '') }}">
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" data-action="Update Email Configration" data-alert="Are you sure you want to update email configration?" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <footer class="footer text-center text-muted">
                    @include('layouts.Footer')
                </footer>
            </div>
        </div>
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- apps -->
        <script src="../dist/js/app-style-switcher.js"></script>
        <script src="../dist/js/feather.min.js"></script>
        <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../dist/js/custom.min.js"></script>
        <!-- Add these before closing </body> tag in layouts/app.blade.php -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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