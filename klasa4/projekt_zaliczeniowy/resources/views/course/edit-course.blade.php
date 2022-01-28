<div class="container">
    <div class="row justify-content-center d-flex">
        <div class="col">
            <div class="card">
                <div class="card-header"> {{ __('O kursie') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateEmail') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{ $course->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">

                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis:') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" rows="3"> {{ $course->description }} </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="created_at" class="col-md-4 col-form-label text-md-end">{{ __('Zmodyfikowano:') }}</label>

                            <div class="col-md-6">
                                <input id="created_at" type="text" class="form-control-plaintext" value="{{ $course->updated_at }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="updated_at" class="col-md-4 col-form-label text-md-end">{{ __('Utworzono:') }}</label>

                            <div class="col-md-6">
                                <input id="updated_at" type="text" class="form-control-plaintext" value="{{ $course->created_at }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header"> {{ __('Uczestnicy') }}</div>
                <div class="card-body overflow-auto">

                    @foreach ($course->Memberships()->get() as $membership)
                    <div class="row" style="overflow-x:scroll;">
                        <div class="col">{{ $membership->User->username }}</div>
                        <div class="col"><select name="" id="">
                            <option value="">qwerty</option>
                        </select></div>
                        <div class="col">usuń</div>
                        <div class="col">zapisz</div>
                        <hr>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{$course}}