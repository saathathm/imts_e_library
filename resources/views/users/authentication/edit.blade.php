@extends('layouts.userLayout')
@section('title', 'Request book')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Change password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Change password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Horizontal Form -->
            <div class="card elevation-2">
                <div class="card-body">

                    <!-- form start -->
                    <form action="/user/login/{{$id}}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="opass" class="form-control" id="inputPassword3"
                                        placeholder="old password">
                                    <div style="position: absolute;">
                                        <span class="d-flex" style="color: red;">
                                            @error('opass')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label mt-3">Password</label>
                                <div class="col-sm-10 mt-3">
                                    <input type="password" name="npass" class="form-control" id="inputPassword3"
                                        placeholder="new password">
                                    <div style="position: absolute;">
                                        <span class="d-flex" style="color: red;">
                                            @error('npass')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-info float-left">Update Password</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                    <div class="bg-success text-center">
                        {{ session('h') }}
                    </div>
                    <div class="bg-danger text-center">
                        {{ session('f') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
