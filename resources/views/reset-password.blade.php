@extends('layout.master')
@section('content')


<div class="container-fluid mt-4">
    <div class="container">
        <h2 class="display-4">
            Reset Password </h2>

        <hr />

        <div id="alerts">
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <form method="post">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Type email address" required />
                    </div>

                    <div class="h-captcha" data-sitekey="f24f426c-cffa-43c2-9970-8ca350a83f61"></div>


                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />

                </form>
            </div>
        </div>
    </div>
    @endsection