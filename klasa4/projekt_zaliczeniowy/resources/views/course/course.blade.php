@extends('layouts.master')

@section('content')
<div class="container">
    @if(Auth::id() == $course->owner_id)
    <!-- <div class="row"> -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="?tab=tests" class="nav-link @if(Request::get('tab') == 'tests') active @endif" aria-current="page">Testy</a>
        </li>
        <li class="nav-item">
            <a href="?tab=about" class="nav-link @if(Request::get('tab') == 'about') active @endif" aria-current="page">O kursie</a>
        </li>
        <li class="nav-item">
            <a href="?tab=members" class="nav-link @if(Request::get('tab') == 'members') active @endif" aria-current="page">Uczestnicy</a>
        </li>
        <li class="nav-item">
            <a href="?tab=grades" class="nav-link @if(Request::get('tab') == 'grades') active @endif" aria-current="page">Oceny</a>
        </li>
    </ul>
    @switch (Request::get('tab'))
    @case ('tests')
    @include('course.course-components.list-tests')
    @break
    @case ('about')
    @include('course.course-components.about')
    @break
    @case ('members')
    @include('course.course-components.list-members')
    @break
    @case ('grades')
    @include('course.course-components.list-grades')
    @break
    @endswitch
    @endif
</div>
@endsection