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
                {{ $class->name }}
            </p>
        </div>
        <div class="col-sm-9">
            <form method="POST" action="{{ route('studo.pages.quest.post-test.submit', $class->slug) }}">
                @csrf
                @php
                    $no = 1;
                @endphp
                @foreach($posttests as $postest)
                    @foreach($postest->questions as $question)
                        <div class="mb-4">
                            <h5>{{ $no }}.{{ $question->question }}</h5>
                            @foreach($question->answers as $key => $answer)
                                <div class="answer" data-group="answerInput{{ $no }}" onclick="selectAnswer(this, 'answerInput{{ $no }}', '{{ $answer->answer }}')">
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
                    <button id="submitBtn" class="btn my-2 my-sm-0" style="color:white;background:#063852;" type="submit" disabled>
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
    window.onload = function() {
        // Set an interval to check every 500 milliseconds if all questions have been answered
        setInterval(function() {
            const allInputs = document.querySelectorAll('input[type="hidden"]');
            let allAnswered = true;

            allInputs.forEach(input => {
                if (input.value === "") {
                    allAnswered = false;
                }
            });

            // If all questions have been answered, enable the submit button
            if (allAnswered) {
                document.querySelector('#submitBtn').disabled = false;
            } else {
                document.querySelector('#submitBtn').disabled = true;
            }
        }, 500);
    }

    function selectAnswer(element, inputId, answerText) {
        const group = document.querySelectorAll('[data-group=' + inputId + ']');
        group.forEach(item => {
            item.classList.remove('selected');
        });

        element.classList.add('selected');

        const input = document.querySelector('#' + inputId);
        input.value = answerText;
    }
</script>
@endsection