@extends('layout.master')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <h2 class="display-4">
            Account </h2>

        <hr>

        <div id="alerts">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">


                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 text-center justify-content-around align-items-center d-flex">
                                <a href="/profile/samee">
                                    <img class="img-fluid rounded-circle"
                                        src="https://www.gravatar.com/avatar/9946aebec2b08f9c33b9b443f00603f3?d=identicon&amp;s=48"
                                        alt="samee">
                                </a>
                            </div>
                            <div class="col-9 d-flex align-items-center">
                                <div>
                                    <h3>
                                        <a href="/profile/samee">{{auth()->user()->name}} </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Site Settings</h4>
                            <div class="form-group">
                                <label for="nsfw-level">Default NSFW Level</label>
                                <select class="form-control" name="nsfw_level" id="nsfw-level">
                                    <option value="0" selected="">Safe</option>
                                    <option value="1">Sketchy</option>
                                    <option value="2">NSFW</option>
                                </select>
                            </div>
                            <input type="hidden" name="token" value="28150c02"> <input class="btn btn-primary"
                                type="submit" name="site_submit" value="Update">
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Security Settings</h4>
                            <div class="form-group">
                                <label class="form-label" for="current-password">Current Password</label>
                                <input class="form-control" id="current-password" type="password"
                                    name="current_password" placeholder="Type current password">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="new-password">New Password</label>
                                <input class="form-control" id="new-password" type="password" name="password"
                                    placeholder="Type new password">
                                <small class="form-text text-muted">Passwords must be 8 characters or longer and include
                                    both letters and numbers.</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <input class="form-control" id="confirm-password" type="password"
                                    name="confirm_password" placeholder="Confirm password">
                            </div>
                            <input type="hidden" name="token" value="28150c02"> <input class="btn btn-primary"
                                type="submit" name="security_submit" value="Update">
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-lg-8">

                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Galleries</h4>
                        <form method="post">
                            <div class="input-group">
                                <input class="form-control" id="gallery-name" type="text" name="gallery_name"
                                    placeholder="Type name" maxlength="50" required="">
                                <span class="input-group-append">
                                    <button class="btn btn-success" type="submit" name="gallery_create_submit"
                                        value="1"><svg class="svg-inline--fa fa-plus fa-w-14 fa-fw" aria-hidden="true"
                                            data-prefix="fa" data-icon="plus" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                                            </path>
                                        </svg><!-- <i class="fa fa-fw fa-plus"></i> --></button>
                                </span>
                            </div>
                            <input type="hidden" name="token" value="28150c02">
                        </form>


                    </div>
                </div>

                <div class="card bg-success mb-3">
                    <div class="card-body ">
                        <h4 class="card-title">Accepted Submissions</h4>
                        No submissions to display.
                    </div>
                </div>
                <div class="card bg-warning mb-3">
                    <div class="card-body ">
                        <h4 class="card-title">Pending Submissions</h4>
                        No submissions to display.
                    </div>
                </div>
                <div class="card bg-danger mb-3">
                    <div class="card-body ">
                        <h4 class="card-title">Rejected Submissions</h4>
                        No submissions to display.
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection