<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeplaza.art/themes by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Feb 2025 20:04:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no" />
    <meta property="og:title" content="Themes" />
    <meta property="og:description" content="Theme Plaza." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="img/icon.png" />
    <meta property="og:url" content="/themes" />
    <meta property="og:site_name" content="Theme Plaza" />
    <title>Themes | Theme Plaza</title>
    <link rel="icon" type="image/png" href="{{asset('assets/img/icone6b1.png?1501522454')}}" />
    <link href="{{asset('assets/css/bootstrap.mindb44.css?1544224878')}}" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Theme Plaza</a>
        <div class="collapse navbar-collapse justify-content-between d-flex" id="navbar">

            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{auth()->check() ? 'upload': 'login'}}">Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="/faq">FAQ/Rules/Approval Info</a></li>
                <li class="nav-item"><a class="nav-link" href="https://discord.gg/Pz25PX5vr5">Join Our Discord!</a></li>
            </ul>

            <div class="profiles d-flex align-items-center">
                @if (!auth()->check())
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Log In</a></li>
                </ul>
                @else
                <div class=" dropdown">
                    
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Well Come {{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="{{'/profile'}}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="{{'/logout'}}">Logout</a>
                    </div>
                </div>
                {{-- <b>WellCome <a href="{{'/profile'}}" class="text-white">{{auth()->user()->name}}</a></b> --}}
                @endif
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <div class="container">

            <div id="alerts">
            </div>
        </div>