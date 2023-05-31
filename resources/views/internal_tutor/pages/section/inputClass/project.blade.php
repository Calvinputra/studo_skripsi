@extends('internal_tutor.main')

@section('content')
 <div class="container" style="margin-bottom:40px;margin-top:40px;">        
        <div class="row">
        <h2 class="itle-text-login">
            Buat Kelas Baru
        </h2>
        <div class="d-flex align-items-center">
            <div class="btn-info-kelas" style="margin:40 0px;">
                <p class="m-0" style="color:white;">
                    informasi Umum
                </p>
            </div>
            <div style="margin:0px 16px;">
                <svg width="42" height="23" viewBox="0 0 42 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M41.0607 12.5607C41.6464 11.9749 41.6464 11.0251 41.0607 10.4393L31.5147 0.893398C30.9289 0.307611 29.9792 0.307611 29.3934 0.893398C28.8076 1.47919 28.8076 2.42893 29.3934 3.01472L37.8787 11.5L29.3934 19.9853C28.8076 20.5711 28.8076 21.5208 29.3934 22.1066C29.9792 22.6924 30.9289 22.6924 31.5147 22.1066L41.0607 12.5607ZM0 13H40V10H0V13Z" fill="#063852"/>
                </svg>
            </div>
            <div class="btn-info-kelas" style="margin:40 0px;">
                <p class="m-0" style="">
                    Materi Pembelajaran
                </p>
            </div>
            <div style="margin:0px 16px;">
                <svg width="42" height="23" viewBox="0 0 42 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M41.0607 12.5607C41.6464 11.9749 41.6464 11.0251 41.0607 10.4393L31.5147 0.893398C30.9289 0.307611 29.9792 0.307611 29.3934 0.893398C28.8076 1.47919 28.8076 2.42893 29.3934 3.01472L37.8787 11.5L29.3934 19.9853C28.8076 20.5711 28.8076 21.5208 29.3934 22.1066C29.9792 22.6924 30.9289 22.6924 31.5147 22.1066L41.0607 12.5607ZM0 13H40V10H0V13Z" fill="#063852"/>
                </svg>
            </div>
            <div class="btn-info-kelas" style="margin:40 0px;">
                <p class="m-0" style="">
                    Project
                </p>
            </div>
        </div>
        <div>
            <div class="form-group">
                <p class="text-kelas-baru">
                    Soal Project<span style="color: #EB2020">*</span>
                </p>
                <input type="" value="" placeholder="Digital Marketing" name="name" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
            </div>

            <div class="form-group">
                <p class="text-kelas-baru">
                    Upload Foto
                </p>
                <input type="" value="" placeholder="Digital Marketing" name="name" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
            </div>

            <div style="float:right;">
                <button class="btn my-2 my-sm-0" style="color:white;background:#063852" type="button">
                    <b>
                        Simpan
                    </b>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection