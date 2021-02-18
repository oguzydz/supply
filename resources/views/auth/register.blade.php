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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-form-label">{{ __('Name') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="col-form-label">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
