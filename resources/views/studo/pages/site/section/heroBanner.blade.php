<div class="container" style="padding-top:40px;padding-bottom:80px;">
    @if (auth()->check())
    <div class="row m-0" style="padding: 24px;background: rgba(32, 162, 235, 0.1);border-radius: 5px;">
        <div class="col-sm-1">
        <img style="width:80px;height:80px;border-radius:100px;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
        </div>
        <div class="col-sm-8 d-grid align-items-center">
            <h2 class="title-text-login">
                Hi, {{$user->name}}
            </h2>
            <p>
            Lanjutkan pembelajaran kamu untuk kelas <b>BLACBLABCL - Chapter 9/11.</b>
            </p>
        </div>
        <div class="col-sm-3 d-grid align-items-center">
            <a class="nav-link text-right" href="#">
                <button class="btn my-2 my-sm-0 " style="color:white;background:#063852;" type="button">
                    <b>
                        Lanjut Belajar
                    </b>
                </button>
            </a>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-sm-4">
                <div style="background: rgba(32, 162, 235, 0.1);border-radius: 5px;padding: 24px;margin-top:8px;">
                    <div class="row">
                        <div class="col-sm-7">
                            <p class="fw-bold">
                                Kelas Programming
                            </p>
                            <p class="m-0">
                                Aku ingin menyelesaikan kelas ini untuk menambah ilmu
                            </p>
                        </div>
                        <div class="col-sm-5">
                            <center>

                                <p class="m-0">
                                    01/08/2023
                                </p>
                                -
                                <p class="m-0">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 17V0H9L9.4 2H15V12H8L7.6 10H2V17H0Z" fill="#FFC100"/>
                                    </svg>
                                    01/09/2023  
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="background: rgba(32, 162, 235, 0.1);border-radius: 5px;padding: 24px;margin-top:8px;">
                    <div class="row">
                        <div class="col-sm-7">
                            <p class="fw-bold">
                                Kelas Programming
                            </p>
                            <p class="m-0">
                                Aku ingin menyelesaikan kelas ini untuk menambah ilmu
                            </p>
                        </div>
                        <div class="col-sm-5">
                            <center>

                                <p class="m-0">
                                    01/08/2023
                                </p>
                                -
                                <p class="m-0">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 17V0H9L9.4 2H15V12H8L7.6 10H2V17H0Z" fill="#FFC100"/>
                                    </svg>
                                    01/09/2023  
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="background: rgba(32, 162, 235, 0.1);border-radius: 5px;padding: 24px;margin-top:8px;">
                    <div class="row">
                        <div class="col-sm-7">
                            <p class="fw-bold">
                                Kelas Programming
                            </p>
                            <p class="m-0">
                                Aku ingin menyelesaikan kelas ini untuk menambah ilmu
                            </p>
                        </div>
                        <div class="col-sm-5">
                            <center>

                                <p class="m-0">
                                    01/08/2023
                                </p>
                                -
                                <p class="m-0">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 17V0H9L9.4 2H15V12H8L7.6 10H2V17H0Z" fill="#FFC100"/>
                                    </svg>
                                    01/09/2023  
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-4">
            <img style="width:100%" src="{{ asset('/thumbnails/heroBanner.png') }}" alt="">
            
        </div>
        <div class="col-sm-8" style="display:grid; align-items:center;">
            <b>
                <h1 style="font-size: 48px;line-height: 58px;color: #20A2EB;font-weight:bold;">
                    Mulai Perjalanan Belajar Kamu Di Studo
                </h1>
            </b>
            <p class="desc-text-main">
                Pelajari keterampilan baru, perdalam pengetahuan, atau jelajahi minat pribadi
            </p>

            <a href="#kelasTersedia">
                <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;background:#063852;" type="submit">
                    <b>
                        Lihat Kelas
                    </b>
                </button>
            </a>
        </div>
    </div>
    @endif
</div>

