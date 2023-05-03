@extends('layouts.adminLayout')
@section('title', 'Create category')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add new category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Add new category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <!-- general form elements -->
            <div class="card elevation-2">

                <!-- form start -->
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Categor Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name"
                                name="cat_name">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" name="status" value="1"
                                    id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Category Active</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-info" name="submit">Create</button>
                    </div>
                </form>
                <div class="bg-danger text-center" id="errorDiv"></div>
            </div>
        </div>
    </div>



    <script src="/plugins/jquery/jquery-3.6.3.min.js"></script>
    <script>
        $(function() {
            $("button").click(function() {
                $.ajax({
                    url: "{{ url('admin/categories') }}",
                    type: "POST",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(result) {
                        if (result['success']) {
                            window.location.replace("{{ url('admin/categories/create') }}");
                        } else {
                            $('#errorDiv').html(result['msg']);
                        }
                    }
                });
            });
        });
    </script>

@endsection
