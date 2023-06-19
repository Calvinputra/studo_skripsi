@extends('studo.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
<style>

    .middle {
        top: 520px !important;
    }
    .text {
        border: 1px solid #063852 !important;
        color: #063852 !important;
    }

</style>
@section('content')
<div class="container" style="padding-top:40px;padding-bottom:80px;">
    @php
        $normal_price = $class->price / (1 - $class->discount/100);  
        $normal_price_formatted = number_format($normal_price, 0, ',', '.');
    @endphp
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div>
                <h2 class="fw-bold">
                    Upload Bukti Pembayaran
                </h2>
                <p>
                    Pembelian kelas akan diproses maksimal 2x24 jam.
                </p>
                <div>
                    <b>
                        <p>
                            Mohon transfer ke Bank XYZ
                        </p>
                    </b>
                    <div class="row " style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;margin:0px;">
                        <div class="col-sm-9 d-grid align-items-center">
                            <p class="m-0">
                                010101010101
                            </p>
                        </div>
                        <div class="col-sm-3 d-grid align-items-center">
                            <a class="nav-link text-right" href="{{ route('internal_tutor.signin')}}">
                                <button class="btn my-2 my-sm-0 " style="color: #063852;background:white;border: 1px solid #063852;" type="button">
                                    <b>
                                        Salin
                                    </b>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div style="margin-top:24px;">
                    <b>
                        <p>
                            Jumlah Transfer
                        </p>
                    </b>
                    <div class="row " style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;margin:0px;">
                        <div class="col-sm-9 d-grid align-items-center">
                            <p class="m-0">
                                RP29.000
                            </p>
                        </div>
                        <div class="col-sm-3 d-grid align-items-center">
                            <a class="nav-link text-right" href="{{ route('internal_tutor.signin')}}">
                                <button class="btn my-2 my-sm-0 " style="color: #063852;background:white;border: 1px solid #063852;" type="button">
                                    <b>
                                        Salin
                                    </b>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div style="margin-top:24px;" >
                    <a href="" class="hover-img">
                        <img class="" style="height: 198px;width:100%;" src="https://cdn.discordapp.com/attachments/722800563489865779/1120295169170874389/Frame_1939.png" alt="">
                        <div class="middle">
                            <div class="text hover-text-card">Upload Bukti Pembayaran</div>
                        </div>
                    </a>
                    <div style="margin-top:24px;">
                        <button class="btn my-2 my-sm-0" style="color:white;background:#063852;width:100%;" type="button">
                            <b>
                                Saya Sudah Transfer
                            </b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

@endsection