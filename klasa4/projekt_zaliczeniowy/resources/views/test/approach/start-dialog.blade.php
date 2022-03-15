@extends('layouts.master')

@section("title", "abc")

@section('content')
<div class="container">
    <div class="card mb-2">
        <div class="card-body text-center">
            <h4 class="card-title">{{ __('Podejście do testu')}}</h4>
            <p>
                {{ __('Nazwa testu:') }} {{ $test->name }}
            </p>
            <p>
                {{ __('Opis testu:') }} {{ $test->description }}
            </p>

            
            <a class="btn btn-primary" href="{{ route('start-test', $test->id ) }}">Rozpocznij test</a>

        </div>
    </div>
</div>
@endsection