<style>
    a{
        text-decoration: none;
        
    }
    a:hover{
        text-decoration:none;

    }
    .active[aria-selected="true"]{
        background: #063852 !important;
        border-radius: 5px;
        color:white !important;
        padding: 10px 16px;
}
.active[aria-selected="true"]:hover{
}

.active span{
    color:white !important;
}
</style>
<div style="margin-top:40px;">
    <div>
        <p style="font-weight: 400;font-size: 18px;line-height: 22px;">
            {{ $class->category }}
        </p>
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            {{ $class->name }}
        </h2>
        <div class="d-flex align-items-center">
            <p>
                {{ $class->tutor_name }}
            </p>
        </div>
        <div>
            <img style="width:100%;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">

        </div>
        @if (auth()->check() && $subscription)
            <!-- login -->
            <div style="margin-top:40px;">
                <ul class="nav">
                    <div class="nav-item">
                        <a class="btn-overview active" id="nav-benefit-tab" data-bs-toggle="tab" href="#kelas">
                            <b>
                                Detail Kelas
                            </b>
                        </a>
                    </div>
                    <div class="nav-item" style="margin:0px 16px;">
                        <a class="btn-overview" id="nav-benefit-tab" data-bs-toggle="tab" href="#forum">
                            <b>
                                Forum
                            </b>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="btn-overview" id="nav-review-tab" data-bs-toggle="tab" href="#project">
                            <b>
                                Project
                            </b>
                        </a>
                    </div>
                    <div class="nav-item" style="margin:0px 16px;">
                        <a class="btn-overview" id="nav-review-tab" data-bs-toggle="tab" href="#leaderboard">
                            <b>
                                Leaderboard
                            </b>
                        </a>
                    </div>

                </ul>
            </div>
        @else
            <!-- not login  -->
            <div style="margin-top:40px;">
                <ul class="nav">
                    <div class="nav-item">
                        <a  id="nav-benefit-tab" data-bs-toggle="tab" href="#kelas" class="btn-overview active">
                            <b>
                                Tentang Kelas
                            </b>
                        </a>
                    </div>
                    <div class="nav-item" style="margin:0px 16px;" >
                        <a  id="nav-benefit-tab" data-bs-toggle="tab" href="#benefit" class="btn-overview">
                            <b>
                                Benefit
                            </b>
                        </a>
                    </div>
                    {{-- <div class="nav-item">
                        <a  id="nav-review-tab" data-bs-toggle="tab" href="#review" class="btn-overview">
                            <b>
                                Review
                            </b>
                        </a>
                    </div> --}}
                </ul>
            </div>
        @endif
    </div>
</div>