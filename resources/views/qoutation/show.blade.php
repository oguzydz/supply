@extends('layouts.app')
@section('content')

    <div class="page-title-area two" style="background-image: url({{ asset(config('supply.title_background_img')) }})">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="left">
                                <h2>#{{ $request->id }} Request Qoutations</h2>
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
                        <div class="information widget-item">
                            <h3>Request info</h3>
                            <ul>
                                <li>
                                    <h4 class="d-inline-block">Request #ID:</h4>
                                    <span class="d-inline-block">{{ $request->id }}</span>
                                </li>
                                <li>
                                    <h4 class="d-inline-block">Brand:</h4>
                                    <span class="d-inline-block">{{ $request->brand }}</span>
                                </li>
                                <li>
                                    <h4 class="d-inline-block">Model:</h4>
                                    <span class="d-inline-block">{{ $request->model }}</span>
                                </li>
                                <li>
                                    <h4 class="d-inline-block">Part No:</h4>
                                    <span class="d-inline-block">{{ $request->part_no }}</span>
                                </li>
                                <li>
                                    <h4 class="d-inline-block">QTY:</h4>
                                    <span class="d-inline-block">{{ $request->qty }}</span>
                                </li>
                                <li>
                                    <h4 class="d-inline-block">Description:</h4>
                                    <span class="d-inline-block">{{ $request->part_desc }}</span>
                                </li>
                                <li>
                                    <h4 class="d-inline-block">Created Date:</h4>
                                    <span class="d-inline-block">{{ $request->created_at }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @if (count($qoutations) === 0)
                        <x-emptyMessage content="There is no any qoutation for this request!"
                            :link="route('showRequest', [$request->id])" linkContent="Go Back to Request" />
                    @elseif(count($qoutations) > 0)

                        @foreach ($qoutations as $qoutation)
                            <div class="tab-pane fade active show" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <div class="employer-item">
                                    <a href="{{ route('showRequest', $request->id) }}">
                                        <img src="https://cdn0.iconfinder.com/data/icons/business-e-commerce-logistics-import-export/500/boxglobe-512.png"
                                            width="50px">
                                        <h3>#{{ $qoutation->id }}</h3>
                                        <ul>
                                            <li>{{ $qoutation->title }}</li>
                                        </ul>
                                        <strong class="text-black-50">Description</strong>
                                        <p>{{ $qoutation->message }}</p>
                                        <p class="mb-1">
                                            <strong>Price:</strong>
                                            {{ $qoutation->currency }} {{ $qoutation->price }}
                                        </p>
                                        <strong>
                                            <a href="{{ route('showRequest', $request->id) }}">
                                                <i class="bx bx-user"></i>
                                                {{ \App\Models\User::find($qoutation->user_id)->name }}
                                            </a>
                                        </strong>
                                </div>
                                </a>
                            </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>

@endsection
