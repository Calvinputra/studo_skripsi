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
        color: #063852;
        background-color: white;

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
<div class="container" style="padding-top:80px;padding-bottom:80px;" id="kelasTersedia">
    <div>
        <center>
        @if (auth()->check())
            @if(count($subscriptions) > 0)
                <h1 style="margin-top:80px;">
                    <b>
                        Kelas yang belum dibeli
                    </b>
                </h1>
            @else
                <h1 >
                    <b>
                        Kelas yang belum dibeli
                    </b>
                </h1>
            @endif
        @else
        <h1 style="margin-top:80px">
            <b>
                Berbagai Pilihan Kelas Yang Tersedia
            </b>
        </h1>
        @endif
        </center>
        <div class="row" >
            @php
                $count = 0;
            @endphp
            @foreach ($classes as $key => $class)
                @if ($class->status == 'active')
                    @php
                        $normal_price = $class->price / (1 - $class->discount/100);  
                        $normal_price_formatted = number_format($normal_price, 0, ',', '.');
                    @endphp
                    <div class="col-sm-4 hover-img" style="margin-top: 60px;">
                        <a href="{{ route('studo.overview', $class->slug) }}">
                            <img class="" style="width: 352px; height: 198px; border-radius: 3px" src="{{ asset($class->thumbnail) }}" alt="">
                            <div class="middle">
                                <div class="text hover-text-card">Lihat Overview Kelas</div>
                            </div>
                            <p class="class-webkit-line-1 title-text-card" style="margin-top: 24px; margin-bottom: 8px;">
                                {{ $class->name }}
                            </p>
                            <p class="mentor-name-text-card">
                                {{ $class->tutor_name }}
                            </p>
                            @if ($class->discount == 0)
                                <p class="normal-price-text-card" style="font-weight: 700; color: #063852; margin-top: 16px">
                                    Rp.{{ number_format($class->price, 0, ',', '.') }}
                                </p>
                            @else
                                <div class="d-flex" style="align-items: center">
                                    <p class="normal-price-text-card" style="font-weight: 700; color: #063852; margin-top: 16px">
                                        Rp.{{ number_format($class->price, 0, ',', '.') }}
                                    </p>
                                    <p class="disc-price-text-card">Rp.{{ $normal_price_formatted }}</p>
                                </div>
                            @endif
                        </a>
                    </div>
                    @php
                        $count++;
                        if ($count == 6) break;
                    @endphp
                @endif
            @endforeach
        </div>
        <div style="margin-top:60px;text-align:center;">
            <a href="{{route('studo.all')}}">
                <button class="btn my-2 my-sm-0" style="color:#063852; border-color:#063852;background:white;" type="submit">
                    <b>
                        Lihat Lebih Banyak
                    </b>
                </button>
            </a>
        </div>

        <div class="row " style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;margin-top:80px;">
            <div class="col-sm-9 d-grid align-items-center">
                <h2 class="title-text-login">
                    Ayo Jadi Tutor di Studo
                </h2>
                <p>
                    Jadilah tutor kami dan berikan perubahan positif pada kehidupan pelajar sekaligus mengembangkan diri kamu!
                </p>
            </div>
            <div class="col-sm-3 d-grid align-items-center">
                <a class="nav-link text-right" href="{{ route('internal_tutor.signup')}}">
                    <button class="btn my-2 my-sm-0 " style="color:white;background:#063852;" type="button">
                        <b>
                            Daftar Sebagai Tutor
                        </b>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>