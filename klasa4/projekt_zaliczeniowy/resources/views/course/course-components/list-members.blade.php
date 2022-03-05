<div class="row justify-content-center">
    <div class="col">
        <table class="table table-hover">
            Filter: 
            <i class="fa fa-filter" aria-hidden="true"></i>

            TODO: Filter
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nazwa użytkownika</th>
                    <th class="text-center" scope="col">Dostęp</th>
                    <th class="text-center" scope="col">Ostatnia modyfikacja</th>
                    <th class="text-center" scope="col">Oceny</th>
                    <th class="text-center" scope="col">Zmień poziom dostępu</th>
                    <th class="text-center" scope="col">Wyrzuć z kursu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->Memberships as $membership)
                @php
                $user = $membership->User;
                @endphp
                <!-- {{ $membership }} -->
                <tr>
                    <th class="text-center">
                        {{ $membership->id }}
                    </th>
                    <td class="text-center" title="{{ $user->email }}">
                        {{ $user->username }}
                    </td>
                    <td class="text-center">
                        {{ $membership->AccessLevel->description }}
                    </td>
                    <td class="text-center">
                        {{ $membership->updated_at }}
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
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </h3>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
TODO: course memberships