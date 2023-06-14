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
    }
    .answer:hover {
        border: 1px solid #FFC100
    }

    .selected {
        background-color: #FFC100;
        font-weight:700;
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
                Quest: Pre-Test
            </p>
            <p class="m-0">
                Nama Kelas
            </p>
        </div>
        <div class="col-sm-9">
            <form>
                @csrf
                <div class="mb-4">
                    <h5>1. Lorem ipsum dolor sit amet consectetur. Sed elementum eleifend massa sit ut fermentum a pharetra.
                        Facilisi arcu sed nisi nibh ac lacus dui ut ac?</h5>
                    <div class="answer" onclick="selectAnswer(this, 'A')">
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
