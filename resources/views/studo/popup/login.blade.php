<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .password-input {
            position: relative;
        }

        .password-input .password-icon {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding-bottom:0px;border-bottom:0px;border-top-left-radius: 30% !important;border-top-right-radius:30%;">
                    <div style="display:flex; justify-content:space-between;width:100%;">
                        <div>
                            <p class="title-text-login modal-title black">
                                Masuk Akun.
                            </p>
                            <p>
                                Belum memiliki akun? <a href="#" id="registerBtn">Daftar</a>
                            </p>
                        </div>
                        <div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="margin-top:0px">
                        <a href="{{ route('studo.auth.google.redirect') }}" class="btn-google btn-block effect8" style="border: 1px solid #636466;border-radius:5px;padding: 10px 16px;text-decoration:none;">
                            <center><span class="google-text-login">
                                 <img src="{{ asset('google/google.png') }}" style="width: 24px;height: 24px;margin-bottom: 2px;" width="23" height="30" alt="">
                            Masuk dengan Google</span></center>
                        </a>
                    </div>
                    <hr style="border-color:#20A2EB !important">
                    <form action="{{ route('studo.post.login') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <p class="desc-text-login">
                                Email
                            </p>
                            <input type="email" placeholder="Email" name="email" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                        </div>
                        <div class="form-group pass">
                            <p class="desc-text-login">
                                Password
                            </p>
                            <div class="password-input">
                                <input class="form-control" id="password-login1" type="password" name="password" placeholder="Password" style="border: 1px solid black;border-radius:5px;"> 
                                <i id="toggle-password-login1" class="fas fa-eye password-icon"></i>
                            </div>
                            <div class="clearfix d-flex align-items-center justify-content-between" style="margin-top:16px;padding:0px 20px;">
                                <div>
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Remember Me
                                    </label>
                                </div>
                                {{-- <a href="" style="color:#1C1B1F; margin-left:100px;"><small>Forgot Password?</small></a> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="button-text-login btn-masuk" style="">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggle-password-login1").click(function() {
                var input = $("#password-login1");
                var icon = $(this);

                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                    icon.removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    input.attr("type", "password");
                    icon.removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        });
    </script>
</body>
</html>