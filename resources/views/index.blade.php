@extends('layout.master')
@section('content')
@if (session('success'))
<div id="alerts" class="alert alert-success d-flex align-items-center justify-content-between">
    <b>{{session('success')}}</b>
    <button class="btn btn-success" data-dismiss="alert">&times;</button>
</div>
@endif
@include('layout.sortform')
<div class="theme-grid row justify-content-center">
    @foreach ($themes as $theme)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
        <div class="theme-grid-item card bg-success mb-3">
            <div class="card-header">
                <a href="{{'themedetails/'.$theme->id}}" data-toggle="tooltip" title="{{$theme->name}}">{{$theme->name}}</a>
            </div>
            <div class="card-body" style="position: relative;">
                <a href="{{'themedetails/'.$theme->id}}">
                    <div class="d-flex justify-content-around align-items-center" data-qr-code>
                        <div class="text-center">
                            <p>Scan QR Code</p>
                            <p><img width="180" src="{{asset('storage/'.$theme->qr)}}" src="QR%20Code.html" /></p>
                            <p>Click for more details</p>
                        </div>
                    </div>
                    <img src="{{asset($theme->preview)}}" class="img-fluid d-block mx-auto img-item-preview" alt=""
                        style="background-image: url({{asset($theme->icon)}});" />
                    <img src="{{asset($theme->icon)}}" class="img-fluid d-block mx-auto img-item-preview" alt=""
                        style="background-image: url({{asset($theme->icon)}});" />
                </a>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="mx-1">
                    <a class="btn btn-sm btn-primary download-btn" data-id="{{ $theme->id }}"
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

                <div class="mx-1" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"
                    data-toggle="tooltip" title="Savanna7SMA">
                    <a href="profile/Savanna7SMA.html">
                        <i class="fa fa-fw fa-user"></i> {{ $theme->uploader }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-6 offset-md-3 d-flex justify-content-between align-items-center">

        <a title="Previous Page" data-toggle="tooltip" class="btn btn-secondary disabled"
            href="themes02e4.html?page=0"><i class="fa fa-fw fa-arrow-left"></i></a>

        <a href="#page-jump" data-toggle="page-jump">Page 1 of 2,157</a>

        <a title="Next Page" data-toggle="tooltip" class="btn btn-secondary " href="themes4658.html?page=2"><i
                class="fa fa-fw fa-arrow-right"></i></a>

    </div>
</div>
<div class="modal fade" id="modal-files-jump">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="get">
                <div class="modal-header">
                    <h5 class="modal-title">Jump To Page</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">

                            <span class="input-group-addon">
                                Page
                            </span>
                            
                            <input type="number" name="page" class="form-control" placeholder="Type page number"
                                value="1" min="1" max="2157" />

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Go</button>
                            </span>
                        </div>
                    </div>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
@endsection
