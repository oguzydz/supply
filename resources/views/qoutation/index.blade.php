@extends('layouts.app')
@section('content')

    <div class="page-title-area two" style="background-image: url({{ asset(config('supply.title_background_img')) }})">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="left">
                                <h2>#{{ $request->id }} Request Detail</h2>
                                <ul>
                                    <li>
                                        <i class="bx bx-user"></i>
                                        {{ Auth::loginUsingId($request->user_id)->name }}
                                    </li>
                                    <li>
                                        <i class="bx bx-time"></i>
                                        Created date: {{ $request->created_at }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="right">
                                <a class="cmn-btn" href="/requests/qu" data-bs-toggle="modal">
                                    Submit the quotation
                                    <i class="bx bx-plus"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bx bx-heart"></i>
                                            Save
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bx-share-alt"></i>
                                            Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxs-report"></i>
                                            Report
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="person-details-area resume-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="resume-profile">
                            <img src="{{ asset('assets/img/laptop-user-1-1179329.png') }}" width="100">
                            <h2>{{ Auth::loginUsingId($request->user_id)->name }}</h2>
                            <span>{{ Auth::loginUsingId($request->user_id)->company }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('storeQuotation', [$request->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="profile-content-inner">
                            <h2>Add New Quotation</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title:') }}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title') }}" required autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Message:') }}</label>
                                        <textarea type="text" class="form-control @error('message') is-invalid @enderror"
                                            id="message" name="message" value="{{ old('message') }}" required
                                            autofocus></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="price">{{ __('Supply Price:') }}</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            id="price" name="price" value="{{ old('price') }}" required autofocus>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select id="currency" name="currency">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency['currency'] }}">
                                                    {{ $currency['currency'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('currency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" style="background-color: #00a1cc" class="btn btn-primary float-right">Submit
                            Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
