@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $brand->name }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Show</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                                    <td class="w-25">Name</td>
                                    <td>{{ $brand->name }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Updated At</td>
                                    <td>{{ $brand->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Created At</td>
                                    <td>{{ $brand->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 d-flex justify-content-end pt-3">
                        <a class="btn btn-danger"  style="margin-right:10px!important" role="button" href="{{route('dashboard.brands.destroy', [$brand->id])}}">Remove</a>
                        <a class="btn btn-success" role="button" href="{{route('dashboard.brands.edit', [$brand->id])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
