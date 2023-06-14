@extends('studo.main')
<style>
    a:hover {
        text-decoration: none;
    }

    .active[aria-selected="true"] {
        background: #063852 !important;
        border-radius: 5px;
        color: white !important;
        padding: 10px 16px;
    }

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
@section('content')
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

</head>
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-3">
            <p class="title-text-login m-0">
                Quest: Post-Test
            </p>
            <p class="m-0">
                Nama Kelas
            </p>
            <div style="margin-top:24px;">
                <p class="m-0">
                    Berikut adalah hasil Quest: Post-Test yang kamu dapat
                </p>
                <p class="title-text-login" style="margin:8px 0px;">
                    <span class="text-true">70</span>/100
                </p>
                <p class="m-0">
                    Jangan Menyerah! Kamu bisa mengulangi tes dan mendapat nilai lebih baik lagi !!
                </p>
            </div>
        </div>
        <div class="col-sm-9">
            <form>
                @csrf
                <div class="mb-4">
                    <h5 class="fw-bold">1. Lorem ipsum dolor sit amet consectetur. Sed elementum eleifend massa sit ut fermentum a pharetra.
                        Facilisi arcu sed nisi nibh ac lacus dui ut ac?</h5>
                    <div class="answer false" style="" onclick="selectAnswer(this, 'A')">
                        <span class="option">A</span>
                        <span class="ms-2">adopfsnjdnasdmjfvdk adnk</span>
                    </div>
                    <div class="answer" onclick="selectAnswer(this, 'B')">
                        <span class="option">B</span>
                        <span class="ms-2">aasdasd</span>
                    </div>
                    <div class="answer" onclick="selectAnswer(this, 'C')">
                        <span class="option">C</span>
                        <span class="ms-2">adasdk adnk</span>
                    </div>
                    <div class="answer" onclick="selectAnswer(this, 'D')">
                        <span class="option">D</span>
                        <span class="ms-2">adopfsnjdnasdmasdk</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="fw-bold">2. Lorem ipsum dolor sit amet consectetur. Sed elementum eleifend massa sit ut fermentum a pharetra.
                        Facilisi arcu sed nisi nibh ac lacus dui ut ac?</h5>
                    <div class="answer" style="" onclick="selectAnswer(this, 'A')">
                        <span class="option">A</span>
                        <span class="ms-2">adopfsnjdnasdmjfvdk adnk</span>
                    </div>
                    <div class="answer" onclick="selectAnswer(this, 'B')">
                        <span class="option">B</span>
                        <span class="ms-2">aasdasd</span>
                    </div>
                    <div class="answer true" onclick="selectAnswer(this, 'C')">
                        <span class="option">C</span>
                        <span class="ms-2">adasdk adnk</span>
                    </div>
                    <div class="answer" onclick="selectAnswer(this, 'D')">
                        <span class="option">D</span>
                        <span class="ms-2">adopfsnjdnasdmasdk</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>

<script>
    function selectAnswer(element, option) {
        const answers = document.querySelectorAll('.answer');
        answers.forEach(answer => answer.classList.remove('selected'));
        element.classList.add('selected');
        const input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'answers[]');
        input.setAttribute('value', option);
        element.appendChild(input);
    }
</script>
@endsection
