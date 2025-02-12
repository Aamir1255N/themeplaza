@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <h2>Dashboard</h2>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="/admin/allusers" style="text-decoration:none;">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 style="background: transparent !important; color:white !important;">Users</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-primary">{{ $users }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="/admin/allthemes" style="text-decoration:none;">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                <h4 style="background: transparent !important; color:white !important;">Themes</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-danger">{{ $themes }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="/admin/allcategory" style="text-decoration:none;">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h4 style="background: transparent !important; color:white !important;">Category</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-success">{{ $category }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="/admin/allcontact" style="text-decoration:none;">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <h4 style="background: transparent !important; color:white !important;">Contact</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-dark">{{ $contact }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endsection
