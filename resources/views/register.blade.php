<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row text-center">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <div><small>For Dashboard Please click <a href="{{ route('dashboard') }}">Dashboard</a></small></div>
                </div>
                @endif                

                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <img src="../assets/images/big/icon.png" alt="wrapkit">
                        <h2 class="mt-3 text-center">Sign Up for Free</h2>
                        <form method="POST" action="{{ route('register') }}" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="first_name" placeholder="first name" value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <small class="text-danger d-block text-start">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="last_name" placeholder="last name" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="email" name="email" placeholder="email" value="{{ old('email') }}">
                                        @error('email')
                                        <small class="text-danger d-block text-start">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                        <small id="password-error" class="text-danger d-block text-start"></small>
                                        @error('password')
                                        <small class="text-danger d-block text-start">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm Password" required>
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
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="number" name="phone_number" placeholder="phone number" value="{{ old('phone_number') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" rows="3" name="address" placeholder="address" value="{{ old('address') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3 text-start">Role
                                        <select class="form-select mr-sm-2" name="role" id="inlineFormCustomSelect">
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>

    <!-- JavaScript for Real-Time Password Validation -->
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
</body>

</html>