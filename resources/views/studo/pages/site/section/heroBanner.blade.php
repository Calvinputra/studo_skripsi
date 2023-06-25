<div class="container" style="padding-top:40px;padding-bottom:80px;">
    @if (auth()->check())
    <div class="row m-0" style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;">
        <div class="col-sm-1">
        @if($user->avatar)
            <img style="width:80px;height:80px;border-radius:100px;" src="{{ asset($user->avatar) }}" alt="">
        @else
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="40" cy="40" r="40" fill="#D9D9D9"/>
            </svg>
        @endif
        </div>
        <div class="col-sm-8 d-grid align-items-center">
            <h2 class="title-text-login">
                &nbsp;Hi, {{$user->name}}
            </h2>
        </div>
    </div>
        <div class="container">
            <div class="row">
                @foreach($list_goals as $gkey => $goals)
                    <div class="col-sm-4 ps-0" style="margin-bottom: 16px;">
                        <div style="background: rgba(32, 162, 235, 0.1);border-radius: 5px;padding: 24px;margin-top:8px; width: 365px ; height: 132px;">
                            <div class="row">
                                <div class="col-sm-7">
                                    <p class="fw-bold mb-1">
                                        {{ $goals->class_name }}
                                    </p>
                                    <p class="m-0" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3; overflow: hidden;">
                                        {{ $goals->notes }}
                                    </p>
                                </div>
                                <div class="col-sm-5">
                                    <center>
                                        <p class="m-0">
                                            {{ $goals->start_date }}
                                        </p>
                                        -
                                        <p class="m-0">
                                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 17V0H9L9.4 2H15V12H8L7.6 10H2V17H0Z" fill="#FFC100"/>
                                            </svg>
                                            {{ $goals->end_date }}
                                        </p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-sm-4">
            <img style="width:100%" src="{{ asset('/thumbnails/heroBanner.png') }}" alt="">
            
        </div>
        <div class="col-sm-8" style="display:grid; align-content:center;">
            <b>
                <h1 style="font-size: 48px;line-height: 58px;color: #20A2EB;font-weight:bold;">
                    Mulai Perjalanan Belajar Kamu Di Studo
                </h1>
            </b>
            <p class="desc-text-main">
                Pelajari keterampilan baru, perdalam pengetahuan, atau jelajahi minat pribadi
            </p>

            <a href="#kelasTersedia">
                <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;background:#063852;" type="submit">
                    <b>
                        Lihat Kelas
                    </b>
                </button>
            </a>
        </div>
    </div>
    @endif
</div>

