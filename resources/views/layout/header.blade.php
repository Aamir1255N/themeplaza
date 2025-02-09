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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Themes | Theme Plaza</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo.png') }}" />
    <link href="{{ asset('assets/css/bootstrap.mindb44.css?1544224878') }}" rel="stylesheet" />
    <style>
        * {
            background: white !important;
            color: #388a9f !important;
        }
        .bg-theme{
            background: #388a9f !important;
            color: white !important;
        }
        .btn-theme {
            border:1px solid #388a9f;
            background: #388a9f !important;
            color: white !important;
            transition: 0.5s ease;
        }

        .btn-theme:hover {
            border:1px solid #388a9f;
            background: #388a9f !important;
            color: white !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logos/logo.png') }}" width="100px" height="100px" alt="">
            </a>

            <!-- Navbar Toggle Button (Bootstrap 4 Syntax) -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item"><a class="nav-link" href="{{ auth()->check() ? 'upload' : 'login' }}">Upload</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/faq">FAQ/Rules/Approval Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://discord.gg/Pz25PX5vr5">Join Our Discord!</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/terms">Terms & Condition</a></li>
                </ul>

                <!-- Right: Register/Login or Profile -->
                <ul class="navbar-nav ">
                    @if (!auth()->check())
                        <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Log In</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Well Come {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ '/account' }}">Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ '/logout' }}">Logout</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>



    <div class="container-fluid mt-4">
        <div class="container">

            <div id="alerts">
            </div>
        </div>
