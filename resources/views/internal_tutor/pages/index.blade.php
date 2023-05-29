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
                    <div class="d-flex" style="background: rgba(32, 162, 235, 0.1);border-radius: 5px; padding:16px;">
                        <img style="width: 60px;height:60px;margin:0px;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
                        <div style="margin-left:16px;display:grid; align-items:center;">
                            <p class="desc-text-login m-0">
                                {{ $tutor->name }}
                            </p>
                            <p class="m-0">
                                Tutor
                            </p>
                        </div>
                    </div>    
                    <div style="margin-top:16px;">
                        <button class="btn my-2 my-sm-0" style="color:white;background:#063852;width:100%;" type="button">
                            <b>
                                Tarik Saldo
                            </b>
                        </button>
                    </div>
                    <div style="border: 1px solid #E6EBED;margin:24px 0px;">
                    </div>
                    <ul class="nav" style="display:grid;">
                        <a class="hover-dashboard"  id="nav-profile-tab" data-bs-toggle="tab" href="#profile" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="19" height="21" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path style="fill:black" d="M14.5 21L13.1 17.9L10 16.5L13.1 15.1L14.5 12L15.9 15.1L19 16.5L15.9 17.9L14.5 21ZM0 18V6L8 0L16 6V10.175C15.75 10.1083 15.4958 10.0625 15.2375 10.0375C14.9792 10.0125 14.725 10 14.475 10C12.6583 10 11.125 10.6333 9.875 11.9C8.625 13.1667 8 14.7 8 16.5C8 16.75 8.0125 17 8.0375 17.25C8.0625 17.5 8.10833 17.75 8.175 18H0Z" fill="white"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Dashboard
                                </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-password-tab" data-bs-toggle="tab" href="#password" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.24922 20L7.84922 16.8C7.63255 16.7167 7.42839 16.6167 7.23672 16.5C7.04505 16.3833 6.85755 16.2583 6.67422 16.125L3.69922 17.375L0.949219 12.625L3.52422 10.675C3.50755 10.5583 3.49922 10.4458 3.49922 10.3375V9.6625C3.49922 9.55417 3.50755 9.44167 3.52422 9.325L0.949219 7.375L3.69922 2.625L6.67422 3.875C6.85755 3.74167 7.04922 3.61667 7.24922 3.5C7.44922 3.38333 7.64922 3.28333 7.84922 3.2L8.24922 0H13.7492L14.1492 3.2C14.3659 3.28333 14.5701 3.38333 14.7617 3.5C14.9534 3.61667 15.1409 3.74167 15.3242 3.875L18.2992 2.625L21.0492 7.375L18.4742 9.325C18.4909 9.44167 18.4992 9.55417 18.4992 9.6625V10.3375C18.4992 10.4458 18.4826 10.5583 18.4492 10.675L21.0242 12.625L18.2742 17.375L15.3242 16.125C15.1409 16.2583 14.9492 16.3833 14.7492 16.5C14.5492 16.6167 14.3492 16.7167 14.1492 16.8L13.7492 20H8.24922ZM11.0492 13.5C12.0159 13.5 12.8409 13.1583 13.5242 12.475C14.2076 11.7917 14.5492 10.9667 14.5492 10C14.5492 9.03333 14.2076 8.20833 13.5242 7.525C12.8409 6.84167 12.0159 6.5 11.0492 6.5C10.0659 6.5 9.23672 6.84167 8.56172 7.525C7.88672 8.20833 7.54922 9.03333 7.54922 10C7.54922 10.9667 7.88672 11.7917 8.56172 12.475C9.23672 13.1583 10.0659 13.5 11.0492 13.5Z" fill="#1C1B1F"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Pengaturan
                                </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-goals-tab" data-bs-toggle="tab" href="#goals" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 17V0H9L9.4 2H15V12H8L7.6 10H2V17H0Z" fill="#1C1B1F"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Goals
                                </span>
                            </div>
                        </a>
                    </ul>
                    <div style="border: 1px solid #E6EBED;margin:24px 0px;">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('internal_tutor.class.index') }}" class="button-text-login btn-masuk" style="width:100%;color:#063852; border-color:#063852;background:white">Buat Kelas Baru</a>
                    </div>
                </div>
                
                <div class="col-sm-8">
                    <div class="tab-content">
                        @include('internal_tutor.pages.section.dashboard')
                    </div>
                </div>
            </div>
        </div>
        
    </body>


@endsection