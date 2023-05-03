@extends('layouts.userLayout')
@section('title', 'All books')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">Books</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Books</li>
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
                                <th>ISBN</th>
                                <th>Book Name</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th class="pl-3">View</th>
                                <th>Comment</th>
                            </tr>
                        </thead>

                        @foreach ($allBooks as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->isbn }}</td>
                                    <td>{{ $info->title }}</td>
                                    <td>{{ $info->author_name ?? '' }}</td>
                                    <td>{{ $info->cat_name ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="/uploads/{{ $info['file'] }}"
                                            target="_blank">Open</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="/user/comments/{{ $info['id'] }}">Write here</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
