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
                        Upload Count: 0<br />
                        Download Count: 0<br />
                        Registered: {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d,M,Y') }}<br />
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h3 class="mb-4 d-md-flex justify-content-md-between">
                    Recent Uploads

                    <div class="dropdown mt-3 mt-md-0">
                        <a class="btn btn-primary btn-block dropdown-toggle" href="#" data-toggle="dropdown">
                            View All
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="../themese739.html?query=user:aCsLuZ">Themes</a>
                            <a class="dropdown-item" href="../splashese739.html?query=user:aCsLuZ">Splashes</a>
                            <a class="dropdown-item" href="../badgese739.html?query=user:aCsLuZ">Badges</a>
                        </div>
                    </div>
                </h3>



                <div class="theme-grid row justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="theme-grid-item card bg- mb-3">
                            <div class="card-header">
                                <a href="../item/98372.html" data-toggle="tooltip"
                                    title="Suitcase - Inanimate Insanity">Suitcase - Inanimate Insanity</a>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <a href="../item/98372.html">
                                    <div class="d-flex justify-content-around align-items-center" data-qr-code>
                                        <div class="text-center">
                                            <p>Scan QR Code</p>
                                            <p><img width="180" src="../download/98372/qr.png" src="QR%20Code.html" />
                                            </p>
                                            <p>Click for more details</p>
                                        </div>
                                    </div>
                                    <img src="../img/preview_transparent.png"
                                        class="img-fluid d-block mx-auto img-item-preview" alt=""
                                        style="background-image: url(../download/98372/preview.png);" />
                                </a>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="mx-1">
                                    <a class="btn btn-sm btn-primary"
                                        href="../download/Suitcase%20-%20Inanimate%20Insanity%20by%20aCsLuZ%20(98372).zip"
                                        target="_blank" title="Download" data-toggle="tooltip">2 <i
                                            class="fa fa-fw fa-download"></i></a>
                                </div>
                                <div class="mx-1">
                                    <a class="btn btn-sm btn-danger" href="#" data-like="98372" title="Like"
                                        data-toggle="tooltip"><span data-count>0</span> <i
                                            class="fa fa-fw fa-heart-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endsection