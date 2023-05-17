@extends('carel.main')


@section('content')
<!DOCTYPE html>
<link href=”css/bootstrap.min.css” rel=”stylesheet”>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div>
        <nav class="navbar navbar-expand-lg bg-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between container" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Logo</a>
                <div>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control" style="border-radius:5px 0px 0px 5px" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;background:#063852;height:37px; border-radius:0px 5px 5px 0px;" type="submit"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.14583 12.3708 1.8875 11.1125C0.629167 9.85417 0 8.31667 0 6.5C0 4.68333 0.629167 3.14583 1.8875 1.8875C3.14583 0.629167 4.68333 0 6.5 0C8.31667 0 9.85417 0.629167 11.1125 1.8875C12.3708 3.14583 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.8125 10.5625 9.6875 9.6875C10.5625 8.8125 11 7.75 11 6.5C11 5.25 10.5625 4.1875 9.6875 3.3125C8.8125 2.4375 7.75 2 6.5 2C5.25 2 4.1875 2.4375 3.3125 3.3125C2.4375 4.1875 2 5.25 2 6.5C2 7.75 2.4375 8.8125 3.3125 9.6875C4.1875 10.5625 5.25 11 6.5 11Z" fill="#E6EBED"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <button class="btn btn-outline-success my-2 my-sm-0" style="color:#063852; border-color:#063852;background:#E6EBED" type="submit">
                    <b>
                        Masuk
                    </b>
                </button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;background:#063852;" type="submit">
                        <b>
                            Daftar
                        </b>
                    </button>
                    </a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
        
        @include('carel.pages.LandingPage.heroBanner')
        <!-- modal -->
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
</html>


@endsection