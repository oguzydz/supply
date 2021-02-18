@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">USERS</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                                        <th>E-mail</th>
                                        <th>Company</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!$user->company) <span
                                                    class="badge bg-danger">No-brand</span> @else {{ $user->company }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.users.detail', [$user->id]) }}" role="button"
                                                    class="btn btn-light btn-sm">Detail</a>
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
