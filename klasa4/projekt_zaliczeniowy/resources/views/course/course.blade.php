@extends('layouts.master')

@section('content')
<div class="container">
    @php
    $is_owner = Auth::id() == $course->owner_id;
    @endphp
    @if($is_owner || Auth::user()->CoursesTheMemberIsAssignedTo->contains($course))
    <h3>{{ $course->name }}</h3>
    TODO:
    {{ var_dump($is_owner) }}
    <!-- <div class="row"> -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="?tab=tests" class="nav-link @if(Request::get('tab') == 'tests') active @endif" aria-current="page">{{ __('Testy') }}</a>
        </li>
        <li class="nav-item">
            <a href="?tab=about" class="nav-link @if(Request::get('tab') == 'about') active @endif" aria-current="page">{{ __('O kursie') }}</a>
        </li>
        <li class="nav-item">
            <a href="?tab=members" class="nav-link @if(Request::get('tab') == 'members') active @endif" aria-current="page">{{ __('Uczestnicy') }}</a>
        </li>
    </ul>
    @switch (Request::get('tab'))
    @case ('about')
    @include('course.course-components.about')
    @break
    @case ('members')
    @include('course.course-components.list-members')
    @break
    @case ('tests')
    @default
    @include('course.course-components.list-tests')
    @break
    @endswitch
    @endif
</div>
@endsection