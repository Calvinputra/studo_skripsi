@extends('internal_tutor.main')
<style>
    body{margin: 0;padding: 0;background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;height: 100vh;font-family: sans-serif;background-size: cover;background-repeat: no-repeat;background-position: center;overflow: hidden}@media screen and (max-width: 600px;){body{background-size: cover;: fixed}}#particles-js{height: 100%}.loginBox{position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 350px;min-height: 200px;background: #000000;border-radius: 10px;padding: 40px;box-sizing: border-box}.user{margin: 0 auto;display: block;margin-bottom: 20px}h3{margin: 0;padding: 0 0 20px;color: #59238F;text-align: center}.loginBox input{width: 100%;margin-bottom: 20px}.loginBox input[type="text"], .loginBox input[type="password"]{border: none;border-bottom: 2px solid #262626;outline: none;height: 40px;color: #fff;background: transparent;font-size: 16px;padding-left: 20px;box-sizing: border-box}.loginBox input[type="text"]:hover, .loginBox input[type="password"]:hover{color: #42F3FA;border: 1px solid #42F3FA;box-shadow: 0 0 5px rgba(0,255,0,.3), 0 0 10px rgba(0,255,0,.2), 0 0 15px rgba(0,255,0,.1), 0 2px 0 black}.loginBox input[type="text"]:focus, .loginBox input[type="password"]:focus{border-bottom: 2px solid #42F3FA}.inputBox{position: relative}.inputBox span{position: absolute;top: 10px;color: #262626}.loginBox input[type="submit"]{border: none;outline: none;height: 40px;font-size: 16px;background: #59238F;color: #fff;border-radius: 20px;cursor: pointer}.loginBox a{color: #262626;font-size: 14px;font-weight: bold;text-decoration: none;text-align: center;display: block}a:hover{color: #00ffff}p{color: #0000ff}
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

@section('content')
<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
    <h3>Register here</h3>
    <form action="{{ route('internal_tutor.post.signup') }}" method="post">
        @csrf
        <div class="inputBox"> 
            <input id="name" type="name" name="name" placeholder="nama"> 
            <input id="email" type="email" name="email" placeholder="email">
            <div class="password-input">
                <input id="password" type="password" name="password" placeholder="password"> 
                <i id="toggle-password" class="fa fa-eye password-icon"></i>
            </div>
        </div> 
        <input type="submit" name="" value="Register">
    </form> 

    <div class="text-center">
        <p style="color:#fff">Sudah punya akun?</p>
        <a href="{{route('internal_tutor.signin')}}" style="color: #59238F;font-size:18px">Masuk sebagai Admin</a>
    </div>
</div>
<script>
$("#toggle-password").click(function() {
    var input = $("#password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
        $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
        input.attr("type", "password");
        $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
});
</script>
@endsection