@extends('layouts.profile')

@section('profileContent')
    @if (count($requests) === 0)
        <x-emptyMessage content="There is no any request!" :link="route('index')" linkContent="Go Home" />
    @elseif(count($requests) > 0)
        @foreach ($requests as $request)
            <x-cards.dashboardCard :cardData="$request" />
        @endforeach
    @endif
@endsection
