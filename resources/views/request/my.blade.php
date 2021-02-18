@extends('layouts.profile')

@section('profileContent')

    @foreach ($requests as $request)
        <x-cards.dashboardCard :cardData="$request" />
    @endforeach

@endsection
