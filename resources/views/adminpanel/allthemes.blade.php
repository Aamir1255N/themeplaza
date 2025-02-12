@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <h2>All Users</h2>
            <hr>
            @if (session('success'))
                <div id="alerts" class="alert alert-success d-flex align-items-center justify-content-between">
                    <b>{{ session('success') }}</b>
                    <button class="btn btn-success" data-dismiss="alert">&times;</button>
                </div>
            @endif
        </div>
        <div class="container">
            <div class="row">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>short Description</th>
                        <th>Tag</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach ($users as $user)
                        @if ($user->role == 'user')
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }}</td>
                                <td class="text-center"><a href="/userDelete/{{ $user->id }}"
                                        class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
