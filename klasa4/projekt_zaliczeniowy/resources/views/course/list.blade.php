@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="text-center">Twoje kursy:</h2>

    <hr>

    <div class="row justify-content-center d-flex align-items-center">
        <!-- <div class="col-md-10"> -->
        <div class="col text-center"><strong>{{ __('Nazwa') }}</strong></div>
        <div class="col-3 text-center"><strong>{{ __('Opis') }}</strong></div>
        <div class="col text-center"><strong>{{ __('Właściciel') }}</strong></div>
        <div class="col text-center"><strong>{{ __('Data ostatniej modyfikacji') }}</strong></div>
        <div class="col text-center"><strong>{{ __('Liczba uczestników') }}</strong></div>
    </div>
    <hr>

    @foreach (Auth::user()->CoursesTheMemberIsAssignedTo as $course)
    <div class="row justify-content-center d-flex align-items-center">

        <div class="col text-center"><a class="text-decoration-none fw-bold" href="{{ url('course', $course->id) }}?tab=tests">{{ $course->name }} </a> </div>
        <div class="col-3 text-center">{{ $course->description }}</div>
        <div class="col text-center">{{ $course->Owner->username }}</div>
        <div class="col text-center">{{ $course->updated_at }}</div>
        <div class="col text-center">{{ count($course->Memberships) }}</div>
        @if(!$loop->last)
        <hr class="mt-3" style="border-top: 1px solid DimGray;">
        @endif

    </div>
    @endforeach
    <div class="row justify-content-center d-flex align-items-center mt-3">
        <div class="col-6 text-center border-top pt-2">
            <span class="h5">{{ __('Nie ma więcej kursów do wyświetlenia') }}</span>
        </div>
    </div>
</div>
</div>
@endsection