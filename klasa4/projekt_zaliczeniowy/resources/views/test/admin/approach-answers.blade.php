@extends('layouts.master')

@section("title", "{{ __('Oceny')}}")

@section('content')
<div class="container">
    <div class="ps-2 pb-2">
        <a href="{{ route('get-test-grades', $approach->Test->id) }}" class="h3 text-decoration-none text-dark">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </a>
    </div>
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ __('Wyniki testu: ') }}{{ $approach->Test->name }}</h5>
            <p>{{ __('Wymagana liczba punktów: ') }} {{ $approach->Test->required_score }} </p>
            <table class="table">
                <tr>
                    <th>
                        {{ __('#') }}
                    </th>
                    <th>
                        {{ __('Pytanie') }}
                    </th>
                    <th>
                        {{ __('Udzielona odpowiedź') }}
                    </th>
                    <th>
                        {{ __('Poprawna odpowiedź') }}
                    </th>
                    <th>
                        {{ __('Przyznane punkty') }}
                    </th>
                </tr>
                @foreach ($approach->getApproachAnswers as $answer)
                <tr>
                    <td>
                        {{ $answer->id }}
                    </td>
                    <td>
                        {{ $answer->Question->question_text }}
                    </td>
                    <td>
                       {{ $answer->GivenAnswer->answer }}
                    </td>
                    <td>
                    {{ $answer->Question->CorrectAnswers[0]->answer }}
                    </td>
                    <td @if($answer->score_awarded == 0 ) class="table-danger" @else class="table-success" @endif >
                        {{ $answer->score_awarded }} / {{ $answer->Question->max_points }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection