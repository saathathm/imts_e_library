@extends('layouts.adminLayout')
@section('title', 'Dashboard')

@section('main-content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <div class="small-box elevation-1" style="background:#d0ffeb;">
                            <div class="inner">
                                <h3>{{ $totalusers ?? '' }}</h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="small-box elevation-1" style="background:#d0ffeb;">
                            <div class="inner">
                                <h3>{{ $totalbooks ?? '' }}</h3>
                                <p>Total Books</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-solid fa-book"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="small-box elevation-1" style="background:#d0ffeb;">
                            <div class="inner">
                                <h3>{{ $totalrequests ?? '' }}</h3>
                                <p>Total Requests</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa-solid fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="small-box elevation-1" style="background:#d0ffeb;">
                            <div class="inner">
                                <h3>{{ $totalcomments ?? '' }}</h3>
                                <p>Total Comments</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa-solid fas fa-comments"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
