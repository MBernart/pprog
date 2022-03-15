@extends('layouts.master')

@section('title', '{{ __("Twoje kursy") }}')

@section('content')
<div class="container">
    <h3>{{ __('Testy do wypełnienia') }}</h3>
    <div class="row justify-content-center">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">{{ __('Nazwa testu') }}</th>
                        <th class="text-center" scope="col">{{ __('Opis') }}</th>
                        <th class="text-center" scope="col">{{ __('Wypełnij test') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->CoursesTheMemberIsAssignedTo as $course)
                        @if (!empty($course))
                            @foreach ($course->Tests as $test)
                                @if ($test->usersEmptyApproaches(Auth::user())->exists())
                                <tr>
                                    <th class="text-center">
                                        {{ $test->id }}
                                    </th>
                                    <td class="text-center">
                                        {{ $test->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $test->description }}
                                    </td>
                                    <td class="text-center">
                                        <a class="text-decoration-none text-dark" href="{{ route('test-start-dialog', ['test_id' => $test->id]) }}">
                                            <h3>
                                                <i class="fa fa-pencil-square text-primary" aria-hidden="true"></i>
                                            </h3>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection