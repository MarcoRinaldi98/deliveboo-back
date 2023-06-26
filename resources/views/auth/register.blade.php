@extends('layouts.guest')

@section('content')
    <div class="headRegister container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Registrati - i campi con (*) sono obbligatori') }}</div>

                    <div class="card-body">
                        <form id="register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                            onsubmit="return validateForm(this)" class="d-md-flex">
                            @csrf
                            <div class="col-12 col-md-6">
                                <div class="mb-4 row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome *') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" autofocus required>
                                            <div class='error-message error-name error-text error-string'></div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="surname"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cognome *') }}</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text"
                                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                                            value="{{ old('surname') }}"  autocomplete="surname" autofocus required>
                                            <div class='error-message error-name error-text error-string'></div>
                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="restaurant_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome Attivitá *') }}</label>

                                    <div class="col-md-6">
                                        <input id="restaurant_name" type="text"
                                            class="form-control @error('restaurant_name') is-invalid @enderror"
                                            name="restaurant_name" value="{{ old('restaurant_name') }}" 
                                            autocomplete="restaurant_name" autofocus required>
                                            <div class='error-message error-length error-string'></div>
                                        @error('restaurant_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}"  autocomplete="address" autofocus required>
                                            <div class='error-message error-length error-string'></div>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="vat"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva *') }}</label>

                                    <div class="col-md-6">
                                        <input id="vat" type="number"
                                            class="form-control @error('vat') is-invalid @enderror" name="vat"
                                            value="{{ old('vat') }}"  autocomplete="vat" autofocus required>
                                        <div class='error-message error-string' id='error-vat'></div>
                                        @error('vat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="mb-4 row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono *') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}"  autocomplete="phone" autofocus required>
                                            <div class='error-message error-phone-min error-phone-max error-string'></div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="mb-4 row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}"  autocomplete="email" required>
                                            <div class='error-message error-string error-text' id="error-email"></div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password" required>
                                            <div class='error-message error-password'></div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation"  autocomplete="new-password" required>
                                    </div>
                                    <div class='error-message error-password' id="error-verify"></div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 ps-md-5">
                                <div class="mb-4 row">
                                    <div>Seleziona almeno un tipo *:</div>
                                    @foreach ($types as $type)
                                        <div>
                                            <label for="{{ $type->id }}"
                                                class="col-md-4 w-25 col-form-label text-md-right">{{ $type->name }}</label>
                                            <input id="{{ $type->id }}"
                                                @if (in_array($type->id, old('types', []))) checked @endif
                                                class="@error('types') is-invalid @enderror" type="checkbox"
                                                name="types[]" value="{{ $type->id }}">
                                        </div>
                                    @endforeach
                                    <div class='error-message error-types' id="error-type"></div>
                                    @error('types')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 w-100">
                                    <input id="image" type="file"
                                        class=" form-control @error('image') is-invalid @enderror" name="image"
                                        autocomplete="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <div class="mb-4 row mb-0">
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrati') }}
                            </button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
