<div class="row justify-content-center">
    <div class="col">
        @if ($is_owner)
        <div class="d-flex justify-content-end me-5 mt-3">

            <a type="button" class="col-3 btn btn-primary">
                {{__('Utwórz test')}}
            </a>
        </div>
        @endif
        <table class="table table-hover">
            Filter:
            <i class="fa fa-filter" aria-hidden="true"></i>
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">{{ __('Nazwa testu') }}</th>
                    <th class="text-center" scope="col">{{ __('Opis') }}</th>
                    @if ($is_owner)
                    <th class="text-center" scope="col">{{ __('Przesłano') }}</th>
                    <th class="text-center" scope="col">{{ __('Oceny') }}</th>
                    <th class="text-center" scope="col">{{ __('Edytuj test') }}</th>
                    <th class="text-center" scope="col">{{ __('Usuń test') }}</th>
                    @else
                    <th class="text-center" scope="col">{{ __('Wypełnij test') }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($course->Tests as $test)
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
                    @if ($is_owner)
                    <td class="text-center">
                        {{ count($test->TestApproaches()->whereNotNull('start_time')->get()) }} / {{ count($test->TestApproaches) }}
                    </td>
                    <td class="text-center">
                        <a class="text-decoration-none text-dark" href="#">
                            <h3>
                                <i class="fa fa-book" aria-hidden="true"></i>
                            </h3>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="text-decoration-none text-dark" href="#">
                            <h3>
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </h3>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="text-decoration-none text-dark" href="#">
                            <h3>
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </h3>
                        </a>
                    </td>
                    @else
                    <td class="text-center">
                        @if ($test->usersEmptyApproaches(Auth::user())->exists())
                        <a class="text-decoration-none text-dark" href="{{ route('test-start-dialog', ['test_id' => $test->id]) }}">
                            <h3>
                                <i class="fa fa-pencil-square text-primary" aria-hidden="true"></i>
                            </h3>
                        </a>
                        @else
                        <h3>
                            <i class="fa fa-pencil-square text-muted" aria-hidden="true"></i>
                        </h3>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>