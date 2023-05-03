@extends('layouts.authLayout')
@section('title', 'ImTS ELibrary')

@section('main-content')

    <ul class="navbar-nav m1-auto" style="position:absolute; left:9px; top:10px; z-index:105;">
        <li class="nav-item">
            <a href="admin/login" class="m-btn">Admin</a>
        </li>
    </ul>

    <div class="container-fluid">
        <div class="m-main">
            <div class="m-left">
                <div class="hold-transition login-page">
                    <div class="col-2">
                        <a href="user/register">
                            <div class="card elevation-1 m-l-card">
                                <div class="card-body d-flex m-l-card2">
                                    <div class="icon">
                                        <i class="fas fa-solid fa-address-card mt-2" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="inner">
                                        <h3 class="mt-1">Register</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <br>
                        <a href="user/login">
                            <div class="card elevation-1 m-l-card">
                                <div class="card-body d-flex m-l-card2">
                                    <div class="icon">
                                        <i class="fas fa-solid fa-user mt-2" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="inner">
                                        <h3 class="mt-1">Login</h3>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>


            <div class="m-right elevation-2">
                <!-- <img src="/img/irina.jpg" class="logo"> -->
                <h5 class="m-right-title"><b>All<br>books are<br>accessible<br>in one Step,<br>Just $3.99<br>only!!</b></h5>
            </div>
        </div>
    </div>

@endsection
