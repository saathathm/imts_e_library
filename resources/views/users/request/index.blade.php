@extends('layouts.userLayout')
@section('title', 'Request book')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h4 class="m-0">Request</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Request</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <center>
                <h3 id="heading" style="transform: translateY(25px);">Request Book Here</h3>

                <!-- /input-group -->
                <form action="/user/requests" method="post">
                    @csrf
                    <div class="input-group input-group-md" style="width:500px; margin-top:60px">
                        <input type="text" name="message" class="form-control" placeholder="Message .."
                            style="border-color:#a4fff1;">
                        <span class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-info btn-flat ml-2">Ask</button>
                        </span>
                    </div>
                    <div style="position: absolute; left:50%; transform:translateX(15%)">
                        <span class="d-flex" style="color: red;">
                            @error('message')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </form>
                <!-- /input-group -->
                <div class="bg-success text-center mt-3">
                    {{ session('status') }}
                </div>

            </center>
        </div>
    </div>

@endsection
