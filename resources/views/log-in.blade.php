@extends('layout.master')
@section('content')

<div class="container-fluid mt-4">
    <div class="container">
        <h2 class="display-4">
            Log In </h2>

        <hr />
        @if (session('success'))
        <div id="alerts" class="alert alert-success d-flex align-items-center justify-content-between">
            <b>{{session('success')}}</b>
            <button class="btn btn-success" data-dismiss="alert">&times;</button>
        </div>
        @endif
          
        @if(session('error'))
        <div class="alert alert-danger  d-flex align-items-center justify-content-between">
            <b>{{ session('error') }}</b>
            <button class="btn btn-danger" data-dismiss="alert">&times;</button>
        </div>
    @endif
   
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6 offset-sm-2 offset-md-3">
                <form method="post" action="{{ url('/loginSubmit') }}">
                    @csrf
                
                    <div class="form-group">
                        <label for="username">Username/Email Address</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name"
                            placeholder="Type username or email address" value="{{ old('name') }}" />
                        
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            placeholder="Please enter your password" />
                        
                        <small class="form-text text-muted">Reminder: Passwords are 8 characters or longer and include both letters and numbers.</small>
                        
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <input type="submit" name="submit" class="btn btn-theme" value="Login" />
                    <a class="btn btn-info" href="{{ route('password.request') }}">Forgot Password</a>
              
                </form>
                
            </div>
        </div>
    </div>
    @endsection