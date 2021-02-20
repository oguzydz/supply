@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">REQUESTS</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                        <li class="breadcrumb-item active">Requests</li>
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
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Part No</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <th scope="row">{{ $request->id }}</th>
                                            <td>{{ $request->brand }}</td>
                                            <td>{{ $request->model }}</td>
                                            <td>{{ $request->part_no }}</td>
                                            <td>{{ $request->qty }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.requests.show', [$request->id]) }}"
                                                    role="button" class="btn btn-light btn-sm">Show</a>
                                                <a href="{{ route('dashboard.requests.edit', [$request->id]) }}"
                                                    role="button" class="btn btn-light btn-sm">Edit</a>
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
                    {{ $requests->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
