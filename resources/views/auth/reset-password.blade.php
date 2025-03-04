
@extends('auth.auth-master')
@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
        style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">

        <style>
            .custom-input-group {
                position: relative;
                display: flex;
                align-items: center;
            }

            .input-icon {
                position: absolute;
                left: 10px;
            }

            .toggle-password {
                position: absolute;
                right: 10px;
                cursor: pointer;
            }
        </style>
        <div class="login-wrapper">
            <!-- Left Side: Logo Section -->
            <div class="login-left">
                <img src="../assets/images/freedashDark.svg" alt="PDS Perfusion">
            </div>

            <!-- Right Side: Forget Form -->
            <div class="login-right">
                <h3 class="login-title">Reset Password</h3>
                <p class="login-subtitle">Please enter your new password here.</p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Custom error message (if you need to pass it explicitly in the controller) -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <strong>Email</strong>
                    <div class="custom-input-group">
                        <span class="input-icon"><i class="far fa-envelope"></i></span>
                        <input type="email" name="email" :value="old('email', $request - > email)" required autofocus
                            autocomplete="username">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>New password</strong>
                            <div class="custom-input-group">
                                <span class="input-icon"><i class="icon-lock"></i></span>
                                <input type="password" id="password" name="password" placeholder="•••••" required
                                    oninput="checkPasswordMatch()">
                                <span class="toggle-password" onclick="togglePassword('password')">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <strong>Confirm password</strong>
                            <div class="custom-input-group">
                                <span class="input-icon"><i class="icon-lock"></i></span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="•••••" required oninput="checkPasswordMatch()">
                                <span class="toggle-password" onclick="togglePassword('password_confirmation')">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>

                            <p id="password-error" style="color: red; font-size:12px; display: none;">Passwords do not
                                match!</p>
                        </div>
                    </div>

                    <button type="submit" class="login-button" id="submit-btn" disabled>Reset Password</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function checkPasswordMatch() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("password_confirmation").value;
            let errorText = document.getElementById("password-error");
            let submitBtn = document.getElementById("submit-btn");

            if (password === confirmPassword && password.length > 0) {
                errorText.style.display = "none";
                submitBtn.removeAttribute("disabled");
            } else {
                errorText.style.display = "block";
                submitBtn.setAttribute("disabled", "true");
            }
        }

        function togglePassword(fieldId) {
            let field = document.getElementById(fieldId);
            let icon = field.nextElementSibling.querySelector("i");

            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                field.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
