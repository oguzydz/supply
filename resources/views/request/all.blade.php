@extends('layouts.app')
@section('content')
    <x-title title="{{ $title }}" />
    <div class="job-area-list ptb-100">
        <div class="container">
            <div class="row">
                @if (count($requests) === 0)
                    <x-emptyMessage content="There is no any request!" :link="route('index')" linkContent="Go Home" />
                @elseif(count($requests) > 0)
                    @foreach ($requests as $request)
                        <div class="col-md-6">
                            <x-cards.dashboardCard :cardData="$request" />
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
