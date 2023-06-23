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
        background-color: white;

    }
</style>
@section('content')

    <body class="">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">
            <div class="row">
                <div>
                    @if (isset($slug))
                        <form action="{{ route('internal_tutor.class.updateInformasi', $slug) }}" method="POST" 
                        enctype="multipart/form-data" id="form-image">
                        @csrf
                    @else
                        <form action="{{ route('internal_tutor.class.storeInformasi') }}" method="POST"
                        enctype="multipart/form-data" id="form-image">
                        @csrf
                    @endif
                        <div class="container" style="margin-bottom:40px;margin-top:40px;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="" class="hover-img">
                                        <img style="width:100%;"
                                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q=="
                                            alt="">
                                    </a>
                                    <div class="form-group">
                                        <div  style="justify-content: center;align-items: center;">
                                            <a href="{{ route('internal_tutor.class.informasi') }}" class="button-text-login btn-masuk" style="text-decoration:none;display:flex;border: 1px solid #063852;border-radius: 5px;width:100%;color:#063852; border-color:#063852;background:white">
                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 16C1.95 16 1.47917 15.8042 1.0875 15.4125C0.695833 15.0208 0.5 14.55 0.5 14V11H2.5V14H14.5V11H16.5V14C16.5 14.55 16.3042 15.0208 15.9125 15.4125C15.5208 15.8042 15.05 16 14.5 16H2.5ZM7.5 12V3.85L4.9 6.45L3.5 5L8.5 0L13.5 5L12.1 6.45L9.5 3.85V12H7.5Z" fill="#1C1B1F"/>
                                                </svg>
                                                    &nbsp;&nbsp;Upload Thumbnail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="title-text-login">
                                        Buat Kelas Baru
                                    </h2>
                                    <div class="d-flex align-items-center">
                                        <div class="btn-info-kelas" style="margin:40 0px;">
                                            <p class="m-0" style="color:white;">
                                                Informasi Umum
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
                                                Quest
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
                                    @if($slug)
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input class="form-control" type="file" id="thumbnail" name="thumbnail" style="border: 1px solid black;border-radius:5px;"
                                            value="{{ old('thumbnail', isset($edit) ? $edit->thumbnail : '')}}">
                                            <p>File sebelumnya: {{ $edit->thumbnail }}</p>
                                        </div>
                                        <div class="form-group">
                                            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                                                Judul kelas <span style="color: #EB2020">*</span>
                                            </p>
                                            <input type="text" disabled placeholder="Digital Marketing" name="name"
                                            style="border: 1px solid black;border-radius:5px;" class="form-control"
                                            value="{{ old('name', isset($edit) ? $edit->name : '') }}">
                                        </div>
                                        <div style="margin-top:24px;">
                                            <label class="form-label semibold">Kategori <span style="color: #EB2020">*</span></label>
                                            <select class="custom-select" disabled name="category" id="inputGroupSelect02" style="border-color:black;">
                                                <option selected>Pilih Kategory</option>
                                                @php
                                                    $categories = [
                                                        'programming' => 'Programming & Web Development',
                                                        'graphic_design' => 'Graphic Design',
                                                        'digital_marketing' => 'Digital Marketing',
                                                        'business_skill' => 'Business Skills',
                                                        'data_science' => 'Data Science & Analytics',
                                                        'health' => 'Health & Wellness',
                                                        'language' => 'Language Learning',
                                                        'art_music' => 'Art & Music',
                                                        'photography' => 'Photography',
                                                        'personal_development' => 'Personal Development'
                                                    ];
                                                @endphp
                                                @foreach ($categories as $key => $value)
                                                    <option value="{{ $key }}" {{ old('category', isset($edit) ? $edit->category : '') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail<span style="color: #EB2020">*</span></label>
                                            <input class="form-control" type="file" id="thumbnail" name="thumbnail" 
                                                style="border: 1px solid black;border-radius:5px;" required="required">
                                        </div>
                                        <div class="form-group">
                                            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                                                Judul kelas <span style="color: #EB2020">*</span>
                                            </p>
                                            <input type="text" placeholder="Digital Marketing" name="name"
                                                style="border: 1px solid black;border-radius:5px;" class="form-control"
                                                required="required" value="{{ old('name', isset($edit) ? $edit->name : '') }}">
                                        </div>
                                        @php
                                            $categories = [
                                                'programming' => 'Programming & Web Development',
                                                'graphic_design' => 'Graphic Design',
                                                'digital_marketing' => 'Digital Marketing',
                                                'business_skill' => 'Business Skills',
                                                'data_science' => 'Data Science & Analytics',
                                                'health' => 'Health & Wellness',
                                                'language' => 'Language Learning',
                                                'art_music' => 'Art & Music',
                                                'photography' => 'Photography',
                                                'personal_development' => 'Personal Development'
                                            ];
                                        @endphp
                                        <div style="margin-top:24px;">
                                            <label class="form-label semibold">Kategori <span style="color: #EB2020">*</span></label>
                                            <select class="custom-select" name="category" id="inputGroupSelect02" style="border-color:black;" required="required">
                                                <option selected>Pilih Kategory</option>
                                                @foreach ($categories as $key => $value)
                                                    <option value="{{ $key }}" {{ old('category', isset($edit) ? $edit->category : '') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Deskripsi<span
                                                style="color: #EB2020">*</span></label>
                                        <textarea class="form-control" name="description" style="border-color:black;" placeholder="Deskripsikan Kelasmu"
                                            id="exampleFormControlTextarea1" rows="3">{{ old('description', isset($edit) ? $edit->description : '') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Benefit mengikuti kelas ini (Enter untuk membuat per point)<span
                                                style="color: #EB2020">*</span></label>
                                        <textarea class="form-control" name="competency_unit" style="border-color:black;" placeholder="Benefit"
                                            id="exampleFormControlTextarea1" rows="3">{{ old('competency_unit', isset($edit) ? $edit->competency_unit : '') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Durasi Total Pembelajaran (menit)<span
                                                style="color: #EB2020">*</span></label><span
                                                style="color: #EB2020"><br>Durasi Total akan muncul secara otomatis ketika kamu sudah membuat materi pembelajaran</span>
                                        <input type="text"
                                            style="border: 1px solid black;border-radius:5px;" class="form-control" value="{{ old('total_duration', isset($total_duration) ? $total_duration : '') }}" 
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
                                                    style="border: 1px solid black;border-radius:5px;" value="{{ old('price', isset($edit) ? $edit->price / (1 - ($edit->discount / 100 )): '') }}"
                                                    class="form-control" required="required" oninput="calculate()">
                                            </div>
                                        </div>
                                        <div
                                            style="padding: 8px 16px;border: 1px solid #636466;border-radius: 5px;margin:10px 0px">
                                            <div class="d-flex">
                                                <p style="color:#636466;margin-right:16px;width:150px;">Diskon (%)</p>
                                                <input id="discount" name="discount" type="number" placeholder="0"
                                                    style="border: 1px solid black;border-radius:5px;" value="{{ old('discount', isset($edit) ? $edit->discount : '') }}"
                                                    class="form-control" oninput="calculate()">
                                            </div>
                                        </div>
                                        <div
                                            style="padding: 8px 16px;border: 1px solid #636466;border-radius: 5px;margin:10px 0px">
                                            <div class="d-flex">
                                                <p style="color:#636466;margin-right:16px;width:150px;">Harga Akhir</p>
                                                <p id="finalPrice" ></p>
                                                <input type="hidden" id="finalPriceInput" name="price">
                                                <input type="hidden" name="user_id" value="{{ $tutor->id }}">
                                                @if($edit)
                                                    @if($edit->status == 'active')
                                                        <input type="hidden" name="status" value="active">
                                                    @else
                                                        <input type="hidden" name="status" value="deactive">
                                                    @endif
                                                @else
                                                    <input type="hidden" name="status" value="deactive">
                                                @endif
                                                @if($slug)
                                                    <input type="hidden" name="name" value="{{ old('name', isset($edit) ? $edit->name : '') }}">
                                                    <input type="hidden" name="category" value="{{ old('category', isset($edit) ? $edit->category : '') }}">
                                                    <input type="hidden" name="slug" value="{{ old('slug', isset($edit) ? $edit->slug : '') }}">
                                                @else
                                                    <input type="hidden" id="slug-input" name="slug">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div style="float:right;">
                                        <button class="btn my-2 my-sm-0"
                                            style="color:#063852; border-color:#063852;background:white; font-weight: bold">
                                            Selanjutnya
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        window.onload = function() {
            calculate();
        }

        function calculate() {
            var normalPrice = document.getElementById('normalPrice').value;
            var discount = document.getElementById('discount').value;

            if(normalPrice && discount){
                var finalPrice = normalPrice - (normalPrice * (discount / 100));

                document.getElementById('finalPrice').innerHTML = finalPrice;
                document.getElementById('finalPriceInput').value = finalPrice;
            }
        }
    </script>
    <script>
        var chapterCount = 0;

        $('#addChapter').click(function() {
            chapterCount++;
            var isActive = chapterCount === 1;

            // Add new tab
            var chapterTab = $(
                '<li class="nav-item">' +
                    '<a class="nav-link' + (isActive ? ' active' : '') + '" id="chapter-' + chapterCount + '-tab" data-bs-toggle="pill" data-bs-target="#chapter-' + chapterCount + '" role="tab">' +
                        'Chapter ' + chapterCount +
                    '</a>' +
                '</li>'
            );
            $('#chapterTabs').append(chapterTab);

        // Add new tab content
        });
    </script>
    <script>
        $(document).ready(function() {
            $('input[name="name"]').on('input', function() {
                let slug = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $('#slug-input').val(slug);
            });
        });
    </script>
@endsection
