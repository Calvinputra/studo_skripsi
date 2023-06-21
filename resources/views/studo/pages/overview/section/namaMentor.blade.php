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
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, minmax(220px, 1fr));
    grid-gap: 32px;
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
            @if($chapter == null)
                <img style="width:100%;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
            @else
                @if($chapter->type == "reading")
                    {{ $chapter->reading }}
                @else
                    <iframe width="560" height="315" src="{{ $embedUrl }}" frameborder="0"
                     allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
            @endif
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
            <div style="margin-top:24px;" class="tab-pane active" id="kelas" role="tabpanel">
                <div>
                    <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
                        Tentang Kelas
                    </p>
                    <p style="font-weight: 400;font-size: 18px;line-height: 22px;">
                        {{ $class->description }}
                    </p>
                </div>
            </div>
            <div style="margin-top:24px;" class="tab-pane active" id="kelas" role="tabpanel">
                <div>
                    <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
                        Benefit mengikuti kelas ini
                    </p>
                    <div class="grid-container">
                        @foreach($points as $point)
                            <div style="height: 120px;width: 224px;border-radius: 5px;padding: 16px;border: 1px solid rgba(34, 34, 34, 1)">
                                <p style="font-weight: 400; font-size: 18px; line-height: 22px;">
                                    {{ $point }}
                                </p>
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>

        @endif
    </div>
</div>