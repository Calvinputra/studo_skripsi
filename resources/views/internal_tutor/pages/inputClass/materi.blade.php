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
    
th{
    color: #222222;
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
    .table-scroll{
        border-radius: 0px !important;
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
                                Chapter Kelas {{ $class->name }}
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
                        <div class="d-flex" style="justify-content: space-between;align-items: center;">
                            <div>
                                <p class="button-text-category">
                                    {{ $count_video }} Video, {{ $count_reading }} Reading <svg type="button" data-toggle="tooltip" data-placement="top" title="Tooltip on top" width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path 
                                    d="M9.5 15H11.5V9H9.5V15ZM10.5 7C10.7833 7 11.0208 6.90417 11.2125 6.7125C11.4042 6.52083 11.5 6.28333 11.5 6C11.5 5.71667 11.4042 5.47917 11.2125 5.2875C11.0208 5.09583 10.7833 5 10.5 5C10.2167 5 9.97917 5.09583 9.7875 5.2875C9.59583 5.47917 9.5 5.71667 9.5 6C9.5 6.28333 9.59583 6.52083 9.7875 6.7125C9.97917 6.90417 10.2167 7 10.5 7ZM10.5 20C9.11667 20 7.81667 19.7375 6.6 19.2125C5.38333 18.6875 4.325 17.975 3.425 17.075C2.525 16.175 1.8125 15.1167 1.2875 13.9C0.7625 12.6833 0.5 11.3833 0.5 10C0.5 8.61667 0.7625 7.31667 1.2875 6.1C1.8125 4.88333 2.525 3.825 3.425 2.925C4.325 2.025 5.38333 1.3125 6.6 0.7875C7.81667 0.2625 9.11667 0 10.5 0C11.8833 0 13.1833 0.2625 14.4 0.7875C15.6167 1.3125 16.675 2.025 17.575 2.925C18.475 3.825 19.1875 4.88333 19.7125 6.1C20.2375 7.31667 20.5 8.61667 20.5 10C20.5 11.3833 20.2375 12.6833 19.7125 13.9C19.1875 15.1167 18.475 16.175 17.575 17.075C16.675 17.975 15.6167 18.6875 14.4 19.2125C13.1833 19.7375 11.8833 20 10.5 20ZM10.5 18C12.7333 18 14.625 17.225 16.175 15.675C17.725 14.125 18.5 12.2333 18.5 10C18.5 7.76667 17.725 5.875 16.175 4.325C14.625 2.775 12.7333 2 10.5 2C8.26667 2 6.375 2.775 4.825 4.325C3.275 5.875 2.5 7.76667 2.5 10C2.5 12.2333 3.275 14.125 4.825 15.675C6.375 17.225 8.26667 18 10.5 18Z"
                                    fill="#FFC100" />
                                </svg>
                                </p>
                            </div>
                            {{-- Add Chapter --}}
                            <div style="margin:40px 0px;">
                                <div class="p-0" style="">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            <span class="google-text-login">Tambah Chapter &nbsp;&nbsp;</span>
                                            <a href="#" style="height:20px;" data-bs-toggle="modal" data-bs-target="#addChapterModal">
                                                <svg style="cursor:pointer;" width="30" height="30" viewBox="0 0 30 30"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                d="M13.5 22.5H16.5V16.5H22.5V13.5H16.5V7.5H13.5V13.5H7.5V16.5H13.5V22.5ZM15 30C12.925 30 10.975 29.6062 9.15 28.8187C7.325 28.0312 5.7375 26.9625 4.3875 25.6125C3.0375 24.2625 1.96875 22.675 1.18125 20.85C0.39375 19.025 0 17.075 0 15C0 12.925 0.39375 10.975 1.18125 9.15C1.96875 7.325 3.0375 5.7375 4.3875 4.3875C5.7375 3.0375 7.325 1.96875 9.15 1.18125C10.975 0.39375 12.925 0 15 0C17.075 0 19.025 0.39375 20.85 1.18125C22.675 1.96875 24.2625 3.0375 25.6125 4.3875C26.9625 5.7375 28.0312 7.325 28.8187 9.15C29.6062 10.975 30 12.925 30 15C30 17.075 29.6062 19.025 28.8187 20.85C28.0312 22.675 26.9625 24.2625 25.6125 25.6125C24.2625 26.9625 22.675 28.0312 20.85 28.8187C19.025 29.6062 17.075 30 15 30ZM15 27C18.35 27 21.1875 25.8375 23.5125 23.5125C25.8375 21.1875 27 18.35 27 15C27 11.65 25.8375 8.8125 23.5125 6.4875C21.1875 4.1625 18.35 3 15 3C11.65 3 8.8125 4.1625 6.4875 6.4875C4.1625 8.8125 3 11.65 3 15C3 18.35 4.1625 21.1875 6.4875 23.5125C8.8125 25.8375 11.65 27 15 27Z"
                                                fill="#063852" />
                                            </svg>
                                            </a>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        {{-- Input --}}
                        <form id="materiForm" action="{{ route('internal_tutor.class.storeMateri', $class->slug) }}"
                            method="POST">
                            @csrf
                            <!-- Modal -->
                            <div class="modal fade" id="addChapterModal" tabindex="-1"
                                aria-labelledby="addChapterModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addChapterModalLabel">Add Chapter</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <select class="form-select" id="addChapterType" name="type">
                                                    <option value="">Select type</option>
                                                    <option value="video">Video</option>
                                                    <option value="reading">Reading</option>
                                                </select>
                                            </div>
                                            <div class="mb-3" id="addChapterTitleGroup" style="display: none;">
                                                <input type="text" class="form-control" id="chapterTitle"
                                                    name="name" placeholder="Enter title">
                                            </div>
                                            <div class="mb-3" id="addChapterDescriptionGroup" style="display: none;">
                                                <textarea class="form-control" id="chapterDescription" name="description" placeholder="Enter description"></textarea>
                                            </div>
                                            <div class="mb-3" id="addChapterUrlGroup" style="display: none;">
                                                <input type="text" class="form-control" id="chapterUrl"
                                                    name="url" placeholder="Enter video link">
                                            </div>
                                            <div class="mb-3" id="addChapterContentGroup" style="display: none;">
                                                <textarea class="form-control" id="chapterContent" name="reading" placeholder="Enter reading material"></textarea>
                                            </div>
                                            <div class="mb-3" id="addChapterDurationGroup" style="display: none;">
                                                <input type="number" class="form-control" id="chapterDuration"
                                                    name="duration" placeholder="Minute">
                                            </div>
                                            <div class="mb-3" id="addChapterPriorityGroup" style="display: none;">
                                                <input type="number" class="form-control" id="chapterPriority"
                                                    name="priority" placeholder="Priority">
                                            </div>
                                        </div>
                                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- Edit --}}
                        @if ($chapters)
                            <section class="intro">
                                <div class="bg-image">
                                    <div class="mask d-flex align-items-center">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="card shadow-2-strong">
                                                        <div style="padding:16px;">
                                                            <div class="card-body p-0">
                                                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                                                    <table id="myTable" class="table mb-0" style="background-color: rgba(32, 162, 235, 0.1)">
                                                                        <thead style="background-color: rgba(32, 162, 235, 0.1);border-radius: 5px;">
                                                                            <tr class="text-uppercase" style="color: white">
                                                                                <th scope="col" class="filter" data-filter="type">Type</th>
                                                                                <th scope="col" class="filter" data-filter="name">Nama Chapter</th>
                                                                                <th scope="col" class="filter" data-filter="duration">Duration</th>
                                                                                <th scope="col" class="filter" data-filter="priority">Priority</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($chapters as $chapter)
                                                                                <tr>
                                                                                    <td>{{ $chapter->type }}</td>
                                                                                    <td>{{ $chapter->name }}</td>
                                                                                    <td>{{ $chapter->duration }}</td>
                                                                                    <td>{{ $chapter->priority }}</td>
                                                                                    <td>
                                                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                                                            <a href="" style="color: #20A2EB;">Edit</a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @else
                            <div>
                                Chapter Belum tersedia, Buatlah Chapter Terlebih Dahulu
                            </div>
                        @endif
                        @if($count_chapter >= 5)
                            <div style="float:right;" class="pt-3">
                                <a class="btn my-2 my-sm-0" href="{{ route('internal_tutor.class.quest', $class->slug) }}"
                                    style="color:#063852; border-color:#063852;background:white;font-weight: bold">
                                    Selanjutnya
                                </a>
                            </div>
                        @else
                            <div style="float:right;" class="pt-3">
                                <a class="btn my-2 my-sm-0"
                                    style="color:rgba(230, 235, 237, 1); border-color:rgba(230, 235, 237, 1);font-weight: bold">
                                    Selanjutnya
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        // Wait for the modal to be fully shown
        $('#addChapterModal').on('shown.bs.modal', function() {
            // Get the form elements
            var addChapterTypeSelect = document.getElementById('addChapterType');
            var addChapterTitleGroup = document.getElementById('addChapterTitleGroup');
            var addChapterDurationGroup = document.getElementById('addChapterDurationGroup');
            var addChapterPriorityGroup = document.getElementById('addChapterPriorityGroup');
            var addChapterDescriptionGroup = document.getElementById('addChapterDescriptionGroup');
            var addChapterUrlGroup = document.getElementById('addChapterUrlGroup');
            var addChapterContentGroup = document.getElementById('addChapterContentGroup');

            // Handle change event on chapterTypeSelect
            addChapterTypeSelect.addEventListener('change', function() {
                var selectedAddChapterType = addChapterTypeSelect.value;

                // Hide all form groups first
                addChapterTitleGroup.style.display = 'none';
                addChapterDurationGroup.style.display = 'none';
                addChapterPriorityGroup.style.display = 'none';
                addChapterDescriptionGroup.style.display = 'none';
                addChapterUrlGroup.style.display = 'none';
                addChapterContentGroup.style.display = 'none';

                // Show form groups based on selectedAddChapterType
                if (selectedAddChapterType === 'video') {
                    addChapterTitleGroup.style.display = 'block';
                    addChapterDurationGroup.style.display = 'block';
                    addChapterPriorityGroup.style.display = 'block';
                    addChapterDescriptionGroup.style.display = 'block';
                    addChapterUrlGroup.style.display = 'block';
                } else if (selectedAddChapterType === 'reading') {
                    addChapterTitleGroup.style.display = 'block';
                    addChapterDurationGroup.style.display = 'block';
                    addChapterPriorityGroup.style.display = 'block';
                    addChapterContentGroup.style.display = 'block';
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
