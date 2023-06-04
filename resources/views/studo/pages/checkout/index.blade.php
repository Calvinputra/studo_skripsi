@extends('studo.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
@section('content')
<div class="container" style="padding-top:40px;padding-bottom:80px;">
    <div class="row">
        <div class="col-sm-7">
            <p ckass="desc-text-main">
                Kategori 1
            </p>
            <h2 class="title-text-login" style="margin-top:8px;margin-bottom:0px;">
                Pharetra ut morbi tristique sed consectetur neque.
            </h2>
            <p class="desc-text-main" style="margin-top:8px;">
                Nama Mentor
            </p>
            <img style="width:568px;margin-top:24px;" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
            
        </div>
        <div class="col-sm-5" style="">
            <div class="d-flex align-items-center justify-content-between" style="padding: 8px;border: 1px solid #FFC100;">
                <p class="desc-text-main m-0" style="font-weight:500;">
                    1x Kelas Reguler
                </p>
                <span style="font-size: 16px;line-height: 29px;font-weight: 500;"><span style="text-decoration: line-through;color: grey;font-size: 12px;line-height:19px;margin-right:4px;"> Rp20.000</span>Rp10.000</span>
                
            </div>
            <b>
                <p class="desc-text-main" style="font-weight:700; margin:16px 0px;">
                    Detail Pembayaran
                </p>
            </b>

            <div class="d-flex align-items-center justify-content-between">
                <p class="desc-text-main m-0" style="font-weight:500;"">
                    Sub Total
                </p>
                <p class="m-0" style="">
                    Rp250.000
                </p>
            </div>



            <div class="d-flex align-items-center justify-content-between">
                <p class="desc-text-main m-0" style="font-weight:500;color:#20A2EB">
                    Diskon
                </p>
                <p class="m-0"style="color:#20A2EB">
                    Rp201.000
                </p>
            </div>
            <div style="border: 1px solid #D9D9D9;margin:16px 0px;">
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <b>
                    <p class="desc-text-main m-0" style="font-weight:700;">
                        Total Pembayaran
                    </p>
                </b>
                <b>
                    <p class="m-0" style=";">
                        Rp49.000
                    </p>
                </b>
            </div>

            <div style="margin-top:24px;">
                <a  href="#">
                    <button class="btn btn-outline-success my-2 my-sm-0" style="width:100%;color:white;background:#063852;height: 51px;" type="submit">
                        <b>
                            Beli Kelas
                        </b>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection