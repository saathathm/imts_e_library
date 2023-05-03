@extends('layouts.authLayout')
@section('title', 'Admin Login')

@section('main-content')

    <div class="container-fluid">

        <div class="hold-transition login-page">
            <div class="login-box text-center card elevation-2" style="width: 450px; height:450px">
                <div class="login-logo mt-3">
                    <a href="" style="color: #000;"><b>ImTS</b> Admin</a>
                    <hr>
                </div>

                <!-- /.login-logo -->
                <div class="" style="width: 450px;">
                    <div class="card-body login-card-body ml-4" style="width:400px;">
                        <p class="login-box-msg">Login Here</p>

                        <form action="/admin/login" method="post">
                            @csrf
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
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password"
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
                            <div class="d-flex mb-5">
                                <div class="text-left">
                                    <!-- /.col -->
                                    <a href="#" class="mt-1">forgot your password?</a>
                                </div>
                            </div>


                            <div class="row d-flex" style="justify-content: space-between; transform:translateY(20px)">
                                <!-- /.col -->
                                <a href="/admin/register" class="ml-2 mt-1">Create a new account</a>

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>
                                <!-- /.col -->
                            </div>

                        </form>


                    </div>
                    <!-- /.login-card-body -->
                </div>
                <div class="bg-danger mt-2">
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
