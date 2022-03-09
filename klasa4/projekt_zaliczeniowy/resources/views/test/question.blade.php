@extends('layouts.master')

@section("title", "abc")

@section('content')
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $question->question_text }}</h5>
            <form action="{{ route('submit-answer', ['test_id' => $question->Test->id]) }}" method="post">
                @csrf
                @foreach (shuffled($question->Answers->all()) as $answer)
                <input type="radio" value="{{ $answer->id }}" id="answer-{{ $loop->iteration }}" name="answer">
                <label for="answer-{{ $loop->iteration }}">{{$answer->answer}}</label> <br>
                @endforeach
                Poprawna odpowiedź: {{ $question->CorrectAnswers[0]->answer }}
                <br>
                <input type="submit" class="btn btn-primary" value="{{ __('Prześlij') }}">
            </form>
        </div>
    </div>
</div>
@endsection