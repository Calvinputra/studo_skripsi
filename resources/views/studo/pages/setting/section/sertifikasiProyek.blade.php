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
<div class="row tab-pane fade" id="sertifProyek" role="tabpanel">
    <div class="d-flex align-items-center justify-content-between" style="margin-top:40px;">
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Sertifikat & Nilai Proyek
        </h2>
        <p class="m-0">
            {{ count($check_done_class) }} Kelas
        </p>
    </div>
    @foreach($check_done_class as $done_class)
        <div class="row" style="margin:16px 0px;">
            <div class="col-sm-4">
                <img class="" style="width:215px;" src="{{ $done_class->thumbnail }}" alt="">
            </div>
            <div class="col-sm-6 d-grid align-items-center">
                <div>
                    <p class="info-text-login m-0">
                        {{ $done_class->category }}
                    </p>
                    <p class="text-kelas-admin" style="margin-top:8px;margin-bottom:0px;">
                        {{ $done_class->name }}
                    </p>
                    <p class="info-text-login m-0">
                        {{ $done_class->user_name }}
                    </p>
                    <div style="margin-top:8px;">
                        <button class="btn my-2 my-sm-0 "data-bs-toggle="modal" data-bs-target="#registerModal" style="color:white;background:#063852;" type="button">
                            <b>
                                Download Sertifikat
                            </b>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-sm-2">
                <p style="margin-bottom:8px;">
                    Nilai Proyek
                </p>
                <div style="border-radius: 5px;border: 1px solid #20A2EB;height:71px;vertical-align: middle;width:95px;display: table-cell;">
                    <center>
                        <p class="m-0">
                            <span style="color:#20A2EB !important;">{{ $done_class->project_score }}</span>/100
                        </p>
                    </center>
                </div>
            </div>
        </div>
    @endforeach
</div>