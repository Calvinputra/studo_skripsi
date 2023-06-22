@extends('studo.main')

<style>
    img{
        width:100%;
    }

    a{
        text-decoration:none !important;
    }


    .hover-img:hover .middle {
        opacity: 1;
    }
    
    .hover-img:hover img {
        opacity: 1;
        filter: brightness(70%);
    }

    .text {
        border: 1px solid #FFFFFF;
        border-radius: 5px;justify-content: center;
        align-items: center;
        padding: 10px 16px;
        background-color: white;
        color: #063852
    }
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 100px;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }
</style>

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">

@section('content')
<div class="container" style="padding-top:80px;padding-bottom:80px;">
    <div>
        <h1>
            <b>
                Semua Kelas
            </b>
        </h1>
        <div class="row">
            @foreach ($classes as $class)
                @if($class->status == 'active')
                    @php
                    $normal_price = $class->price / (1 - $class->discount/100);  
                    $normal_price_formatted = number_format($normal_price, 0, ',', '.');
                    @endphp
                    <div class="col-sm-4 hover-img"style="margin-top:60px;">
                        <a href="{{route('studo.overview',$class->slug)}}">
                            <img class=""  style="width: 352px;height:198px;border-radius:3px" src="{{ $class->thumbnail }}" alt="">
                            <div class="middle">
                                <div class="text hover-text-card" style="color: #063852">Lihat Overview Kelas</div>
                            </div>
                            <p class="title-text-card" style="margin-top:24px;margin-bottom:8px;">
                                {{ $class->name }}
                            </p>
                            <p class="mentor-name-text-card" style="margin-top:8px;margin-bottom:0px;">
                                {{ $class->tutor_name }}
                            </p>
                            @if($class->discount == 0)
                                <p class="normal-price-text-card"style="font-weight:700;color:#063852;margin-top:16px">
                                Rp.{{ number_format($class->price, 0, ',', '.') }}
                                </p>
                            @else
                            <div class="d-flex" style="align-items: center">
                                <p class="normal-price-text-card"style="font-weight:700;color:#063852;margin-top:16px">
                                    Rp.{{ number_format($class->price, 0, ',', '.') }}
                                </p>
                                <p class="disc-price-text-card">Rp.{{ $normal_price_formatted }}</p>
                            </div>
                            @endif
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection