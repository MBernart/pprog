<div class="row justify-content-center">
    <div class="col">
        @if ($is_owner)
        <div class="d-flex justify-content-end me-5 mt-3">
            <a href="{{ route('course-add-members', $course->id) }}">
                <button class="btn btn-primary">{{ __('Dodaj uczestników') }}</button>
            </a>
        </div>
        @endif
        <table class="table table-hover">
            Filter:
            <i class="fa fa-filter" aria-hidden="true"></i>

            TODO: Filter
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">{{ _('Nazwa użytkownika') }}</th>
                    <th class="text-center" scope="col">{{ _('Dostęp') }}</th>
                    @if ($is_owner)
                    <th class="text-center" scope="col">{{ _('Ostatnia modyfikacja') }}</th>
                    <th class="text-center" scope="col">{{ _('Oceny') }}</th>
                    <th class="text-center" scope="col">{{ _('Zmień poziom dostępu') }}</th>
                    <th class="text-center" scope="col">{{ _('Wyrzuć z kursu') }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($course->Memberships as $membership)
                @php
                $user = $membership->User;
                @endphp
                @if ($course->Owner == $user)
                @continue
                @endif
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
                    @if ($is_owner)
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
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
TODO: course memberships