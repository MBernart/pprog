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
                        {{ __('Udostępnij test') }}
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('publish-test-submit', $test->id) }}">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <div>
                                @foreach ($test->Course->Memberships as $membership)
                                <div class="row mb-3">
                                    <div>
                                        <label for="membership[]" class="form-check-label">
                                            {{ $membership->user->username }}:
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="membership[]" value="{{ $membership->id }}">
                                    </div>
                                </div>
                                @endforeach
                                <input class="btn btn-primary" type="submit" value="{{ __('Publikuj') }}">
                            </div>
                        </div>
                            @if(Session::has('createdApproach'))
                            <span class="text-success h4" role="alert">
                                <strong> {{ Session::pull('createdApproach') }}</strong>
                            </span>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection