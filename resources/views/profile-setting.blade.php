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
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#email">Email</a>
                    </li>
                </ul>

                <div class="tab-content mt-4">
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <form action="{{ route('settings.updateProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Profile Photo</label>
                                        <input type="file" name="profile_photo" class="form-control" accept="image/*">
                                        @if(Auth::user()->profile_photo)
                                        <img src="{{ asset('/storage/profile_photos/' . Auth::user()->profile_photo) }}" class="p-2" height="100" width="100" alt="Profile Photo">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="number" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Company Tab -->
                    <div class="tab-pane fade" id="company">
                        <form action="{{ route('settings.updateCompany') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Company Logo</label>
                                        <input type="file" name="company_image" class="form-control" accept="image/*">
                                        @if(Auth::user()->company->company_image ?? false)
                                        <img src="{{ asset('storage/company_images/' . Auth::user()->company->company_image) }}" alt="Company Logo" class="mt-2" width="100">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="company_name">Company Name</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" value="{{ Auth::user()->company->company_name ?? '' }}">
                                        @error('company_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="company_email">Company Email</label>
                                        <input type="email" id="company_email" name="company_email" class="form-control" value="{{ Auth::user()->company->company_email ?? '' }}">
                                        @error('company_email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="company_phone">Company Phone</label>
                                        <input type="text" id="company_phone" name="company_phone" class="form-control" value="{{ Auth::user()->company->company_phone ?? '' }}">
                                        @error('company_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="company_mobile">Company Mobile</label>
                                        <input type="text" id="company_mobile" name="company_mobile" class="form-control" value="{{ Auth::user()->company->company_mobile ?? '' }}">
                                        @error('company_mobile')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="company_address">Company Address</label>
                                        <textarea id="company_address" name="company_address" class="form-control">{{ Auth::user()->company->company_address ?? '' }}</textarea>
                                        @error('company_address')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Password Tab -->
                    <div class="tab-pane fade" id="password">
                        <form action="{{ route('settings.updatePassword') }}" method="POST">
                            @csrf

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control" required>
                                @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" required>
                                @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>

                    <!-- Email Tab -->
                    <div class="tab-pane fade" id="email">
                        <form action="{{ route('settings.updateEmail') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">New Email</label>
                                <input type="email" name="new_email" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Email</button>
                        </form>
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

</body>

</html>