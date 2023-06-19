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
            <form method="POST" action="{{ route('studo.pages.quest.pre-test.submit', $class->slug) }}">
                @csrf
                @php
                    $no = 1;
                @endphp
                @foreach($pretests as $pretest)
                    @foreach($pretest->questions as $question)
                        <div class="mb-4">
                            <h5>{{ $no }}.{{ $question->question }}</h5>
                            @foreach($question->answers as $key => $answer)
                            <div class="answer" onclick="selectAnswer(this, '{{ chr(65 + $key) }}', 'answerInput{{ $no }}', 'answerGroup{{ $no }}')">
                                <span class="option">{{ chr(65 + $key) }}</span>
                                <span class="ms-2">{{ $answer->answer }}</span>
                            </div>
                            @endforeach
                            <input type="hidden" id="answerInput{{ $no }}" name="answers[{{ $question->id }}]" value="" />
                        </div>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                @endforeach
                <div class="d-flex" style="justify-content:flex-end">
                    <button class="btn my-2 my-sm-0 "style="color:white;background:#063852;" type="submit">
                        <b>
                            Submit Jawaban
                        </b>
                    </button>
                </div>
            </form>
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