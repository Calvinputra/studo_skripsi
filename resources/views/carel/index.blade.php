@extends('carel.main')

<style>
    .bg-navbar{
        background:#E6EBED;
    }
    .form-inline .form-control{
        width:600px;
    }
    .btn-outline-darkblue:hover{
        background: #063852 !important;
        border-color:#063852 !important;
        color:white;
    }
</style>
@section('content')

    <body class="antialiased">
        {{--
            <a href="javascript:void(0)" class=" btn" data-toggle="modal" data-target="#login">Masuk</a>
        <div id="login" class="modal fade modal-login" role="dialog" style="width:">
        <div style="display:flex; justify-content:center;">
            <div style="width:400px;">
                <!-- Modal content-->
                <div class="modal-content">
                        <div class="modal-header" style="border-top-left-radius: 30% !important;border-top-right-radius:30%;">
                        <div style="display:flex; justify-content:space-between;align-items:center;">
                            <h2 class="modal-title black">
                                <b style="font-size:32px;">
                                    Masuk Akun.
                                </b>    
                            </h2>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <a href=""  class="btn-google btn-block effect8" style="border: 1px solid #636466;border-radius:5px;padding: 10px 16px;text-decoration:none;">
                                    <center><span class="" style="color:black;">Masuk dengan Google</span></center>
                                </a>
                            </div>
                             <hr style="border-color:#20A2EB !important">
                            <form>
                                <div class="form-group">
                                    <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                                        Nama lengkap
                                    </p>
                                    <input type="name" placeholder="Nama" name="name" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                                        Email
                                    </p>
                                    <input type="email" placeholder="Email" name="email" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                                </div>
                                <div class="form-group pass">
                                    <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                                        Password
                                    </p>
                                    <input id="password-field" placeholder="Password" style="border: 1px solid black;border-radius:5px;" type="password" class="form-control" name="password" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password-nav"></span>
    
                                <div class="clearfix">
                                    <a href="" style="color:#1C1B1F"class="pull-right"><small>Forgot Password?</small></a>
                                </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn-masuk" style="">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
    </body>


@endsection