@extends('layouts.adminLayout')
@section('title', 'Create category')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Author</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Add author</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <!-- general form elements -->
            <div class="card elevation-2">

                <!-- form start -->
                <form method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Author Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name"
                                name="author_name">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" class="btn btn-info" name="submit">Save</button>
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
                    url: "{{ url('admin/authors') }}",
                    type: "POST",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(result) {
                        if (result['success']) {
                            window.location.replace("{{ url('admin/authors/create') }}");
                        } else {
                            $('#errorDiv').html(result['msg']);
                        }
                    }
                });
            });
        });
    </script>

@endsection
