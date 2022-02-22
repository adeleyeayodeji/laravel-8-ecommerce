@extends('layouts.app')
@section('body')
<div class="container py-3">
    <div class="row">
        <div class="col-12">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h3>Login</h3>
            <form action="{{URL::to("auth","login")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary mt-1">Login</button>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h3>Register</h3>
            <form action="{{URL::to("auth","register")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary mt-1">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
