@extends('layouts.master')

@section('title', "{{ __('Dodaj uczestników') }}")

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex">
        <div class="col">
            <div class="ps-2 pb-2">
                <a href="{{ route('course', ['course_id' => $course->id, 'tab' => 'members']) }}" class="h3 text-decoration-none text-dark">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </div>
            <div class="card">
                <div class="card-header"> {{ __('Dodaj uczestnika') }}</div>
                <div class="card-body overflow-auto">
                    <form action="{{ route('course-add-members-submit', $course->id) }}" method="post">
                        @csrf
                        @foreach ($users as $user)
                        @if ($course->UsersMembership($user)->isNotEmpty())
                        <div class="row mb-3">
                            <div>
                                <input class="form-check-input" type="checkbox" value="{{ $user->id }}" disabled>
                                <label class="form-check-label">
                                    {{ $user->username }}
                                </label>
                                <br>
                                <span class="text-info">{{ __('Użytkownik jest już przypisany do kursu') }}</span>
                            </div>
                        </div>
                        @else
                        <div class="row mb-3">
                            <div>
                                <input class="form-check-input" type="checkbox" name="users[]" value="{{ $user->id }}">
                                <label for=" users[]" class="form-check-label">
                                    {{ $user->username }}
                                </label>
                            </div>
                        </div>
                        @endif
                        <hr>
                        @endforeach
                        <input class="btn btn-primary" type="submit" value="{{ __('Dodaj użytkowników') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection