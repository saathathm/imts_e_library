@extends('layouts.userLayout')
@section('title', 'Dashboard')

@section('main-content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Welcome {{session('user_name')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box elevation-1" style="background:#d0ffeb;">
                        <div class="inner">
                            <h3>{{$totalbooks ?? '0'}}</h3>

                            <p>Total Books</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-book"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <!-- small box -->
                    <div class="small-box elevation-1" style="background:#d0ffeb;">
                        <div class="inner">
                            <h3>{{$totalcategories ?? '0'}}</h3>

                            <p>Total category</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

@endsection
