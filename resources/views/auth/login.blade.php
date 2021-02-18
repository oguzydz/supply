@extends('layouts.app')

@section('content')


    <div class="user-form-area">
        <div class="container-fluid p-0">
            <div class="row m-0 align-items-center">
                <div class="col-lg-6 p-0">
                    <div class="user-img">
                        <img src="assets/img/resgister-bg.jpg" alt="User">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="user-content">
                        <div class="top">
                            <h2>{{ __('Register') }}</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-log-in-circle"></i>
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                                <i class="bx bx-question-mark"></i>
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="end">
                            <a class="" href="{{ route('index') }}">
                                <img src="{{ asset('assets/img/fmp-logo.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
