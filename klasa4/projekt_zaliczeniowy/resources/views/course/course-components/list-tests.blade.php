<div class="row justify-content-center">
    <div class="col">
        <div class="d-flex justify-content-end me-5 mt-3">

            <a type="button" class="col-3 btn btn-primary">
                {{__('Utwórz test')}}
            </a>
        </div>
        <table class="table table-hover">
            Filter:
            <i class="fa fa-filter" aria-hidden="true"></i>
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">{{ __('Nazwa testu') }}</th>
                    <th class="text-center" scope="col">{{ __('Opis') }}</th>
                    <th class="text-center" scope="col">{{ __('Przesłano') }}</th>
                    <th class="text-center" scope="col">{{ __('Oceny') }}</th>
                    <th class="text-center" scope="col">{{ __('Edytuj test') }}</th>
                    <th class="text-center" scope="col">{{ __('Usuń test') }}</th>
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
                    <td class="text-center">
                        {{ count($test->TestApproaches) }} / {{ count($course->Memberships) }}
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
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>