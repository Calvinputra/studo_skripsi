@extends('internal_tutor.main')
<style>
    .active[aria-selected="true"]{
        background: #20A2EB;
        border-radius: 5px;
        fill:white;
        color:white
    }
    .active[aria-selected="true"]:hover{
        background: #20A2EB;
    }
    .active path{
        fill:white !important;
    }
    .active span{
        color:white !important;
    }
    .hover-dashboard:hover{
        background: rgba(32, 162, 235, 0.1);
        border-radius: 5px;
    }
    </style>
@section('content')
    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">        
            <div class="row">
                <div class="col-sm-4">
                @if($class)
                    <img style="width:100%;"
                        src="{{ asset($class->thumbnail) }}"
                        alt="">
                @else
                    <img style="width:100%;"
                        src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q=="
                        alt="">
                @endif
                </div>
                <div class="col-sm-8">
                    <div class="tab-content">
                        <div class="container" style="margin-bottom:40px;margin-top:40px;">        
                                <div class="row">
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
                                            Quest
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
                                    @if(!$check_project)
                                        <form action="{{ route('internal_tutor.class.storeProject', $class->slug) }}"method="POST"
                                            enctype="multipart/form-data" id="form-image">
                                            @csrf
                                            <div class="form-group">
                                                <p class="text-kelas-baru">
                                                    Soal Project<span style="color: #EB2020">*</span>
                                                </p>
                                                <input type="text" placeholder="Description Project" name="description" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-kelas-baru">
                                                    Upload Foto
                                                </p>
                                                <input type="file" name="photo" style="border: 1px solid black;border-radius:5px;" class="form-control">
                                            </div>
                                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                                            <div style="float:left;" class="pt-3">
                                                <a class="btn my-2 my-sm-0" href="{{ route('internal_tutor.class.quest', $class->slug) }}"
                                                    style="color:#063852; border-color:#063852;background:white;font-weight: bold">
                                                    Sebelumnya
                                                </a>
                                            </div>
                                            <div style="float:right;">
                                                <button class="btn my-2 my-sm-0" style="color:white;background:#063852" type="submit">
                                                    <b>
                                                        Simpan
                                                    </b>
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('internal_tutor.class.updateProject', ['slug' => $class->slug, 'id' => $check_project->id]) }}" 
                                            method="POST" enctype="multipart/form-data" id="form-image">
                                            @csrf
                                            <div class="form-group">
                                                <p class="text-kelas-baru">
                                                    Soal Project<span style="color: #EB2020">*</span>
                                                </p>
                                                <input type="text" value="{{ $check_project->description }}" placeholder="Description Project" name="description" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-kelas-baru">
                                                    Upload Foto
                                                </p>
                                                <input type="file" name="photo" style="border: 1px solid black;border-radius:5px;" class="form-control">
                                            </div>
                                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                                            <input type="hidden" name="id" value="{{ $check_project->id }}">
                                            <div style="float:left;" class="pt-3">
                                                <a class="btn my-2 my-sm-0" href="{{ route('internal_tutor.class.quest', $class->slug) }}"
                                                    style="color:#063852; border-color:#063852;background:white;font-weight: bold">
                                                    Sebelumnya
                                                </a>
                                            </div>
                                            <div style="float:right;" class="pt-3">
                                                <button class="btn my-2 my-sm-0" style="color:white;background:#063852" type="submit">
                                                    <b>
                                                        Update
                                                    </b>
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>


@endsection