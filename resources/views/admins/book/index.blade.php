@extends('layouts.adminLayout')
@section('title', 'View books')

@section('main-content')

    <div class="content-wrapper">
        <div class="content-header ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Books</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">View Books</li>
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
                                <th>Book Name</th>
                                <th>ISBN</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th class="pl-5">Action</th>
                            </tr>
                        </thead>

                        @forelse ($books as $book => $val)
                            <tbody>
                                <tr>
                                    <td>{{ ++$book }}</td>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ $val->isbn }}</td>
                                    <td>{{ $val->cat_name }}</td>
                                    <td>{{ $val->author_name }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-sm btn-info mr-1" href="/uploads/{{ $val['file'] }}"
                                            target="_blank">Open</a>
                                        <a class="btn btn-sm btn-primary mr-1"
                                            href="/admin/books/{{ $val->id }}/edit">Edit</a>
                                        <form action="/admin/books/{{ $val['id'] }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <div class="bg-warning text-center text-bold" id="errorDiv">
                                No records are found!!
                            </div>
                        @endforelse
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection
