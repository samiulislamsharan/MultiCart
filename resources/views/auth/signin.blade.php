<!doctype html>
<html lang="en">

<x-admin-header-css />

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
                                        <p>Don't have an account yet? <a href="authentication-signup.html">Sign up
                                                here</a>
                                        </p>
                                    </div>
                                    {{-- <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="assets/images/icons/search.svg" width="16"
                                                    alt="Image Description">
                                                <span>Sign in with Google</span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="btn btn-facebook">
                                            <i class="bx bxl-facebook"></i>
                                            Sign in with Facebook
                                        </a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                                        <hr />
                                    </div> --}}
                                    <div class="form-body">
                                        <form class="row g-3" id="formSubmit">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input required autocomplete="username" type="email" name="email"
                                                    class="form-control" id="inputEmailAddress"
                                                    placeholder="Email Address">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">
                                                    Enter Password
                                                </label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input required autocomplete="current-password" type="password"
                                                        name="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a
                                                    href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->

    <x-admin-footer-js />

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });

        // Parsley Form Validation
        $("#formSubmit").submit(function(e) {
            e.preventDefault()

            var url = "{{ url('login') }}";

            $.ajax({
                url: url,
                data: $('#formSubmit').serialize(),
                type: 'post',
                success: function(result) {
                    if (result.status == 200) {
                        window.location.href = result.url;
                    } else {
                        alert('Wrong Credentials!');
                    }
                }
            });
        });
    </script>
</body>
