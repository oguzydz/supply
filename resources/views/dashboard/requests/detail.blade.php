@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $request->brand }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Detail</a></li>
                        <li class="breadcrumb-item active">Requests</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="w-25">Brand</td>
                                    <td>{{ $request->brand }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Model</td>
                                    <td>{{ $request->model }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Part No</td>
                                    <td>{{ $request->part_no }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Part Description</td>
                                    <td>{{ $request->part_desc }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Quantity</td>
                                    <td>{{ $request->qty }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Updated At</td>
                                    <td>{{ $request->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Created At</td>
                                    <td>{{ $request->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 d-flex justify-content-end pt-3">
                        <a class="btn btn-success" role="button" href="{{route('dashboard.requests.edit', [$request->id])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
