@extends('layouts.master')

@section('title')
{{ Auth::user()->username }} - profile
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateEmail') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Login:') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control-plaintext" value="{{ Auth::user()->username }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @if(Session::has('emailChanged')) is-valid @endif @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @if(Session::has('emailChanged'))
                                <span class="valid-feedback d-block" role="alert">
                                    <strong> {{ Session::pull('emailChanged') }}</strong>
                                </span>
                                @endif

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Zmodyfikowano:') }}</label>

                            <div class="col-md-6">
                                <input id="last-modification-date" type="text" class="form-control-plaintext" value="{{ Auth::user()->updated_at }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Utworzono:') }}</label>

                            <div class="col-md-6">
                                <input id="last-modification-date" type="text" class="form-control-plaintext" value="{{ Auth::user()->created_at }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zaktualizuj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zmień hasło') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('changePassword') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="old-password" class="col-md-4 col-form-label text-md-end">{{ __('Stare hasło:') }}</label>

                            <div class="col-md-6">
                                <input id="old-password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" required>

                                @error('old-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new-password" class="col-md-4 col-form-label text-md-end">{{ __('Nowe hasło:') }}</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('password') is-invalid @enderror" name="new-password" required>

                                @error('new-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirm-password" class="col-md-4 col-form-label text-md-end">{{ __('Powtórz hasło:') }}</label>

                            <div class="col-md-6">
                                <input id="confirm-password" type="password" class="form-control @error('password') is-invalid @enderror" name="confirm-password" required>
                            </div>
                        </div>
                        @if(Session::has('passwordChanged'))

                        <div class="row mb-3">
                            <label for="confirm-password" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
                            <div class="col-md-6">

                                <span class="valid-feedback" role="alert" style="display: block;">
                                    <strong> {{ Session::get('passwordChanged') }} </strong>
                                </span>
                            </div>

                        </div>

                        @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zmień hasło') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection