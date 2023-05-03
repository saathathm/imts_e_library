@extends('layouts.userLayout')
@section('title', 'Categories list')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead style="background:#8aa9a3;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        @forelse ($categories as $category => $val)
                            <tbody>
                                <tr>
                                    <td>{{ ++$category }}</td>
                                    <td>{{ $val->cat_name }}</td>
                                    <td>
                                        <div class="">
                                            @if ($val['status'] == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Deactive</span>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary"
                                            href="/user/categories/{{ $val['id'] }}">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <p>No records are found</p>
                        @endforelse
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            @if (isset($catlist))
                <div class="card">
                    <div class="pl-4 bg-black">
                        <h6 class="card-title"><b>{{ $catname->cat_name }}</b></h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead style="background:#8aa9aa;">
                                <tr>
                                    <th>ISBN</th>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>View</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>

                            @forelse ($catlist as $info)
                                <tbody>
                                    <tr>
                                        <td>{{ $info['isbn'] }}</td>
                                        <td>{{ $info['title'] }}</td>
                                        <td>{{ $info['author_name'] ?? '' }}</td>
                                        <td>{{ $info['cat_name'] ?? '' }}</td>
                                        <td><a class="btn btn-sm btn-primary" href="/uploads/{{ $info['file'] }}"
                                                target="_blank">Open</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="/user/comments/{{ $info->id }}">Write
                                                here</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <div class="bg-warning text-center text-bold">No records are found!!</div>
                            @endforelse
                        </table>
                    </div>

                </div>
            @endif

        </div>
    </div>

@endsection
