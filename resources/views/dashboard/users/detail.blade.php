@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $user->name }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Detail</a></li>
                        <li class="breadcrumb-item active">Users</li>
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

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="w-25">Name</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">E-mail</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Company</td>
                                    <td>
                                        @if (!$user->company) <span
                                            class="badge bg-danger">No-brand</span> @else {{ $user->company }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25">Updated At</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Created At</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Action</td>
                                    <td><a class="btn btn-danger"  role="button"
                                            href="{{ route('dashboard.users.remove', [$user->id]) }}">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
