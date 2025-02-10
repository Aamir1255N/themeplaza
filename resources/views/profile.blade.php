@extends('layout.master')
@section('content')



<div class="container-fluid mt-4">
    <div class="container">

        <div id="alerts">
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-lg">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div
                                class="col-sm-12 col-md-auto text-center justify-content-around align-items-center d-flex px-4 py-3 py-md-0">
                                <img class="img-fluid rounded-circle bg-white"
                                    src="https://www.transparentpng.com/download/user/gray-user-profile-icon-png-fP8Q1P.png"
                                    alt="aCsLuZ" width="100px" height="100px" />
                            </div>
                            <div
                                class="col-sm-12 col-md d-flex justify-content-around justify-content-md-start align-items-center text-center text-md-left">
                                <div>
                                    <h1>{{auth()->user()->name}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Statistics</h3>
                        Upload Count: {{$count}}<br />
                        {{-- Download Count: 0<br /> --}}
                        Registered: {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d,M,Y') }}<br />
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="mb-4 d-md-flex justify-content-md-between">
                    Recent Uploads

                </h3>



                <div class="theme-grid row justify-content-center">
                    @foreach ($themes as $theme)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="theme-grid-item card bg- mb-3">
                            <div class="card-header">
                                <a href="{{'themedetails/'.$theme->id}}" data-toggle="tooltip"
                                    title="{{$theme->name}}">{{$theme->name}}</a>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <a href="{{'themedetails/'.$theme->id}}">
                                    <div class="d-flex justify-content-around align-items-center" data-qr-code>
                                        <div class="text-center">
                                            <p>Scan QR Code</p>
                                            <p><img width="180" src="{{asset('storage/'.$theme->qr)}}" />
                                            </p>
                                            <p>Click for more details</p>
                                        </div>
                                    </div>
                                    <img src="{{asset($theme->preview)}}"
                                        class="img-fluid d-block mx-auto img-item-preview" alt="" style="height:150px !important;"
                                        style="background-image: url({{asset($theme->preview)}});" />
                                    <img src="{{asset($theme->preview2)}}"
                                        class="img-fluid d-block mx-auto img-item-preview" alt="" style="height:150px !important;"
                                        style="background-image: url({{asset($theme->preview2)}});" />
                                </a>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="mx-1">
                                    <a class="btn btn-sm btn-theme download-btn" data-id="{{ $theme->id }}"
                                        href="{{ asset($theme->body) }}" target="_blank" title="Download" data-toggle="tooltip">
                                        <span data-download-count="{{ $theme->id }}">{{ $theme->downloads }}</span>
                                        <i class="fa fa-fw fa-download"></i>
                                    </a>
                                </div>
                                <div class="mx-1">
                                    <a class="btn btn-sm btn-danger like-btn" data-id="{{ $theme->id }}" href="#" title="Like"
                                        data-toggle="tooltip">
                                        <span data-like-count="{{ $theme->id }}">{{ $theme->likes }}</span>
                                        <i class="fa fa-fw fa-heart-o"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    @endsection