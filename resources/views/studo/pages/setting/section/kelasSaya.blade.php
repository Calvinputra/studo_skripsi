<style>
        img{
    }
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 75px;
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
        width:150px;
        background-color: white;

    }

</style>
<div class="row tab-pane fade" id="kelasSaya" role="tabpanel">
    <div class="d-flex align-items-center justify-content-between" style="margin-top:40px;">
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Kelas Saya
        </h2>
        <p class="m-0">
            {{ count($subscriptions) }} Kelas
        </p>
    </div>
    <div class="d-flex align-items-center justify-content-between" style="margin-top:40px;">
        <h2 class="text-kelas-belum-selesai">
            Kelas Yang Belum Selesai
        </h2>
        <p class="m-0">
            {{ count($check_undone_class) }} Kelas
        </p>
    </div>
    @foreach($check_undone_class as $undone_class)
        <div class="row" style="margin:16px 0px;">
            <div class="col-sm-4">
                <img style="width: 100%;height:144px;margin:0px;" src="{{ asset($undone_class->thumbnail) }}" alt="">
            </div>
            <div class="col-sm-8 d-grid align-items-center">
                <div>
                    <p class="info-text-login m-0">
                       {{$undone_class->category}}
                    </p>
                    <p class="text-kelas-admin" style="margin-top:8px;margin-bottom:0px;">
                        {{$undone_class->name}}
                    </p>
                    <p class="info-text-login m-0">

                    </p>
                    {{-- <div class="d-flex align-items-center justify-content-between">
                        <div class="progress" style="padding: 4px;background: #E6EBED;border-radius: 10px;margin-top:8px;width:80%;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:100%;background: #FFC100;border-radius: 100px;">
                            </div>
                        </div>
                        <div>
                            <p class="m-0 text-progress">
                                Chapter 18/18
                            </p>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex align-items-center justify-content-between" style="margin-top:40px;">
        <h2 class="text-kelas-belum-selesai">
            Kelas Yang Sudah Selesai
        </h2>
        <p class="m-0">
            {{ count($check_done_class) }} Kelas
        </p>
    </div>
    @foreach ($check_done_class as $done_class)
        <div class="row" style="margin:16px 0px;">
            <div class="col-sm-4">
                <img style="width: 100%;height:144px;margin:0px;" src="{{ asset($done_class->thumbnail) }}" alt="">
            </div>
            <div class="col-sm-8 d-grid align-items-center">
                <div>
                    <p class="info-text-login m-0">
                       {{$done_class->category}}
                    </p>
                    <p class="text-kelas-admin" style="margin-top:8px;margin-bottom:0px;">
                        {{$done_class->name}}
                    </p>
                    <p class="info-text-login m-0">

                    </p>
                    {{-- <div class="d-flex align-items-center justify-content-between">
                        <div class="progress" style="padding: 4px;background: #E6EBED;border-radius: 10px;margin-top:8px;width:80%;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:100%;background: #FFC100;border-radius: 100px;">
                            </div>
                        </div>
                        <div>
                            <p class="m-0 text-progress">
                                Chapter 18/18
                            </p>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    @endforeach
    
</div>