<div style="margin-top:40px;">
        <div>
            <p style="font-weight: 400;font-size: 18px;line-height: 22px;">
                Kategori 1
            </p>
            <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
                Pharetra ut morbi tristique sed consectetur neque.
            </h2>
            <div class="d-flex align-items-center">
                <p>
                    Nama Mentor
                </p>
                <p style="margin-left:24px;margin-right:24px;">
                    Rating
                </p>
                <p>
                    Review
                </p>
            </div>
            <div>
                <img style="width:100%;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
    
            </div>
            @if (!auth()->check())
                <!-- not login  -->
                <div style="margin-top:40px;">
                    <ul class="nav">
                        <div>
                            <a  id="nav-kelas-tab" data-bs-toggle="tab" href="#kelas">
                                <button class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                                    <b>
                                        Tentang Kelas
                                    </b>
                                </button>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a  id="nav-benefit-tab" data-bs-toggle="tab" href="#benefit">
                                <button class="btn my-4 my-sm-0 mx-1" style="color:#063852; border-color:#063852;background:white" type="submit">
                                    <b>
                                        Benefit
                                    </b>
                                </button>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a  id="nav-review-tab" data-bs-toggle="tab" href="#review">
                                <button class="btn my-4 my-sm-0 mx-1" style="color:#063852; border-color:#063852;background:white" type="submit">
                                    <b>
                                        Review
                                    </b>
                                </button>
                            </a>
                        </div>

                    </ul>
                </div>
            @else
            <!-- login -->
            <div style="margin-top:40px;">
                <ul class="nav">
                    <div>
                        <a id="nav-kelas-tab" data-bs-toggle="tab" href="#kelas">
                            <button class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                                <b>
                                    Tentang Kelas
                                </b>
                            </button>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a  id="nav-benefit-tab" data-bs-toggle="tab" href="#forum">
                            <button class="btn my-4 my-sm-0 mx-1" style="color:#063852; border-color:#063852;background:white" type="submit">
                                <b>
                                    Forum
                                </b>
                            </button>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a  id="nav-review-tab" data-bs-toggle="tab" href="#project">
                            <button class="btn my-4 my-sm-0 mx-1" style="color:#063852; border-color:#063852;background:white" type="submit">
                                <b>
                                    Project
                                </b>
                            </button>
                        </a>
                    </div>

                </ul>
            </div>
            @endif
        </div>

</div>