@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $request->brand }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                        <li class="breadcrumb-item active">Requests</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if (\Session::has('success'))
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="alert alert-success" role="alert">
                    {!! \Session::get('success') !!}
                </div>
            </div>
        </div>
    @endif

    @if (\Session::has('error'))
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="alert alert-danger" role="alert">
                    {!! \Session::get('error') !!}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.requests.update', [$request->id]) }}">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="mb-3">
                            <label class="form-label">Brand</label>
                            <input type="text" class="form-control" value="{{ $request->brand }}" name="brand">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" class="form-control" value="{{ $request->model }}" name="model">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Part No</label>
                            <input type="text" class="form-control" value="{{ $request->part_no }}" name="part_no">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Part Description</label>
                            <textarea class="form-control" rows="3" name="part_desc">{{ $request->part_desc }}</textarea>
                        </div>
                        <div class="col d-flex justify-content-end gutter">
                            <a type="submit" href="{{ route('dashboard.requests') }}"
                                class="btn btn-outline-primary" style="margin-right:10px!important">Back</a>
                            <button type="submit" role="button" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
