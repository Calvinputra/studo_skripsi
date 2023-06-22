@extends('studo.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">

@section('content')
    <div class="container" style="padding-top:40px;padding-bottom:80px;">
        @php
            $normal_price = $class->price / (1 - $class->discount/100);  
            $normal_price_formatted = number_format($normal_price, 0, ',', '.');
        @endphp
        <div class="row">
            <div class="col-sm-7">
                <p ckass="desc-text-main">
                    {{ $class->category }}
                </p>
                <h2 class="title-text-login" style="margin-top:8px;margin-bottom:0px;">
                    {{ $class->name }}
                </h2>
                <p class="desc-text-main" style="margin-top:8px;">
                    {{ $class->tutor_name }}
                </p>
                <img style="width:568px;margin-top:24px;height: 414px" src="{{ $class->thumbnail }}" alt="">
                
            </div>
            <div class="col-sm-5" style="">
                <div class="d-flex align-items-center justify-content-between" style="padding: 8px;border: 1px solid #FFC100;">
                    <p class="desc-text-main m-0" style="font-weight:500;">
                        1x Kelas Reguler
                    </p>
                    @if($class->discount == 0)
                    <span style="font-size: 16px;line-height: 29px;font-weight: 500;">Rp.{{ number_format($class->price, 0, ',', '.') }}</span>
                    @else
                    <span style="font-size: 16px;line-height: 29px;font-weight: 500;"><span style="text-decoration: line-through;color: grey;font-size: 12px;line-height:19px;margin-right:4px;">Rp.{{ $normal_price_formatted }}</span>Rp.{{ number_format($class->price, 0, ',', '.') }}</span>
                    @endif
                </div>
                <b>
                    <p class="desc-text-main" style="font-weight:700; margin:16px 0px;">
                        Detail Pembayaran
                    </p>
                </b>
                @if($class->discount == 0)
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="desc-text-main m-0" style="font-weight:500;"">
                            Sub Total
                        </p>
                        <p class="m-0" style="">
                           Rp.{{ number_format($class->price, 0, ',', '.') }}
                        </p>
                    </div>
                @else
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="desc-text-main m-0" style="font-weight:500;"">
                            Sub Total
                        </p>
                        <p class="m-0" style="">
                             Rp.{{ number_format($class->price, 0, ',', '.') }}
                        </p>
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-between">
                        <p class="desc-text-main m-0" style="font-weight:500;color:#20A2EB">
                            Diskon
                        </p>
                        <p class="m-0"style="color:#20A2EB">
                           -Rp.{{ $normal_price_formatted - number_format($class->price, 0, ',', '.') }}.000
                        </p>
                    </div> --}}
                @endif
                <div style="border: 1px solid #D9D9D9;margin:16px 0px;">
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <b>
                        <p class="desc-text-main m-0" style="font-weight:700;">
                            Total Pembayaran
                        </p>
                    </b>
                    <b>
                        <p class="m-0" style=";">
                            Rp.{{ number_format($class->price, 0, ',', '.') }}
                        </p>
                    </b>
                </div>
    
                <div style="margin-top:24px;">
                    <a  href="{{route('studo.checkout.upload', $class->slug)}}">
                        <button class="btn btn-outline-success my-2 my-sm-0" style="width:100%;color:white;background:#063852;height: 51px;" type="submit">
                            <b>
                                Beli Kelas
                            </b>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection