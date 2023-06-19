@extends('studo.main')
@section('content')
<head>
    <title>Result</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<style>
        .answer{
        padding:10px;
        border-radius: 5px;
        margin:5px 0px;
        border:1px solid #E6EBED;
    }
    .false{
        background: #EB2020;
        color:white;
        font-weight:700;
        border:none;
    }
    .true{
        background: #00C314;
        color:white;
        font-weight:700;
        border:none;
    }
    .text-false{
        color: #EB2020;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;
    }
    .text-true{
        color: #00C314;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;
    }
</style>
<div class="container mt-4 d-grid align-items-center" style="height:450px;" >
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <center>
                <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;color: #222222;">
                    Quest: Post-Test
                </h2>
                <p>
                    Nama Kelas
                </p>
                <p>
                    Berikut adalah hasil Quest: Post-Test yang kamu dapat
                </p>
                <p class="title-text-login" style="margin:8px 0px;">
                    <span class="text-true">70</span>/100
                </p>
                <p>
                    Good Job! Silahkan ambil sertifkat kamu
                    <br>
                    <a href="#">
                        di sini.
                    </a>
                </p>
                <div style="margin-top:24px;">
                    <button class="btn my-2 my-sm-0" style="color:white;background:#063852;width:352px;" type="button">
                        <b>
                            Ulangi Quest
                        </b>
                    </button>
                </div>
            </center>
        </div>
        <div class="col-sm-3">
        </div>

    </div>
</div>

<script>
    let lastSelected = {};

    function selectAnswer(element, option, inputId, groupId) {
        if (lastSelected[groupId] && lastSelected[groupId] !== element) {
            lastSelected[groupId].classList.remove('selected');
        }

        element.classList.add('selected');
        lastSelected[groupId] = element;

        const input = document.querySelector('#' + inputId);
        input.value = option;
    }
</script>
@endsection