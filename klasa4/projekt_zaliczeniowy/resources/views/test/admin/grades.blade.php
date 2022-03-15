@extends('layouts.master')

@section("title", "{{ __('Oceny')}}")

@section('content')
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ __('Wyniki testu: ') }}{{ $test->name }}</h5>
            <p>{{ __('Wymagana liczba punktów: ') }} {{ $test->required_score }} </p>
            <table class="table">
                <tr>
                    <th>
                        {{ __('Nazwa użytkownika') }}
                    </th>
                    <th>
                        {{ __('Wynik') }}
                    </th>
                    <th>
                        {{ __('Godzina ukończenia') }}
                    </th>
                    <th>
                        {{ __('Zobacz odpowiedzi') }}
                    </th>
                </tr>
                @foreach ($test->TestApproaches->sortByDesc('end_time') as $approach)
                @php
                $score = $approach->getScore();
                @endphp
                @if ($score[0] >= $test->required_score)
                <tr class="table-success">
                    @elseif (!empty($approach->end_time))
                <tr class="table-danger">
                    @else 
                    <tr>
                    @endif
                    <td>
                        {{ $approach->User->username }}
                    </td>
                    <td>
                        {{ $score[0] }} / {{ $score[1]}}
                    </td>
                    <td>
                        {{ $approach->end_time }}
                    </td>
                    <td>
                        <a class="text-decoration-none text-dark" href="#">
                            <i class="fa fa-check-square-o" aria-hidden="true"> TODO: list answers view</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection