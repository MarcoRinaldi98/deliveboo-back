@extends('layouts.guest')

@section('page-title', 'Login')

@section('content')
    <section id="my-login" class="container mt-4">
        <div class="row justify-content-cente">
            <div class="col-12">
                <div class="card-header fs-1 fw-bolder1 text-center pb-3">{{ __('Login') }}</div>
                <div class="container">
                    <div class="row">
                        <div class="d-none d-lg-block col-lg-6">
                            <img class="img-fluid" src="./tomato_sauce.png" alt="immagine login">
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-center">
                            <form class="w-100" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-4 row">
                                    <label for="email"
                                        class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-7">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <div class="col-md-7 offset-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                <small>{{ __('Remember Me') }}</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7 offset-md-3">
                                        <button type="submit" class="btn ms_btn btn-primary">
                                            {{ __('Accedi') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class=" p-color text-decoration-none"
                                                href="{{ route('password.request') }}">
                                                <small class="ms_remember ps-2">
                                                    {{ __('Hai dimenticato la password?') }}
                                                </small>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
