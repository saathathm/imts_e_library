@extends('layouts.authLayout')
@section('title', 'Register admin')

@section('main-content')

    <div class="container-fluid">

        <div class="hold-transition login-page">
            <div class="login-box text-center card elevation-2" style="width: 450px; height:500px">
                <div class="login-logo mt-3">
                    <a href="../../index2.html" style="color: #000;"><b>ImTS</b> Admin Register</a>
                    <hr>
                </div>

                <div class="" style="width: 450px;">
                    <div class="card-body login-card-body ml-4" style="width:400px;">
                        <p class="login-box-msg">Register admin</p>

                        <form action="/admin/register" method="post">
                            @csrf
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" placeholder="Name" name="name"
                                    value="{{ old('name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <div style="position: absolute; bottom:-22px">
                                    <span class="d-flex" style="color: red;">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <div style="position: absolute; bottom:-22px">
                                    <span class="d-flex" style="color: red;">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="input-group mb-4">
                                <input type="password" class="form-control"
                                    placeholder="Your password must be at least 8 characters!" name="password"
                                    value="{{ old('password') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <div style="position: absolute; bottom:-22px">
                                    <span class="d-flex" style="color: red;">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Both password must be same"
                                    name="password_confirmation" value="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex" style="justify-content: space-between; transform:translateY(20px)">
                                <a href="/admin/login" class="ml-2 mt-1">Already have an account?</a>
                                <div class="col-4 mb-1">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>
                                <!-- /.col -->
                            </div>

                        </form>


                    </div>
                    <!-- /.login-card-body -->
                </div>
                <div class="bg-danger mt-3">
                    {{ session('h') }}
                </div>
            </div>
            <a href="/">
                <div class="d-flex justify-content-center" style="transform: translateY(20px);">
                    <img src="/img/elib.png" class="logo">
                </div>
            </a>
        </div>
    </div>

@endsection
