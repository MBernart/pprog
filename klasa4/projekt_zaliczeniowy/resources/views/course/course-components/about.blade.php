<div class="row justify-content-center">
    <div class="col">
        <div class="card">

            <div class="card-body">
                <form method="POST" action="{{ route('changePassword') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa kursu:') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{set_plaintext(!$is_owner) }} @error('name') is-invalid @enderror" name="name" required value="{{$course->name}}" {{ set_readonly(!$is_owner) }}>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis:') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control{{set_plaintext(!$is_owner) }} @error('description') is-invalid @enderror" name="description" required value="{{$course->description}}" {{ set_readonly(!$is_owner) }}>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="owner" class="col-md-4 col-form-label text-md-end">{{ __('Właściciel:') }}</label>

                        <div class="col-md-6">
                            <input id="owner" type="text" class="form-control-plaintext @error('owner') is-invalid @enderror" name="owner" required value="{{$course->Owner()->first()->username}}" readonly>
                        </div>
                    </div>
                    @if ($is_owner)
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Zaktualizuj') }}
                            </button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>