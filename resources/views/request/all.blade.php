@extends('layouts.app')
@section('content')
    <x-title title="{{ __('List of requests') }}" />
    <div class="job-area-list ptb-100">
        <div class="container">
            <div class="row">
                @foreach ($requests as $request)
                    <div class="col-md-6">
                        <x-cards.dashboardCard :cardData="$request" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
