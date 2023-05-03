@extends('layouts.adminLayout')
@section('title', 'Update category')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Update category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="card elevation-2">

                <!-- form start -->
                <form method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cat_id" value="{{ $categories->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Categor Name</label>
                            <input type="text" class="form-control" value="{{ $categories->cat_name }}"
                                id="exampleInputEmail1" placeholder="Enter name" name="cat_name">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" name="status" value="1"
                                    id="customSwitch3" {{ $categories->status != 0 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customSwitch3">Category Active</label>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="button" class="btn btn-warning" name="submit">Update</button>
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
                    url: "/admin/categories/{{$categories->id}}",
                    type: "POST",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(result) {
                        if (result['success']) {
                            window.location.replace("{{ url('admin/categories') }}");
                        } else {
                            $('#errorDiv').html(result['msg']);
                        }
                    }
                });
            });
        });
    </script>

@endsection
