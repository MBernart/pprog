@extends('layouts.master')

@section("title", "{{ __('Oceny')}}")

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex">
        <div class="col">
            <div class="ps-2 pb-2">
                <a href="{{ route('course', $test->Course->id) }}" class="h3 text-decoration-none text-dark">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Edytuj test') }}
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('edit-test-submit', $test->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa:') }}</label>

                            <div class="col-md-6">
                                <input name="name" id="name" type="text" class="form-control @if(Session::has('nameChanged')) is-valid @endif @error('name') is-invalid @enderror" value="{{ $test->name }}">
                                @if(Session::has('nameChanged'))
                                <span class="valid-feedback d-block" role="alert">
                                    <strong> {{ Session::pull('nameChanged') }}</strong>
                                </span>
                                @endif
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">

                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis:') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control @if(Session::has('descriptionChanged')) is-valid @endif @error('description') is-invalid @enderror" rows="3"> {{ $test->description }} </textarea>
                                @if(Session::has('descriptionChanged'))
                                <span class="valid-feedback d-block" role="alert">
                                    <strong> {{ Session::pull('descriptionChanged') }}</strong>
                                </span>
                                @endif
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="required_score" class="col-md-4 col-form-label text-md-end">{{ __('Wymagana liczba punktów:') }}</label>

                            <div class="col-md-6">
                                <input name="required_score" id="required_score" type="number" class="form-control @if(Session::has('required_scoreChanged')) is-valid @endif @error('required_score') is-invalid @enderror" value="{{ $test->required_score }}" min="0" max="{{ $test->Questions()->sum('max_points') }}">
                                <span class="text-secondary">{{ __('Zakres: ') }} 0 - {{ $test->Questions()->sum('max_points') }} </span>
                                @if(Session::has('required_scoreChanged'))
                                <span class="valid-feedback d-block" role="alert">
                                    <strong> {{ Session::pull('required_scoreChanged') }}</strong>
                                </span>
                                @endif
                                @error('required_score')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="created_at" class="col-md-4 col-form-label text-md-end">{{ __('Zmodyfikowano:') }}</label>

                            <div class="col-md-6">
                                <input id="created_at" type="text" class="form-control-plaintext" value="{{ $test->updated_at }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="updated_at" class="col-md-4 col-form-label text-md-end">{{ __('Utworzono:') }}</label>

                            <div class="col-md-6">
                                <input id="updated_at" type="text" class="form-control-plaintext" value="{{ $test->created_at }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col offset-md-4">
                                <input type="submit" class="btn btn-primary" value="{{ __('Zaktualizuj') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection