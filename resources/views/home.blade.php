@extends('layouts.app')

@section('content')

    <!-- Banner -->
    <div class="banner-area three" style="background-image: url('{{ asset('assets/img/bg.jpg') }}')">
        <div class="container-fluid">
            <div class="banner-content two three vh-100">
                <div class="d-table">
                    <div class="d-table-cell">
                        <h1>Send a Request For <span>Spare Parts</span></h1>
                        <div class="banner-form-area">
                            <form method="POST" action="{{ route('filterRequest') }}">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select name="brand">
                                                @foreach ($brands as $brand)
                                                    <option>{{ $brand['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group two">
                                            <div class="form-group">
                                                <select name="model">
                                                    <option value="used">Used</option>
                                                    <option value="unused">Unused</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group two">
                                            <input type="text" class="form-control" placeholder="Part No" name="part_no">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn">
                                    Submit
                                    <i class='bx bx-search'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <section class="work-area two three pt-100 pb-70">
        <div class="container">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{ asset(config('fmp.title_img')) }}" alt="Icon">
                    <span class="sub-title">Working Process</span>
                </div>
                <h2>See How It Works</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item two three">
                        <i class="flaticon-right-arrow-of-straight-thin-line"></i>
                        <h3>Submit a Request</h3>
                        <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item two three">
                        <i class="flaticon-send"></i>
                        <h3>Sent To Suppliers</h3>
                        <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="work-item two three work-border">
                        <i class="flaticon-verify"></i>
                        <h3>Receive Quotes</h3>
                        <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-area pb-100">
        <div class="container">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{ asset(config('fmp.title_img')) }}" alt="Icon">
                    <span class="sub-title">Manufacturer</span>
                </div>
                <h2>Select Manufacturer</h2>
            </div>
            <div class="row">

                @foreach ($manufacturers as $manufacturer)
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-item">
                        <a href="{{route('filterRequestManufacturer', [$manufacturer->id])}}">
                            <img src="/assets/img/manufactures.jpg" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="{{route('filterRequestManufacturer', [$manufacturer->id])}}">{{$manufacturer->name}}</a>
                            </h3>
                            <span>See Request on {{$manufacturer->name}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="job-area pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span class="sub-title">Last Requests for Spare Parts</span>
                        <h2>Last Requests</h2>
                    </div>
                </div>
            </div>
            <div id="container" class="row">
                <div class="col-sm-6 col-lg-12 mix n">
                    @foreach ($requests as $request)
                        <x-cards.dashboardCard :cardData="$request" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
