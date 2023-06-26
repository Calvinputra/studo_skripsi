<style>
    img{
        width:100%;
    }
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 120px;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
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

    }

</style>
@if(count($subscriptions) > 0)
    <div class="container">
        @if(count($list_goals) > 0)
            <h1 style="margin-top:80px;">
                <b>
                    Lanjutkan kelas berikut
                </b>
            </h1>
        @else
            <h1 >
                <b>
                    Lanjutkan kelas berikut
                </b>
            </h1>
        @endif
        <div class="row" >
            @foreach ($subscriptions as $subscription)
                <div class="col-sm-4"style="margin-top:60px;">
                    <div class="hover-img">
                        <a href="{{ route('studo.overview', [$subscription->slug, $subscription->chapter_id])}}">
                            <img class="" style="width: 352px;height:198px;border-radius:3px" src="{{ $subscription->thumbnail }}" alt="">
                            <div class="middle">
                                <div class="text hover-text-card">Lihat Overview Kelas</div>
                            </div>
                            <p class="class-webkit-line-1  title-text-card" style="margin-top:24px;margin-bottom:8px;">
                                {{ $subscription->name }}
                            </p>
                            <p class="mentor-name-text-card"style="margin: 8px 0px;">
                                {{ $subscription->tutor_name }}
                            </p>
                            {{-- <div class="d-flex align-items-center justify-content-between">
                                <div class="progress" style="padding: 4px;background: #E6EBED;border-radius: 10px;margin-top:8px;width:75%;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" style="width:70%;background: #FFC100;border-radius: 100px;">
                                    </div>
                                </div>
                                <div>
                                    <p class="m-0 text-progress">
                                        Chapter {{ $count_chapter }}/18
                                    </p>
                                </div>
                            </div>  --}}
                        </a>
                    </div>
                    <div style="margin-top:16px;">
                        <a href="{{ route('studo.overview', [$subscription->slug, $subscription->chapter_id])}}" class="button-text-login btn-masuk" style="text-decoration:none;display:flex;border: 1px solid #063852;border-radius: 5px;width:100%;color:#063852; border-color:#063852;background:white">
                        Lanjutkan Kelas</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif