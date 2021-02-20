@extends('layouts.dashboard')

@section('content')

    @if (\Session::has('success'))
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-success" role="alert">
                    {!! \Session::get('success') !!}
                </div>
            </div>
        </div>
    @endif

    @if (\Session::has('error'))
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-danger" role="alert">
                    {!! \Session::get('error') !!}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">BRANDS</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                        <li class="breadcrumb-item active">Brands</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="table-responsive">
                            <table class="table align-middle mb-0">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <th scope="row">{{ $brand->id }}</th>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.brands.show', [$brand->id]) }}" role="button"
                                                    class="btn btn-light btn-sm">Detail</a>
                                                <a href="{{ route('dashboard.brands.destroy', [$brand->id]) }}" role="button"
                                                    class="btn btn-danger btn-sm">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    {{ $brands->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
