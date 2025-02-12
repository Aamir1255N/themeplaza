@extends('layout.master')
@section('content')

<div class="container-fluid">
    <div class="container">
        <h2 class="display-4">
            Contact Us </h2>
        <hr />
        @if (session('succes'))
        <div id="alerts" class="alert alert-success d-flex align-items-center justify-content-between">
            <b>{{session('succes')}}</b>
            <button class="btn btn-success" data-dismiss="alert">&times;</button>
        </div>
        @endif
    </div>
    <div class="container">
       <div class="row">
        <form action="{{url('/contact')}}" class="col-md-6 m-auto" method="POST">
            @csrf
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control my-1" placeholder="Name">
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control my-1" placeholder="Email">
            @error('email')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="">Message</label>
            <textarea name="message" class="form-control my-1" id="" cols="30" rows="7" placeholder="Message"></textarea>
            @error('message')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <input type="submit" value="Send Message" class="btn btn-theme btn-block">
        </form>
       </div>
    </div>
    @endsection