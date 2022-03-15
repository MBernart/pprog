@extends('layouts.master')

@section("title", "{{ __('Rezultat') }}")

@section('content')
<div class="container">
    <div class="card mb-2">
        <div class="card-body text-center">
            <h4 class="card-title">{{ __('Wyniki testu')}}</h4>
            <p>
                {{ __('Nazwa testu:') }} {{ $testApproach->Test->name }}
            </p>
            <p>
                {{ __('Data rozpoczęcia:') }} {{ $testApproach->created_at }}
            </p>
            <p>
                {{ __('Data przesłania:') }} {{ $testApproach->end_time }}
            </p>
            <p>
                {{ __('Wynik:') }} {{ $score[0] }} / {{ $score[1] }}
            </p>

        </div>
    </div>
</div>
@endsection