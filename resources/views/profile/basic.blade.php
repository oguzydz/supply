@extends('layouts.profile')

@section('profileContent')


    <div class="profile-content">
        @if(Session::get('success'))
            <x-alert message="{!! Session::get('success') !!}"/>
        @endif
        <form action="{{ route('profileUpdate') }}" method="POST">
            {{ csrf_field() }}
            <div class="profile-content-inner">
                <h2>Basic Info</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">{{ __('Your Name:') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $profile->name }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">{{ __('Your E-Mail:') }}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $profile->email }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="company">{{ __('Your Company:') }}</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                                name="company" value="{{ $profile->company }}" autofocus>
                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn dashboard-btn">Save Your Information</button>
        </form>
    </div>

@endsection
