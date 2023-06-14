@extends('internal_tutor.main')
<style>
    table td,
    table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .card {
        border-radius: .5rem;
    }
    .upload{
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 24px;
        gap: 32px;
        background: rgba(32, 162, 235, 0.1);
        border-radius: 5px;
        justify-content:space-between;
    }

    .table-scroll {
        border-radius: .5rem;
    }

    thead {
        top: 0;
        position: sticky;
    }

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

    [value=Video] {
        display: none;
    }


    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #063852;
        font-weight: 700;
        border-bottom: 3px #063852 solid !important;

    }

    .nav-tabs .nav-link {
        color: #063852;
        font-weight: 400;
        border-radius: 0px !important;
        border: none;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        border-bottom: 1px #063852 solid;
        cursor: pointer;
    }

    .nav-link {
        color: #063852 !important;
    }
</style>
@section('content')

    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">
            <div class="row">
                <div class="col-sm-3">
                    <img style="width:100%;height:;margin:0px;"
                    src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q=="
                    alt="">
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                            <h2 class="title-text-login">
                                Buat Chapter Baru dari Kelas {{ $class->name }}
                            </h2>
                        <div class="d-flex align-items-center" >
                            <div class="btn-info-kelas" style="margin:40 0px;">
                                <p class="m-0" style="color:white;">
                                    Informasi Umum
                            </div>
                            <div style="margin:0px 16px;">
                                <svg width="42" height="23" viewBox="0 0 42 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M41.0607 12.5607C41.6464 11.9749 41.6464 11.0251 41.0607 10.4393L31.5147 0.893398C30.9289 0.307611 29.9792 0.307611 29.3934 0.893398C28.8076 1.47919 28.8076 2.42893 29.3934 3.01472L37.8787 11.5L29.3934 19.9853C28.8076 20.5711 28.8076 21.5208 29.3934 22.1066C29.9792 22.6924 30.9289 22.6924 31.5147 22.1066L41.0607 12.5607ZM0 13H40V10H0V13Z"
                                        fill="#063852" />
                                </svg>
                            </div>
                            <div class="btn-info-kelas" style="margin:40 0px;">
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
                            <div class="btn-info-kelas" style="margin:40 0px;">
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
                    </div>
                    <div class="">
                        <div>
                            <p class="text-kelas-admin">
                                Ketentuan Upload Soal
                            </p>
                            <p style="margin-top:24px;">
                                1. Soal yang dibuat minimal 5 butir dengan maksimal 10 butir soal.
                                <br>
                                2. Soal yang dibuat mencakup Quest: Pre-Test dan Quest: Post-Test.
                                <br>
                                3. Jawaban terdiri dari pilihan A-D.
                            </p>
                        </div>
                        <div style="margin-top:40px;">
                            <a href="" >
                                <u>
                                    Download Template Soal
                                </u>
                            </a>
                        </div>
                        <div style="margin-top:40px;">
                            <div class="upload">
                                <div class="d-flex align-items-center">
                                    <div>
                                    <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.00033 26.8334C3.08366 26.8334 2.29894 26.507 1.64616 25.8542C0.993381 25.2014 0.666992 24.4167 0.666992 23.5V18.5H4.00033V23.5H24.0003V18.5H27.3337V23.5C27.3337 24.4167 27.0073 25.2014 26.3545 25.8542C25.7017 26.507 24.917 26.8334 24.0003 26.8334H4.00033ZM12.3337 20.1667V6.58335L8.00033 10.9167L5.66699 8.50002L14.0003 0.166687L22.3337 8.50002L20.0003 10.9167L15.667 6.58335V20.1667H12.3337Z" fill="#1C1B1F"/>
                                    </svg>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div>
                                        <p class="title-text-card" style="margin-bottom:8px;">
                                            Upload Soal Quest: Pre-Test    
                                        </p>
                                        <p class="m-0">
                                            File dalam bentuk .xls
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn my-2 my-sm-0 "style="color:white;background:#063852;" type="button">
                                        <b>
                                            Upload
                                        </b>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top:24px;">
                            <div class="upload">
                                <div class="d-flex align-items-center">
                                    <div>
                                    <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.00033 26.8334C3.08366 26.8334 2.29894 26.507 1.64616 25.8542C0.993381 25.2014 0.666992 24.4167 0.666992 23.5V18.5H4.00033V23.5H24.0003V18.5H27.3337V23.5C27.3337 24.4167 27.0073 25.2014 26.3545 25.8542C25.7017 26.507 24.917 26.8334 24.0003 26.8334H4.00033ZM12.3337 20.1667V6.58335L8.00033 10.9167L5.66699 8.50002L14.0003 0.166687L22.3337 8.50002L20.0003 10.9167L15.667 6.58335V20.1667H12.3337Z" fill="#1C1B1F"/>
                                    </svg>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div>
                                        <p class="title-text-card" style="margin-bottom:8px;">
                                            Upload Soal Quest: Post-Test    
                                        </p>
                                        <p class="m-0">
                                            File dalam bentuk .xls
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn my-2 my-sm-0 "style="color:white;background:#063852;" type="button">
                                        <b>
                                            Upload
                                        </b>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div style="float:right;margin-top:40px;">
                            <button class="btn my-2 my-sm-0"
                                style="color:#063852; border-color:#063852;background:white">
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Wait for the modal to be fully shown
        $('#addChapterModal').on('shown.bs.modal', function() {
            // Get the form elements
            var chapterTypeSelect = document.getElementById('chapterType');
            var chapterTitleGroup = document.getElementById('chapterTitleGroup');
            var chapterDurationGroup = document.getElementById('chapterDurationGroup');
            var chapterPriorityGroup = document.getElementById('chapterPriorityGroup');
            var chapterDescriptionGroup = document.getElementById('chapterDescriptionGroup');
            var chapterUrlGroup = document.getElementById('chapterUrlGroup');
            var chapterContentGroup = document.getElementById('chapterContentGroup');

            // Handle change event on chapterTypeSelect
            chapterTypeSelect.addEventListener('change', function() {
                var selectedChapterType = chapterTypeSelect.value;

                // Hide all form groups first
                chapterTitleGroup.style.display = 'none';
                chapterDurationGroup.style.display = 'none';
                chapterPriorityGroup.style.display = 'none';
                chapterDescriptionGroup.style.display = 'none';
                chapterUrlGroup.style.display = 'none';
                chapterContentGroup.style.display = 'none';

                // Show form groups based on selectedChapterType
                if (selectedChapterType === 'video') {
                    chapterTitleGroup.style.display = 'block';
                    chapterDurationGroup.style.display = 'block';
                    chapterPriorityGroup.style.display = 'block';
                    chapterDescriptionGroup.style.display = 'block';
                    chapterUrlGroup.style.display = 'block';
                } else if (selectedChapterType === 'reading') {
                    chapterTitleGroup.style.display = 'block';
                    chapterDurationGroup.style.display = 'block';
                    chapterPriorityGroup.style.display = 'block';
                    chapterContentGroup.style.display = 'block';
                }
            });
        });
    </script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
@endsection
