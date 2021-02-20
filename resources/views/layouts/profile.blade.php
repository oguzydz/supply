@extends('layouts.app')

@section('content')
    <x-title title="{{ __('Dashboard') }}" />

    <div class="dashboard-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="profile-item">
                        <h2>{{ Auth::user()->name }}</h2>
                        <span>{{ Auth::user()->company }}</span>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" href={{ route('profile') }}>
                            <i class="bx bx-user"></i>
                            My Profile
                        </a>
                        <a class="nav-link" href={{ route('myRequests') }}>
                            <div class="profile-list">
                                <i class="bx bxs-inbox"></i>
                                My Requests
                            </div>
                        </a>
                        <a href="{{ route('requests') }}">
                            <div class="profile-list">
                                <i class="bx bx-note"></i>
                                All Requests
                            </div>
                        </a>
                        <a href="{{ route('createRequest') }}">
                            <div class="profile-list">
                                <i class="bx bx-note"></i>
                                Submit a Request
                            </div>
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                            <div class="profile-list">
                                <i class="bx bx-log-out"></i>
                                Logout
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>

                <div class="col-lg-8">
                    @if (\Session::has('success'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {!! \Session::get('success') !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (\Session::has('error'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    {!! \Session::get('error') !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @yield('profileContent')
                </div>
            </div>
        </div>
    </div>
@endsection
