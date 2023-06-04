@extends('internal_tutor.main')
<style>
    .active[aria-selected="true"] {
        background: #20A2EB;
        border-radius: 5px;
        fill: white;
        color: white
    }

    .active[aria-selected="true"]:hover {
        background: #20A2EB;
    }

    .active path {
        fill: white !important;
    }

    .active span {
        color: white !important;
    }

    .hover-dashboard:hover {
        background: rgba(32, 162, 235, 0.1);
        border-radius: 5px;
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

    a {
        text-decoration: none !important;
    }


    .hover-img:hover .middle {
        opacity: 1;
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
        border-radius: 5px;
        justify-content: center;
        align-items: center;
        padding: 10px 16px;
    }
</style>
@section('content')

    <body class="">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">
            <div class="row">
                <div>
                    <form action="{{ route('internal_tutor.class.store') }}" method="POST"
                        enctype="multipart/form-data" id="form-image">
                        @csrf
                        <div class="container" style="margin-bottom:40px;margin-top:40px;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="" class="hover-img">
                                        <img style="width:100%;"
                                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q=="
                                            alt="">
                                        <div class="middle">
                                            <div class="text hover-text-card">Upload</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="title-text-login">
                                        Buat Kelas Baru
                                    </h2>
                                    <div class="d-flex align-items-center">
                                        <div class="btn-info-kelas" style="margin:40 0px;">
                                            <p class="m-0" style="color:white;">
                                                informasi Umum
                                            </p>
                                        </div>
                                        <div style="margin:0px 16px;">
                                            <svg width="42" height="23" viewBox="0 0 42 23" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M41.0607 12.5607C41.6464 11.9749 41.6464 11.0251 41.0607 10.4393L31.5147 0.893398C30.9289 0.307611 29.9792 0.307611 29.3934 0.893398C28.8076 1.47919 28.8076 2.42893 29.3934 3.01472L37.8787 11.5L29.3934 19.9853C28.8076 20.5711 28.8076 21.5208 29.3934 22.1066C29.9792 22.6924 30.9289 22.6924 31.5147 22.1066L41.0607 12.5607ZM0 13H40V10H0V13Z"
                                                    fill="#063852" />
                                            </svg>
                                        </div>
                                        <div class="btn-info-kelas-off" style="margin:40 0px;">
                                            <p class="m-0" style="">
                                                Materi Pembelajaran
                                            </p>
                                        </div>
                                        <div style="margin:0px 16px;">
                                            <svg width="42" height="23" viewBox="0 0 42 23" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M41.0607 12.5607C41.6464 11.9749 41.6464 11.0251 41.0607 10.4393L31.5147 0.893398C30.9289 0.307611 29.9792 0.307611 29.3934 0.893398C28.8076 1.47919 28.8076 2.42893 29.3934 3.01472L37.8787 11.5L29.3934 19.9853C28.8076 20.5711 28.8076 21.5208 29.3934 22.1066C29.9792 22.6924 30.9289 22.6924 31.5147 22.1066L41.0607 12.5607ZM0 13H40V10H0V13Z"
                                                    fill="#063852" />
                                            </svg>
                                        </div>
                                        <div class="btn-info-kelas-off" style="margin:40 0px;">
                                            <p class="m-0" style="">
                                                Project
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail<span style="color: #EB2020">*</span></label>
                                        <input class="form-control" type="file" id="thumbnail" name="thumbnail"
                                            style="border: 1px solid black;border-radius:5px;" required="required">
                                    </div>
                                    <div class="form-group">
                                        <p
                                            style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                                            Judul kelas <span style="color: #EB2020">*</span>
                                        </p>
                                        <input type="text" placeholder="Digital Marketing" name="name"
                                            style="border: 1px solid black;border-radius:5px;" class="form-control"
                                            required="required">
                                    </div>
                                    <div style="margin-top:24px;">
                                        <label class="form-label semibold">Kategori <span
                                                style="color: #EB2020">*</span></label>
                                        <select class="custom-select" name="category" id="inputGroupSelect02"
                                            style="border-color:black;" required="required">
                                            <option selected>Pilih Kategory</option>
                                            <option value="programming">Programming & Web Development</option>
                                            <option value="graphic_design">Graphic Design</option>
                                            <option value="digital_marketing">Digital Marketing</option>
                                            <option value="business_skill">Business Skills</option>
                                            <option value="data_science">Data Science & Analytics</option>
                                            <option value="health">Health & Wellness</option>
                                            <option value="language">Language Learning</option>
                                            <option value="art_music">Art & Music</option>
                                            <option value="photography">Photography</option>
                                            <option value="personal_development">Personal Development</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Deskripsi<span
                                                style="color: #EB2020">*</span></label>
                                        <textarea class="form-control" name="description" style="border-color:black;" placeholder="Deskripsikan Kelasmu"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Benefit mengikuti kelas ini<span
                                                style="color: #EB2020">*</span></label>
                                        <textarea class="form-control" name="competency_unit" style="border-color:black;" placeholder="Benefit"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Durasi Total Pembelajaran (menit)<span
                                                style="color: #EB2020">*</span></label>
                                        <input type="text"
                                            placeholder="Otomatis Kalkulasi dari total Durasi Chapter" name="duration"
                                            style="border: 1px solid black;border-radius:5px;" class="form-control"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Harga<span
                                                style="color: #EB2020">*</span></label>
                                        <div
                                            style="padding: 8px 16px;border: 1px solid #636466;border-radius: 5px;margin:10px 0px">
                                            <div class="d-flex">
                                                <p style="color:#636466;margin-right:16px;width:150px;">Harga
                                                    Normal<span style="color: #EB2020">*</span></label></p>
                                                <input id="normalPrice" type="number" placeholder="100000"
                                                    style="border: 1px solid black;border-radius:5px;"
                                                    class="form-control" required="required" oninput="calculate()">
                                            </div>
                                        </div>
                                        <div
                                            style="padding: 8px 16px;border: 1px solid #636466;border-radius: 5px;margin:10px 0px">
                                            <div class="d-flex">
                                                <p style="color:#636466;margin-right:16px;width:150px;">Diskon (%)</p>
                                                <input id="discount" name="discount" type="number" placeholder="0"
                                                    style="border: 1px solid black;border-radius:5px;"
                                                    class="form-control" oninput="calculate()">
                                            </div>
                                        </div>
                                        <div
                                            style="padding: 8px 16px;border: 1px solid #636466;border-radius: 5px;margin:10px 0px">
                                            <div class="d-flex">
                                                <p style="color:#636466;margin-right:16px;width:150px;">Harga Akhir</p>
                                                <p id="finalPrice"></p>
                                                <input type="hidden" id="finalPriceInput" name="price">
                                                <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                                                <input type="hidden" name="status" value="deactive">
                                                <input type="hidden" name="duration" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="float:right;">
                                        <a href="{{ route('internal_tutor.class.materi') }}">
                                            <button class="btn my-2 my-sm-0"
                                                style="color:#063852; border-color:#063852;background:white">
                                                Selanjutnya
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
