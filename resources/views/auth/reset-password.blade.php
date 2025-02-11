{{-- <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>New Password:</label>
    <input type="password" name="password" required>
    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required>
    <button type="submit">Reset Password</button>
</form> --}}
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
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control mb-2" placeholder="Enter your email" required>
                    <label>New Password:</label>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Enter your new password" required>
                    <label>Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Enter your confirm password" required>
                    <button type="submit" class="btn btn-theme my-3">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
    @endsection